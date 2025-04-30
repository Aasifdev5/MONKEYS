@extends('layouts.app')

@section('content')
<div class="container">
    <h3>My Reservations</h3>
    <table class="table" id="ownerReservations">
        <thead><tr><th>Room</th><th>Check-in</th><th>Check-out</th><th>Guests</th><th>Status</th></tr></thead>
        <tbody>
            @foreach($reservations as $r)
            <tr>
                <td>{{ $r->room->room_type }}</td>
                <td>{{ $r->check_in_time }}</td>
                <td>{{ $r->check_out_time }}</td>
                <td>{{ $r->guests }}</td>
                <td>{{ $r->payment_status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>$('#ownerReservations').DataTable();</script>
@endpush
