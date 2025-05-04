<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reserva Confirmada</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f7f7f7; padding: 20px;">
    <div style="background-color: #ffffff; padding: 20px; border-radius: 8px;">
        <h2 style="color: #4CAF50;">¡Tu reserva ha sido confirmada!</h2>

        <p><strong>Nombre del huésped:</strong> {{ $reservation->full_name }}</p>
        <p><strong>Alojamiento:</strong> {{ $reservation->room->name }}</p>
        <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($reservation->date)->format('j F, Y') }}</p>
        <p><strong>Hora de entrada:</strong> {{ $reservation->check_in_time }}</p>
        <p><strong>Hora de salida:</strong> {{ $reservation->check_out_time }}</p>
        <p><strong>Número de huéspedes:</strong> {{ $reservation->guests }}</p>

        <p style="margin-top: 20px;">
            <a href="{{ url('/reservations/' . $reservation->id) }}"
               style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: #ffffff; text-decoration: none; border-radius: 4px;">
                Ver Detalles de la Reserva
            </a>
        </p>

        <p style="margin-top: 20px;">Gracias por confiar en nosotros.</p>
    </div>
</body>
</html>
