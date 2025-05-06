```blade
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pago Confirmado</title>
</head>
<body>
    <h1>Pago Confirmado</h1>
    <p>Estimado/a {{ $reservation->full_name }},</p>
    <p>Nos complace informarle que el pago de su reserva ha sido confirmado.</p>
    <ul>
        <li><strong>Habitación:</strong> {{ $reservation->room ? $reservation->room->name : 'N/D' }}</li>
        <li><strong>Fecha:</strong> {{ $reservation->date }}</li>
        <li><strong>Hora de Entrada:</strong> {{ $reservation->check_in_time }}</li>
    </ul>
    <p>¡Esperamos darle la bienvenida pronto!</p>
    <p>Saludos,</p>
    <p>Equipo de Reservas</p>
</body>
</html>
```
