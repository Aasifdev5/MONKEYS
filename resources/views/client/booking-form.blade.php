@extends('master')

@section('content')
@push('styles')
<!-- Airbnb-like Flatpickr and Fonts -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Circular,-apple-system,BlinkMacSystemFont,Roboto,Helvetica Neue,sans-serif&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    :root {
        --airbnb-pink: #FF385C;
        --airbnb-dark: #222222;
        --airbnb-light-gray: #f7f7f7;
        --airbnb-gray: #717171;
        --airbnb-border: #dddddd;
        --airbnb-star: #FF385C;
        --airbnb-success: #008A05;
        --gradient-start: #ffffff;
        --gradient-end: #f9f9f9;
        --shadow-sm: 0 1px 2px rgba(0,0,0,0.08);
        --shadow-md: 0 4px 12px rgba(0,0,0,0.12);
        --shadow-lg: 0 8px 24px rgba(0,0,0,0.16);
        --transition: all 0.2s ease-out;
    }

    body {
        font-family: 'Circular', -apple-system, BlinkMacSystemFont, 'Helvetica Neue', sans-serif;
        color: var(--airbnb-dark);
        line-height: 1.5;
        -webkit-font-smoothing: antialiased;
    }

    .container {
        max-width: 1120px;
        margin: 0 auto;
        padding: 0 24px;
    }

    .card {
        border-radius: 12px;
        border: 1px solid var(--airbnb-border);
        background: white;
    }

    .shadow-sm {
        box-shadow: var(--shadow-sm);
    }

    .shadow-md {
        box-shadow: var(--shadow-md);
    }

    .text-muted {
        color: var(--airbnb-gray) !important;
    }

    .text-success {
        color: var(--airbnb-success) !important;
    }

    .fw-bold {
        font-weight: 700 !important;
    }

    .btn-primary {
        background-color: var(--airbnb-pink) !important;
        border-color: var(--airbnb-pink) !important;
        transition: var(--transition);
    }

    .btn-primary:hover {
        background-color: #e63946 !important;
        border-color: #e63946 !important;
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .btn-outline-dark {
        border-color: var(--airbnb-dark);
        color: var(--airbnb-dark);
        transition: var(--transition);
    }

    .btn-outline-dark:hover {
        background-color: var(--airbnb-light-gray);
        border-color: var(--airbnb-gray);
    }

    .sticky-top {
        position: sticky;
        top: 90px;
    }

    .list-unstyled {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .list-unstyled li {
        margin-bottom: 12px;
        display: flex;
        align-items: center;
    }

    /* Booking Fields (from last response) */
    .booking-dates {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 16px;
    }

    .booking-date-field {
        position: relative;
        border: 1px solid var(--airbnb-dark);
        border-radius: 8px;
        padding: 12px;
        font-size: 14px;
        cursor: pointer;
        transition: border-color 0.2s ease;
    }

    .booking-date-field:hover {
        border-color: var(--airbnb-pink);
    }

    .booking-date-field label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 10px;
        font-weight: 700;
        color: var(--airbnb-dark);
        text-transform: uppercase;
        margin-bottom: 4px;
    }

    .booking-date-field label span.emoji {
        font-size: 16px;
    }

    .booking-date-field input {
        border: none;
        font-size: 14px;
        color: var(--airbnb-dark);
        font-weight: 500;
        width: 100%;
        outline: none;
        background: transparent;
    }

    .booking-date-field input::placeholder {
        color: var(--airbnb-gray);
        font-weight: 400;
    }

    .booking-guests {
        position: relative;
        margin-bottom: 16px;
    }

    .guest-input {
        border: 1px solid var(--airbnb-dark);
        border-radius: 8px;
        padding: 12px;
        font-size: 14px;
        background: white;
        display: flex;
        flex-direction: column;
        transition: var(--transition);
    }

    .guest-input:hover {
        border-color: var(--airbnb-pink);
    }

    .guest-input label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 10px;
        font-weight: 700;
        color: var(--airbnb-dark);
        text-transform: uppercase;
        margin-bottom: 4px;
    }

    .guest-input label span.emoji {
        font-size: 16px;
    }

    .guest-input input {
        border: none;
        font-size: 14px;
        color: var(--airbnb-dark);
        font-weight: 500;
        width: 100%;
        outline: none;
    }

    .guest-input input::placeholder {
        color: var(--airbnb-gray);
        font-weight: 400;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .sticky-top {
            position: static;
            top: 0;
        }
    }
