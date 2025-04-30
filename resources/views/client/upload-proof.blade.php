@extends('master')

@section('content')
<div class="container text-center">
    <h4>Scan QR to Pay</h4>
    <img src="{{ asset('images/qr-code.png') }}" class="img-fluid mb-3" style="max-width: 300px;">

    <form method="POST" action="{{ route('booking.uploadProof', $reservation->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="file" name="proof" class="form-control" >
        </div>
        <button class="btn btn-success">Upload Proof</button>
    </form>
</div>
@endsection
