```blade
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Recordatorio de Check-In</title>
</head>
<body>
    <h1>Recordatorio de Check-In</h1>
    <p>Estimado/a {{ $reservation->full_name }},</p>
    <p>Le recordamos que su check-in está programado para mañana:</p>
    <ul>
        <li><strong>Habitación:</strong> {{ $reservation->room ? $reservation->room->name : 'N/D' }}</li>
        <li><strong>Fecha:</strong> {{ $reservation->date }}</li>
        <li><strong>Hora de Entrada:</strong> {{ $reservation->check_in_time }}</li>
    </ul>
    <p>Por favor, llegue a tiempo. Contáctenos si tiene alguna pregunta.</p>
    <p>Saludos cordiales,</p>
    <p>Equipo de Reservas</p>
</body>
</html>
```
