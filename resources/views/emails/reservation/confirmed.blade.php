<!DOCTYPE html>
<html>
<head>
    <title>Reservation Confirmed</title>
</head>
<body>
    <h1>Your reservation has been confirmed!</h1>
    <p>Room: {{ $reservation->room->name }}</p>
    <p>Date: {{ $reservation->date->format('F j, Y') }}</p>
    <p>Check-in: {{ $reservation->check_in->format('F j, Y, g:i A') }}</p>
    <p>Check-out: {{ $reservation->check_out->format('F j, Y, g:i A') }}</p>
    <p><a href="{{ url('/reservations/' . $reservation->id) }}">View Reservation</a></p>
</body>
</html>
