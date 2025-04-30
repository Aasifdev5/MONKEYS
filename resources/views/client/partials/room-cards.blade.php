@forelse($rooms as $room)
<div class="col-md-4">
    <div class="card mb-3">
        <img src="{{ asset('images/rooms/' . $room->image) }}" class="card-img-top">
        <div class="card-body">
            <h5>{{ $room->room_type }}</h5>
            <p>₱{{ $room->price_per_hour }}/hr - Max: {{ $room->max_guests }} guests</p>
            <a href="{{ route('booking.form', ['room' => $room->id] + request()->all()) }}" class="btn btn-success">Book Now</a>
        </div>
    </div>
</div>
@empty
<div class="col-12"><p>No rooms available.</p></div>
@endforelse
