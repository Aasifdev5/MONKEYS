@extends('master')

@section('title')
Confirmar Reserva - {{ $room_name }}
@endsection

@section('content')
@push('styles')
<!-- Airbnb-like Flatpickr and Fonts -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Circular,-apple-system,BlinkMacSystemFont,Roboto,Helvetica Neue,sans-serif&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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

    .booking-details, .payment-details {
        margin-bottom: 30px;
        padding: 20px;
        border: 1px solid var(--airbnb-border);
        border-radius: 8px;
    }

    .booking-details p, .payment-details p {
        font-size: 16px;
        margin: 10px 0;
    }

    .alert-warning {
        background-color: #E63946;
        color: white;
        font-size: 0.95rem;
        border-radius: 20px;
        padding: 12px 16px;
        display: flex;
        align-items: center;
    }

    .alert-warning i {
        margin-right: 8px;
    }

    @media (max-width: 768px) {
        .sticky-top {
            position: static;
            top: 0;
        }

        .container {
            padding: 0 16px;
        }
    }
</style>
@endpush

<div class="container mt-4">
    @if (session('fail'))
        <div class="alert alert-danger">
            {{ session('fail') }}
        </div>
    @endif

    <form method="POST" action="{{ route('booking.submit', $room->id) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="room_id" value="{{ $room->id }}">
        <input type="hidden" name="date" value="{{ $date }}">
        <input type="hidden" name="check_in_hour" value="{{ $check_in_hour }}">
        <input type="hidden" name="check_out_hour" value="{{ $check_out_hour }}">
        <input type="hidden" name="duration" value="{{ $duration }}">
        <input type="hidden" name="amount" value="{{ $amount }}">
        <input type="hidden" name="people" value="{{ $people }}">
        <input type="hidden" id="name" name="name"  value="{{ $user_session->name ?? '' }}" readonly>
                    <input type="hidden" id="email" name="email"  value="{{ $user_session->email ?? '' }}" readonly>
                    <input type="hidden" id="phone" name="phone"  value="{{ $user_session->mobile_number ?? '' }}" readonly>

        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-7">
                <!-- Booking Details -->
                <div class="card p-4 shadow-sm mb-4">
                    <h3 class="fw-bold mb-3">Tu viaje</h3>
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset( $room->thumbnail) }}" class="rounded me-3" width="150" alt="Propiedad">
                        <div>
                            <h5 class="mb-0">{{ $room_name ?? $room->name ?? 'Habitación de Prueba' }}</h5>
                            <p class="text-muted mb-0">{{ $room->description ?? 'Sin descripción disponible' }}</p>
                        </div>
                    </div>
                    <div class="booking-details">
                        <p><strong>Fecha:</strong> {{ $date }}</p>
                        <p><strong>Hora de entrada:</strong> {{ $check_in_hour }}</p>
                        <p><strong>Hora de salida:</strong> {{ $check_out_hour }}</p>
                        <p><strong>Duración:</strong> {{ $duration }} hora{{ $duration > 1 ? 's' : '' }}</p>
                        <p><strong>Precio:</strong> Bs{{ number_format($amount, 2) }}</p>
                        <p><strong>Huéspedes:</strong> {{ $people }} huésped{{ $people > 1 ? 'es' : '' }}</p>
                    </div>
                </div>

                <!-- QR & Upload -->
                <div class="card p-4 shadow-sm mb-4">
                    <h5 class="fw-bold mb-3">Escanear QR para pagar</h5>
                    <div class="text-center mb-4">
                        @if ($qrcode)
                            <div class="d-inline-block p-3 border rounded shadow-sm bg-white">
                                <img src="{{ asset('qrcode/' . $qrcode->qrcode_path) }}" alt="Código QR" class="img-fluid mb-3" style="max-width: 150px; height: auto;">
                                <a href="{{ asset('qrcode/' . $qrcode->qrcode_path) }}" download="qr_code.png" class="btn btn-primary w-100">
                                    <i class="fa fa-download me-2"></i> Descargar Código QR
                                </a>
                            </div>
                        @else
                            <p class="text-muted">No hay código QR disponible.</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="proof" class="form-label">Subir comprobante de pago</label>
                        <input type="file" name="proof" class="form-control" accept="image/*,application/pdf">
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="card p-4 shadow-sm mb-4">
                    <h5 class="fw-bold mb-3">Información para tu viaje</h5>
                    <div class="mb-3">
                        <label>Mensaje al anfitrión</label>
                        <p class="text-muted mb-2">Cuéntale un poco a tu anfitrión sobre tu viaje.</p>
                        <textarea name="host_message" class="form-control" rows="4" placeholder="Escribe tu mensaje aquí..."></textarea>
                    </div>
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
                        <p>Bs{{ number_format($amount, 2) }} x {{ $duration }} hora{{ $duration > 1 ? 's' : '' }}</p>
                        <p>Bs{{ number_format($amount, 2) }}</p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h6>Total (Bs)</h6>
                        <h6>Bs{{ number_format($amount, 2) }}</h6>
                    </div>
                    <p class="text-muted text-center mt-2">Desglose de precios</p>

                    <div class="alert-warning shadow-sm py-2 px-4 mt-4 mb-3">
                        <i class="fas fa-exclamation-triangle fa-shake"></i>
                        <span class="fw-semibold">Debes subir el comprobante de pago primero.</span>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-2">
                        Solicitar reserva
                    </button>
                    <p class="text-muted text-center">
                        Al seleccionar el botón, acepto las reglas de la casa del anfitrión, la política de reembolsos y los términos de responsabilidad por daños.
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function () {
    // Initialize Flatpickr (for display purposes, inputs are read-only)
    flatpickr("#date-picker", {
        dateFormat: "Y-m-d",
        minDate: "today",
        allowInput: false
    });

    flatpickr("#check-in-hour-picker", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        allowInput: false
    });

    // Validate file upload before submission
    $('form').on('submit', function(e) {
        const proof = $('input[name="proof"]').val();
        if (!proof) {
            e.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Comprobante requerido',
                text: 'Por favor, sube el comprobante de pago antes de continuar.',
            });
        }
    });
});
</script>
@endpush
@endsection
