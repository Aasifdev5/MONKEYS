@extends('layout.master')
@section('title', 'Calendario de Reservas')
@section('main_content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0"><i class="fas fa-calendar-alt me-2"></i>Calendario de Reservas</h3>
        </div>
        <div class="card-body">
            <div id="calendar"></div>
        </div>
    </div>
</div>

<!-- Include FullCalendar and necessary plugins -->
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/locales/es.global.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    #calendar {

        border-radius: 8px;
    }
    .fc-event {
        cursor: pointer;
        border-radius: 4px;
        padding: 2px 4px;
    }
    .fc-daygrid-event {
        white-space: normal !important;
    }
    .fc-event-title {
        font-weight: bold;
    }
    .fc-event-time {
        font-weight: normal;
    }
    .fc-toolbar-title {
        font-size: 1.4rem;
        color: #333;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        buttonText: {
            today: 'Hoy',
            month: 'Mes',
            week: 'Semana',
            day: 'Día'
        },
        firstDay: 1, // Monday as first day
        navLinks: true,
        editable: false,
        dayMaxEvents: true,
        events: {
            url: '{{ route("reservations.calendar.events") }}',
            method: 'GET',
            failure: function() {
                alert('Error al cargar las reservas');
            }
        },
        eventDisplay: 'block',
        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        },
        eventDidMount: function(info) {
            // Customize event appearance
            const eventEl = info.el;

            // Add tooltip
            eventEl.setAttribute('data-bs-toggle', 'tooltip');
            eventEl.setAttribute('data-bs-placement', 'top');
            eventEl.setAttribute('title',
                `${info.event.title}\n` +
                `Check-in: ${info.event.start.toLocaleTimeString('es-ES', {hour: '2-digit', minute:'2-digit'})}\n` +
                `Check-out: ${info.event.end.toLocaleTimeString('es-ES', {hour: '2-digit', minute:'2-digit'})}\n` +
                `Huéspedes: ${info.event.extendedProps.guests}`
            );

            // Initialize tooltip
            new bootstrap.Tooltip(eventEl);

            // Color coding based on number of guests
            const guests = info.event.extendedProps.guests;
            if (guests > 4) {
                eventEl.style.backgroundColor = '#dc3545'; // Red for large groups
            } else if (guests > 2) {
                eventEl.style.backgroundColor = '#fd7e14'; // Orange for medium groups
            } else {
                eventEl.style.backgroundColor = '#0d6efd'; // Blue for small groups
            }
        }
    });

    calendar.render();
});
</script>
@endsection
