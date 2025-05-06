<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Property;
use App\Models\Reservation;
use App\Models\Room;
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
        $room = Property::findOrFail($room); // Will return 404 if not found
        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        // Retrieve query parameters
        $date = $request->query('date');
        $check_in_hour = $request->query('check_in_hour');
        $check_out_hour = $request->query('check_out_hour');
        $people = $request->query('people');
        $room_name = $request->query('room_name');
        $room_price = $request->query('room_price');

        // Validate that required parameters are present
        if ($date && $check_in_hour && $check_out_hour) {
            // Check for booking conflicts
            $conflict = Reservation::where('room_id', $room->id)
                ->where('date', $date)
                ->where(function ($query) use ($check_in_hour, $check_out_hour) {
                    $query->whereBetween('check_in_time', [$check_in_hour, $check_out_hour])
                          ->orWhereBetween('check_out_time', [$check_in_hour, $check_out_hour])
                          ->orWhere(function ($q) use ($check_in_hour, $check_out_hour) {
                              $q->where('check_in_time', '<=', $check_in_hour)
                                ->where('check_out_time', '>=', $check_out_hour);
                          });
                })
                ->exists();

            if ($conflict) {
                return Redirect()->back()->with('fail', 'No está disponible en ese horario');
            }
        }

        return view('client.booking-form', compact(
            'user_session',
            'room',
            'date',
            'check_in_hour',
            'check_out_hour',
            'people',
            'room_name',
            'room_price'
        ));
    } else {
        return Redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
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
        $request->validate([
            'date' => 'required|date',
            'check_in' => 'required',
            'check_out' => 'required',
            'guests' => 'required|integer|min:1',
            'proof' => 'required|file|mimes:jpg,png,pdf',
        ]);

        // Handle proof upload
        $proofPath = null;
        if ($request->hasFile('proof')) {
            $proof = $request->file('proof');
            $proofFileName = time() . '-' . \Illuminate\Support\Str::random(10) . '.' . $proof->getClientOriginalExtension();
            $proofPath = $proof->storeAs('uploads/proofs', $proofFileName, 'public');
        }

        // Create booking
        $reservation  = Reservation::create([
            'user_id' => Session::get('LoggedIn'),
            'room_id' => $room->id,
            'full_name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => $request->date,
            'check_in_time' => $request->check_in,
            'check_out_time' => $request->check_out,
            'guests' => $request->guests,
            'proof_path' => $proofPath,
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
