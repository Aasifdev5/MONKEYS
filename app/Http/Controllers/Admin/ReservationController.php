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

        $reservations = Reservation::with('room')->orderBy('id', 'desc')->get();



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
public function getPrices($id)
{
    $property = Property::findOrFail($id);

    $durations = $property->price ?? [];

    return response()->json($durations);
}


   public function store(Request $request)
{
    $room = Property::findOrFail($request->room_id);

    // Validate input
    $validated = $request->validate([
        'room_id' => 'required|exists:properties,id',
        'date' => 'required|date_format:Y-m-d|after_or_equal:today',
        'check_in_time' => 'required',
        'duration' => 'required|numeric|min:1',
        'amount' => 'required|numeric|min:0',
        'guests' => 'required|numeric|min:1|max:' . $room->max_people,

        'user_id' => 'required|exists:users,id',
    ]);

    // Fetch user data
    $user = User::findOrFail($validated['user_id']);
    $validated['name'] = $user->name;
    $validated['email'] = $user->email;
    $validated['phone'] = $user->mobile_number ?? $validated['phone'];

    // Validate duration and amount
    $prices = json_decode($room->price, true);
    $validPrice = collect($prices)->contains(function ($price) use ($validated) {
        return (int)$price['hours'] === (int)$validated['duration'] && (float)$price['amount'] === (float)$validated['amount'];
    });

    if (!$validPrice) {
        return back()->withErrors(['fail' => 'Invalid duration or price'])->withInput();
    }

    // Calculate check-out time
    $checkIn = Carbon::createFromFormat('Y-m-d H:i', $validated['date'] . ' ' . $validated['check_in_time']);
    $checkOut = $checkIn->copy()->addHours($validated['duration']);
    $checkOutHour = $checkOut->format('H:i');
    $checkOutDate = $checkOut->format('Y-m-d');

    // Check for conflicts
    $conflict = Reservation::where('room_id', $validated['room_id'])
        ->where('id', '!=', 0) // Always true for new reservations
        ->where(function ($query) use ($validated, $checkOutDate) {
            $query->where('date', $validated['date'])
                ->orWhere('date', $checkOutDate);
        })
        ->where(function ($query) use ($validated, $checkOutHour) {
            $query->whereBetween('check_in_time', [$validated['check_in_time'], $checkOutHour])
                ->orWhereBetween('check_out_time', [$validated['check_in_time'], $checkOutHour])
                ->orWhere(function ($sub) use ($validated, $checkOutHour) {
                    $sub->where('check_in_time', '<=', $validated['check_in_time'])
                        ->where('check_out_time', '>=', $checkOutHour);
                });
        })
        ->exists();

    if ($conflict) {
        return back()->withErrors(['fail' => 'Time slot not available'])->withInput();
    }

    // Create reservation
    try {
        $reservation = Reservation::create([
            'user_id' => $validated['user_id'],
            'room_id' => $validated['room_id'],
            'date' => $validated['date'],
            'full_name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'check_in_time' => $validated['check_in_time'],
            'check_out_time' => $checkOutHour,
            'duration' => $validated['duration'],
            'amount' => $validated['amount'],
            'guests' => $validated['guests'],
            'proof_path' => null,
            'payment_status' => 'pending',
        ]);

        $user->notify(new ReservationConfirmed($reservation));

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation created successfully.');
    } catch (\Exception $e) {
        return back()->withErrors(['fail' => 'Failed to create reservation'])->withInput();
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
            // Combine date and time and avoid timezone conversion
            $startDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $reservation->date . ' ' . $reservation->check_in_time);

            // Calculate end time: use duration if available, otherwise parse check_out_time
            if ($reservation->duration && $reservation->duration > 0) {
                $endDateTime = $startDateTime->copy()->addHours($reservation->duration);
            } else {
                $endDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $reservation->date . ' ' . $reservation->check_out_time);
                // Adjust for cross-day if check_out_time is earlier than check_in_time
                if ($endDateTime < $startDateTime) {
                    $endDateTime->addDay();
                }
            }

            // Skip invalid reservations (e.g., null times or invalid dates)
            if (!$startDateTime || !$endDateTime || $startDateTime->eq($endDateTime)) {
                continue;
            }

            $events[] = [
                'title' => $reservation->full_name,
                'start' => $startDateTime->format('Y-m-d\TH:i:s'), // No timezone offset
                'end' => $endDateTime->format('Y-m-d\TH:i:s'),
                'allDay' => false,
                'extendedProps' => [
                    'guests' => $reservation->guests,
                    'reservation_id' => $reservation->id,
                    'phone' => $reservation->phone,
                    'email' => $reservation->email,
                ],
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
    $room = Property::findOrFail($request->room_id);

    // Assign input manually (no validation)
    $user = User::findOrFail($request->user_id);

    $fullName = $user->name;
    $email = $user->email;
    $phone = $user->mobile_number ?? null;

    // Validate duration and amount against property prices
    $prices = json_decode($room->price, true);
    $validPrice = collect($prices)->contains(function ($price) use ($request) {
        return (int)$price['hours'] === (int)$request->duration && (float)$price['amount'] == (float)$request->amount;
    });

    if (!$validPrice) {
        return back()->withErrors(['fail' => 'Duración o precio inválidos'])->withInput();
    }

    // Calculate check-out time
    // Sanitize date and time inputs
    $date = Carbon::createFromFormat('Y-m-d', $request->date)->format('Y-m-d');
    $checkInTime = substr($request->check_in_time, 0, 5); // Take only HH:MM
    $checkIn = Carbon::createFromFormat('Y-m-d H:i', $date . ' ' . $checkInTime);
    $checkOut = $checkIn->copy()->addHours($request->duration);
    $checkOutHour = $checkOut->format('H:i');
    $checkOutDate = $checkOut->format('Y-m-d');

    // Check for conflicts
    $conflict = Reservation::where('room_id', $request->room_id)
        ->where('id', '!=', $reservation->id)
        ->where(function ($query) use ($request, $checkOutDate) {
            $query->where('date', $request->date)
                  ->orWhere('date', $checkOutDate);
        })
        ->where(function ($query) use ($request, $checkOutHour) {
            $query->whereBetween('check_in_time', [$request->check_in_time, $checkOutHour])
                  ->orWhereBetween('check_out_time', [$request->check_in_time, $checkOutHour])
                  ->orWhere(function ($sub) use ($request, $checkOutHour) {
                      $sub->where('check_in_time', '<=', $request->check_in_time)
                          ->where('check_out_time', '>=', $checkOutHour);
                  });
        })
        ->exists();

    if ($conflict) {
        return back()->withErrors(['fail' => 'No está disponible en ese horario'])->withInput();
    }

    // Update reservation
    try {
        $reservation->update([
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'date' => $request->date,
            'full_name' => $fullName,
            'email' => $email,
            'phone' => $phone,
            'check_in_time' => $request->check_in_time,
            'check_out_time' => $checkOutHour,
            'duration' => $request->duration,
            'amount' => $request->amount,
            'guests' => $request->guests,
            'payment_status' => $reservation->payment_status,
        ]);

        return redirect()->route('reservations.index')
            ->with('success', 'Reserva actualizada exitosamente.');
    } catch (\Exception $e) {
        return back()->withErrors(['fail' => 'No se pudo actualizar la reserva'])->withInput();
    }
}


    protected function getEventColor($guests)
{
    return match($guests) {
        1 => '#0d6efd', // Blue
        2 => '#6610f2', // Indigo
        3 => '#20c997', // Teal
        4 => '#fd7e14', // Orange
        5 => '#ffc107', // Yellow
        6 => '#198754', // Green
        7 => '#6f42c1', // Purple
        8 => '#dc3545', // Red
        default => '#6c757d', // Gray (fallback)
    };
}

}
