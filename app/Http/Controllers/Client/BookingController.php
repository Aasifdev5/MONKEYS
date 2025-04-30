<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
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
    public function search(Request $request)
    {
        // Validate search criteria
        $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'location' => 'required|string',
            'guests' => 'required|integer|min:1', // Ensure guest count is positive
        ]);

        // Get rooms based on search criteria
        $rooms = Room::where('location', 'like', '%' . $request->location . '%')
            ->where('max_guests', '>=', $request->guests)
            ->whereDoesntHave('reservations', function ($query) use ($request) {
                // Exclude rooms already reserved during the selected dates and times
                $query->where('date', $request->check_in)
                    ->where(function ($q) use ($request) {
                        // Buffer times for check-in and check-out
                        $checkInBuffer = date('H:i', strtotime($request->check_in) - 3600);
                        $checkOutBuffer = date('H:i', strtotime($request->check_out) + 3600);
                        $q->whereBetween('check_in_time', [$checkInBuffer, $checkOutBuffer])
                            ->orWhereBetween('check_out_time', [$checkInBuffer, $checkOutBuffer]);
                    });
            })
            ->get();

        return view('client.partials.room-cards', compact('rooms'));
    }

    /**
     * Show the booking form for the selected room.
     *
     * @param \App\Models\Room $room
     * @return \Illuminate\View\View
     */
    // Replace route binding with manual lookup (for testing)
    public function showForm($room)
    {
        $room = Room::findOrFail($room); // will still return 404 if not found
        return view('client.booking-form', compact('room'));
    }


    /**
     * Submit the booking request for the selected room.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(Request $request, Room $room)
    {
        // Validate form data
        $request->validate([
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|email',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        // Create reservation
        $reservation = Reservation::create([
            'room_id' => $room->id,
            'guest_name' => $request->guest_name,
            'guest_email' => $request->guest_email,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'status' => 'pending',
        ]);

        return redirect()->route('thank.you');
    }
}
