<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PaymentConfirmed;
use App\Models\Property;
use App\Models\Reservation;
use App\Models\User;
use App\Notifications\ReservationConfirmed;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
        }
        $user_session = User::find(Session::get('LoggedIn'));

        $reservations = Reservation::with('room')->get();


        return view('admin.reservations.index', compact('user_session', 'reservations'));
    }

    public function updatePaymentStatus(Request $request, $id)
    {
        $request->validate([
            'payment_status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $reservation = Reservation::findOrFail($id);

        try {
            $reservation->payment_status = $request->payment_status;
            $reservation->save();

            if ($request->payment_status === 'confirmed') {
                // Enviar notificación de pago confirmado al cliente
                Mail::to($reservation->email)->queue(new PaymentConfirmed($reservation));
                // Enviar al propietario (si existe una relación con una propiedad)
                if ($reservation->room && $reservation->room->property && $reservation->room->property->owner_email) {
                    Mail::to($reservation->room->property->owner_email)->queue(new PaymentConfirmed($reservation));
                }
            }

            return response()->json(['success' => true, 'message' => 'Estado de pago actualizado exitosamente']);
        } catch (\Exception $e) {
            \Log::error('Error al actualizar el estado de pago: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error al actualizar el estado de pago'], 500);
        }
    }
    public function create()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
        }
        $user_session = User::find(Session::get('LoggedIn'));
        $users = User::where('is_super_admin', 0)->get();
        $rooms = Property::all(); // or Room::all() based on your model
        return view('admin.reservations.create', compact('users', 'rooms', 'user_session'));
    }

    public function store(Request $request)
    {
        // Validate the request first to ensure all inputs are valid
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:properties,id', // Corrected to reference 'rooms' table
            'date' => 'required|date',
            'check_in_time' => 'required|date_format:H:i', // Ensure time format is valid
            'check_out_time' => 'required|date_format:H:i|after:check_in_time', // Ensure check-out is after check-in
            'guests' => 'required|integer|min:1',
        ]);

        // Check for existing reservations to prevent double-booking
        $existingReservation = Reservation::where('room_id', $validated['room_id'])
            ->where('date', $validated['date'])
            ->where(function ($query) use ($validated) {
                $query->where(function ($q) use ($validated) {
                    // Check if new reservation's time range overlaps with existing ones
                    $q->where('check_in_time', '>=', $validated['check_in_time'])
                        ->where('check_in_time', '<', $validated['check_out_time']);
                })->orWhere(function ($q) use ($validated) {
                    $q->where('check_out_time', '>', $validated['check_in_time'])
                        ->where('check_out_time', '<=', $validated['check_out_time']);
                })->orWhere(function ($q) use ($validated) {
                    // Check if existing reservation fully contains the new time range
                    $q->where('check_in_time', '<=', $validated['check_in_time'])
                        ->where('check_out_time', '>=', $validated['check_out_time']);
                });
            })
            ->exists();

        if ($existingReservation) {
            return back()->withErrors(['error' => 'La habitación no está disponible en ese horario.'])->withInput();
        }

        // Fetch user once to optimize database queries
        $user = User::findOrFail($validated['user_id']);

        // Create the reservation
        try {
            $reservation  = Reservation::create([
                'user_id' => $validated['user_id'],
                'room_id' => $validated['room_id'],
                'full_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->mobile_number ?? '',
                'date' => $validated['date'],
                'check_in_time' => $validated['check_in_time'],
                'check_out_time' => $validated['check_out_time'],
                'guests' => $validated['guests'],
                'payment_status' => 'pending',
            ]);
            // Notify the user
            $user = $reservation->user; // assuming the reservation has a `user` relationship
            $user->notify(new ReservationConfirmed($reservation));

            return redirect()->route('reservations.index')->with('success', 'Reserva creada exitosamente.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al crear la reserva: ' . $e->getMessage()])->withInput();
        }
    }

    public function calendarView()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
        }
        $user_session = User::find(Session::get('LoggedIn'));
        return view('admin.reservations.calendar', compact('user_session')); // Blade view for rendering the calendar
    }

    public function calendarEvents(Request $request)
    {
        // Validate date range if needed (for performance with many reservations)
        $start = $request->get('start');
        $end = $request->get('end');

        $query = Reservation::query();

        if ($start && $end) {
            $query->whereBetween('date', [$start, $end]);
        }

        $reservations = $query->get();
        $events = [];

        foreach ($reservations as $reservation) {
            try {
                $startDateTime = Carbon::parse($reservation->date . ' ' . $reservation->check_in_time);
                $endDateTime = Carbon::parse($reservation->date . ' ' . $reservation->check_out_time);

                // Skip invalid time ranges
                if ($startDateTime >= $endDateTime) {
                    continue;
                }

                $events[] = [
                    'title' => $reservation->full_name,
                    'start' => $startDateTime->toIso8601String(),
                    'end' => $endDateTime->toIso8601String(),
                    'allDay' => false,
                    'extendedProps' => [
                        'guests' => $reservation->guests,
                        'reservation_id' => $reservation->id,
                        'phone' => $reservation->phone,
                        'email' => $reservation->email
                    ],
                    // Additional metadata if needed
                    'backgroundColor' => $this->getEventColor($reservation->guests),
                    'borderColor' => '#ffffff',
                    'textColor' => '#ffffff'
                ];
            } catch (\Exception $e) {
                continue;
            }
        }

        return response()->json($events);
    }
    public function edit(Reservation $reservation)
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
        }
        $user_session = User::find(Session::get('LoggedIn'));
        $users = User::all();
        $rooms = Property::all();
        return view('admin.reservations.edit', compact('reservation', 'users', 'rooms', 'user_session'));
    }

    /**
     * Update the specified reservation in storage.
     *
     * @param Request $request
     * @param Reservation $reservation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Reservation $reservation)
    {
        // Validate the request
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:properties,id',
            'date' => 'required|date',
            'check_in_time' => 'required|date_format:H:i',
            'check_out_time' => 'required|date_format:H:i|after:check_in_time',
            'guests' => 'required|integer|min:1',
        ]);

        // Check for availability conflicts, excluding the current reservation
        $existingReservation = Reservation::where('room_id', $validated['room_id'])
            ->where('date', $validated['date'])
            ->where('id', '!=', $reservation->id) // Exclude the current reservation
            ->where(function ($query) use ($validated) {
                $query->where(function ($q) use ($validated) {
                    $q->where('check_in_time', '>=', $validated['check_in_time'])
                        ->where('check_in_time', '<', $validated['check_out_time']);
                })->orWhere(function ($q) use ($validated) {
                    $q->where('check_out_time', '>', $validated['check_in_time'])
                        ->where('check_out_time', '<=', $validated['check_out_time']);
                })->orWhere(function ($q) use ($validated) {
                    $q->where('check_in_time', '<=', $validated['check_in_time'])
                        ->where('check_out_time', '>=', $validated['check_out_time']);
                });
            })
            ->exists();

        if ($existingReservation) {
            return back()->withErrors(['error' => 'La habitación no está disponible en ese horario.'])->withInput();
        }

        // Fetch user once to optimize queries
        $user = User::findOrFail($validated['user_id']);

        // Update the reservation
        try {
            $reservation->update([
                'user_id' => $validated['user_id'],
                'room_id' => $validated['room_id'],
                'full_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->mobile_number ?? '',
                'date' => $validated['date'],
                'check_in_time' => $validated['check_in_time'],
                'check_out_time' => $validated['check_out_time'],
                'guests' => $validated['guests'],
                'payment_status' => $reservation->payment_status, // Preserve existing status
            ]);

            return redirect()->route('reservations.index')->with('success', 'Reserva actualizada exitosamente.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al actualizar la reserva: ' . $e->getMessage()])->withInput();
        }
    }
    protected function getEventColor($guests)
    {
        if ($guests > 4) return '#dc3545'; // Red
        if ($guests > 2) return '#fd7e14'; // Orange
        return '#0d6efd'; // Blue
    }
}
