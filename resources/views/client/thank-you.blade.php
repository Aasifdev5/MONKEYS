@extends('master')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Thank You for Your Reservation!</h3>
            <p>Your reservation has been received and will be manually confirmed soon.</p>
            <p>A confirmation email has been sent to {{ $reservation->user->email }}.</p>
            @if($reservation->phone)
                <p>A WhatsApp confirmation has also been sent to {{ $reservation->phone }}.</p>
            @endif
            <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
        </div>
    </div>
@endsection
