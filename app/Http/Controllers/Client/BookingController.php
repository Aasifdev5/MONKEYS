<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Property;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\BankDetails;
use Carbon\Carbon;
use App\Models\User;
use App\Notifications\ReservationConfirmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    /**
     * Show the search page for rooms.
     *
     * @return \Illuminate\View\View
     */
    public function showSearch()
    {
        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        $sliders = Banner::all()->map(function ($slider) {
            // Split every 4 words into a new line
            $words = explode(' ', $slider->title1);
            $chunks = array_chunk($words, 4); // Adjust 4 for the desired number of words per line
            $slider->title1 = implode('<br>', array_map(fn($chunk) => implode(' ', $chunk), $chunks));
            return $slider;
        });

        return view('client.search', compact('user_session', 'sliders'));
    }

    /**
     * Handle room search request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the booking form for the selected room.
     *
     * @param \App\Models\Room $room
     * @return \Illuminate\View\View
     */
    // Replace route binding with manual lookup (for testing)
   public function showForm($room, Request $request)
    {
        if (Session::has('LoggedIn')) {
            $room = Property::findOrFail($room);
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $qrcode = BankDetails::orderBy('id', 'desc')->first();

            // Retrieve query parameters
            $date = $request->query('date');
            $check_in_hour = $request->query('check_in_hour');
            $duration = $request->query('duration');
            $amount = $request->query('amount');
            $people = $request->query('people');
            $room_name = $request->query('room_name');

            // Validate required parameters
            if (!$date || !$check_in_hour || !$duration || !$amount || !$people) {
                return redirect()->back()->with('fail', 'Por favor, completa todos los campos requeridos');
            }

            // Validate duration and amount
            $durations = json_decode($room->price, true) ?? [];
            $valid_duration = collect($durations)->contains(function ($d) use ($duration, $amount) {
                return $d['hours'] == $duration && $d['amount'] == $amount;
            });

            if (!$valid_duration) {
                return redirect()->back()->with('fail', 'Duración o precio inválidos');
            }

            // Validate people
            if ($people < 1 || $people > $room->max_people) {
                return redirect()->back()->with('fail', 'Número de personas inválido');
            }

            // Calculate check_out_time
            try {
                $check_in_datetime = Carbon::createFromFormat('Y-m-d H:i', "$date $check_in_hour");
                $check_out_datetime = $check_in_datetime->copy()->addHours($duration);
                $check_out_hour = $check_out_datetime->format('H:i');
                $check_out_date = $check_out_datetime->format('Y-m-d');
            } catch (\Exception $e) {
                return redirect()->back()->with('fail', 'Formato de hora inválido');
            }

            // Check for booking conflicts
            $conflict = Reservation::where('room_id', $room->id)
                ->where(function ($query) use ($date, $check_in_hour, $check_out_hour, $check_out_date) {
                    $query->where('date', $date)
                          ->where(function ($q) use ($check_in_hour, $check_out_hour) {
                              $q->whereBetween('check_in_time', [$check_in_hour, $check_out_hour])
                                ->orWhereBetween('check_out_time', [$check_in_hour, $check_out_hour])
                                ->orWhere(function ($sub) use ($check_in_hour, $check_out_hour) {
                                    $sub->where('check_in_time', '<=', $check_in_hour)
                                        ->where('check_out_time', '>=', $check_out_hour);
                                });
                          });
                    if ($date !== $check_out_date) {
                        $query->orWhere('date', $check_out_date)
                              ->where(function ($q) use ($check_in_hour, $check_out_hour) {
                                  $q->whereBetween('check_in_time', [$check_in_hour, $check_out_hour])
                                    ->orWhereBetween('check_out_time', [$check_in_hour, $check_out_hour]);
                              });
                    }
                })
                ->exists();

            if ($conflict) {
                return redirect()->back()->with('fail', 'No está disponible en ese horario');
            }

            return view('client.booking-form', compact(
                'user_session',
                'room',
                'date',
                'check_in_hour',
                'check_out_hour',
                'duration',
                'amount',
                'people',
                'room_name',
                'qrcode'
            ));
        } else {
            return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }

    /**
     * Submit the booking request for the selected room.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Property $room
     * @return \Illuminate\Http\RedirectResponse
     */
        public function submit(Request $request, Property $room)
    {
        // Validate form data
        $validated = $request->validate([
            'room_id' => 'required|exists:properties,id',
            'date' => 'required|date_format:Y-m-d',
            'check_in_hour' => 'required|date_format:H:i',
            'check_out_hour' => 'required|date_format:H:i',
            'duration' => 'required|numeric|min:1',
            'amount' => 'required|numeric|min:0',
            'people' => 'required|numeric|min:1|max:'.$room->max_people,
            'proof' => 'required|file|mimes:jpg,png,pdf|max:2048', // 2MB max
            'host_message' => 'nullable|string|max:1000',
        ]);

        // Validate duration and amount against property's price
        $durations = json_decode($room->price, true) ?? [];
        $valid_duration = collect($durations)->contains(function ($d) use ($validated) {
            return $d['hours'] == $validated['duration'] && $d['amount'] == $validated['amount'];
        });

        if (!$valid_duration) {
            return redirect()->back()->with('fail', 'Duración o precio inválidos');
        }

        // Check for booking conflicts
        $conflict = Reservation::where('room_id', $room->id)
            ->where(function ($query) use ($validated) {
                $query->where('date', $validated['date'])
                      ->where(function ($q) use ($validated) {
                          $q->whereBetween('check_in_time', [$validated['check_in_hour'], $validated['check_out_hour']])
                            ->orWhereBetween('check_out_time', [$validated['check_in_hour'], $validated['check_out_hour']])
                            ->orWhere(function ($sub) use ($validated) {
                                $sub->where('check_in_time', '<=', $validated['check_in_hour'])
                                    ->where('check_out_time', '>=', $validated['check_out_hour']);
                            });
                      });
                $check_in_datetime = Carbon::createFromFormat('Y-m-d H:i', $validated['date'].' '.$validated['check_in_hour']);
                $check_out_datetime = $check_in_datetime->copy()->addHours($validated['duration']);
                $check_out_date = $check_out_datetime->format('Y-m-d');
                if ($validated['date'] !== $check_out_date) {
                    $query->orWhere('date', $check_out_date)
                          ->where(function ($q) use ($validated) {
                              $q->whereBetween('check_in_time', [$validated['check_in_hour'], $validated['check_out_hour']])
                                ->orWhereBetween('check_out_time', [$validated['check_in_hour'], $validated['check_out_hour']]);
                          });
                }
            })
            ->exists();

        if ($conflict) {
            return redirect()->back()->with('fail', 'No está disponible en ese horario');
        }

       // Handle proof upload
        $proofPath = null;

        if ($request->hasFile('proof')) {
            $proof = $request->file('proof');
            $proofFileName = time() . '_' . $proof->getClientOriginalName();

            // Move the uploaded file to public/uploads/proofs
            $proof->move(public_path('uploads/proofs'), $proofFileName);

            // Set the relative path
            $proofPath = 'uploads/proofs/' . $proofFileName;
        }

        // Create reservation
        $reservation = Reservation::create([
            'user_id' => Session::get('LoggedIn'),
            'room_id' => $validated['room_id'],
            'date' => $validated['date'],
            'full_name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'check_in_time' => $validated['check_in_hour'],
            'check_out_time' => $validated['check_out_hour'],
            'duration' => $validated['duration'],
            'amount' => $validated['amount'],
            'guests' => $validated['people'],
            'proof_path' => $proofPath,
            'host_message' => $validated['host_message'],
            'payment_status' => 'pending',
        ]);

        // Notify the user
        $user = $reservation->user; // assuming the reservation has a `user` relationship
        $user->notify(new ReservationConfirmed($reservation));
        return redirect()->route('thank.you', ['reservationId' => $reservation->id]);
    }
    public function showThankYouPage($reservationId)
    {
        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $reservation = Reservation::find($reservationId); // Adjust this based on how you're fetching the reservation
            return view('client.thank-you', compact('reservation','user_session'));
        } else {
            return Redirect()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
}