</style>
@endpush

<div class="container mt-4">
    <form method="POST" action="{{ route('booking.submit', $room->id) }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-7">
                <!-- Your Trip -->
                <div class="card p-4 shadow-sm mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="fw-bold">Tu viaje</h3>
                        <button class="btn btn-link text-decoration-none">Editar</button>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset( $room->thumbnail) }}" class="rounded me-3" width="150" alt="Propiedad">
                        <div>
                            <h5 class="mb-0">{{ $room_name ?? $room->title ?? 'Habitación de Prueba' }}</h5>
                            <p class="text-muted mb-0">{{ $room->room_type ?? 'Estancia en granja' }} ·  {{ $room->description  }} </p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <p><strong>Fechas</strong> <span>{{ $date ?? '2025-05-01' }}</span> <a href="#" class="text-decoration-none">Editar</a></p>
                        <p><strong>Hora de entrada</strong> <span>{{ $check_in_hour ?? '14:00' }}</span> <a href="#" class="text-decoration-none">Editar</a></p>
                        <p><strong>Hora de salida</strong> <span>{{ $check_out_hour ?? '11:00' }}</span> <a href="#" class="text-decoration-none">Editar</a></p>
                        <p><strong>Huéspedes</strong> <span>{{ $people ?? 2 }} huésped{{ ($people ?? 2) > 1 ? 'es' : '' }}</span> <a href="#" class="text-decoration-none">Editar</a></p>
                    </div>

                    <!-- Date, Check-in, Check-out, and Guests Fields -->
                    <div class="booking-dates">
                        <div class="booking-date-field">
                            <label><span class="emoji">📅</span> Fecha</label>
                            <input type="text" id="date-picker" name="date" placeholder="Añadir fecha" value="{{ $date ?? '' }}" readonly>
                        </div>
                        <div class="booking-date-field">
                            <label><span class="emoji">⏰</span> Hora de entrada</label>
                            <input type="text" id="check-in-hour-picker" name="check_in" placeholder="Añadir hora" value="{{ $check_in_hour ?? '' }}" readonly>
                        </div>
                        <div class="booking-date-field">
                            <label><span class="emoji">⏰</span> Hora de salida</label>
                            <input type="text" id="check-out-hour-picker" name="check_out" placeholder="Añadir hora" value="{{ $check_out_hour ?? '' }}" readonly>
                        </div>
                    </div>
                    <input type="hidden" id="name" name="name"  value="{{ $user_session->name ?? '' }}" readonly>
                    <input type="hidden" id="email" name="email"  value="{{ $user_session->email ?? '' }}" readonly>
                    <input type="hidden" id="phone" name="phone"  value="{{ $user_session->mobile_number ?? '' }}" readonly>
                    <div class="booking-guests">
                        <div class="guest-input">
                            <label><span class="emoji">👥</span> Número de personas</label>
                            <input type="number" id="guest-count" name="guests" min="1" max="{{ $room->max_people ?? 10 }}" value="{{ $people ?? 1 }}" readonly>
                        </div>
                    </div>
                </div>

                <!-- QR & Upload -->
                <div class="card p-4 shadow-sm mb-4">
                    <h5 class="fw-bold mb-3">Escanear QR para pagar</h5>
                    <div class="text-center mb-3">
                        <img src="{{ asset('images/qr-code.png') }}" class="img-fluid" style="max-width: 300px;">
                    </div>
                    <div class="mb-3">
                        <label for="proof" class="form-label">Subir comprobante de pago</label>
                        <input type="file" name="proof" class="form-control">
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="card p-4 shadow-sm mb-4">
                    <h5 class="fw-bold mb-3">Información para tu viaje</h5>
                    <div class="mb-3">
                        <label>Mensaje al anfitrión</label>
                        <p class="text-muted mb-2">Antes de continuar, cuéntale un poco a tu anfitrión sobre tu viaje.</p>
                        <button type="button" class="btn btn-outline-dark btn-sm">Añadir</button>
                    </div>
                    <div class="mb-3">
                        <label>Número de teléfono</label>
                        <p class="text-muted mb-2">Añade y confirma tu número de teléfono para recibir actualizaciones del viaje.</p>
                        <button type="button" class="btn btn-outline-dark btn-sm">Añadir</button>
                    </div>

                    <!-- Policy -->
                    <h5 class="fw-bold mt-4">Política de cancelación</h5>
                    <p>Esta reserva no es reembolsable. <a href="#" class="text-decoration-none">Saber más</a></p>

                    <h5 class="fw-bold mt-4">Reglas básicas</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i> Seguir las reglas de la casa</li>
                        <li><i class="fas fa-check text-success me-2"></i> Trata el hogar de tu anfitrión como si fuera el tuyo</li>
                    </ul>
                </div>
            </div>

            <!-- Right Column: Pricing Summary -->
            <div class="col-lg-5">
                <div class="card p-4 shadow-sm sticky-top">
                    <h5 class="fw-bold">Tu total</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <p>Bs{{ number_format($room_price ?? $room->price ?? 6276, 2) }} x 1 hora</p>
                        <p>Bs{{ number_format($room_price ?? $room->price ?? 6276, 2) }}</p>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <p>Tarifa de limpieza</p>
                        <p>Bs1500</p>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <p>Tarifa de servicio</p>
                        <p>Bs2368</p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h6>Total (Bs)</h6>
                        <h6>Bs{{ number_format(($room_price ?? $room->price ?? 6276) + 1500 + 2368, 2) }}</h6>
                    </div>
                    <p class="text-muted text-center mt-2">Desglose de precios</p>

                    <!-- Submit -->
                    <p class="text-muted mt-4">El anfitrión deberá aceptar esta solicitud. Pagarás ahora, pero recibirás un reembolso completo si no se confirma en 24 horas.</p>
                    <button type="submit" class="btn btn-primary w-100 mb-2">
                        Solicitar reserva
                    </button>
                    <p class="text-muted text-center">
                        Al seleccionar el botón, acepto las reglas de la casa del anfitrión, la política de reembolsos de 🐵 MONOS Booking y los términos de responsabilidad por daños.
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    // Initialize Flatpickr for date and time pickers
    flatpickr("#date-picker", {
        dateFormat: "Y-m-d",
        minDate: "today",
        allowInput: true,
        onClose: function(selectedDates, dateStr, instance) {
            if (selectedDates.length > 0) {
                instance.input.value = dateStr;
            }
        }
    });

    flatpickr("#check-in-hour-picker", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        allowInput: true,
        onClose: function(selectedDates, dateStr, instance) {
            if (selectedDates.length > 0) {
                instance.input.value = dateStr;
            }
        }
    });

    flatpickr("#check-out-hour-picker", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        allowInput: true,
        onClose: function(selectedDates, dateStr, instance) {
            if (selectedDates.length > 0) {
                instance.input.value = dateStr;
            }
        }
    });

    // Update guests value on input change
    $("#guest-count").on("input", function() {
        let value = $(this).val();
        if (value < 1) {
            $(this).val(1);
        }
    });
});
</script>
@endpush
@endsection
