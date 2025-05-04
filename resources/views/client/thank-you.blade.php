@extends('master')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body text-center">
                        <!-- Font Awesome Icon -->
                        <i class="fas fa-check-circle text-success mb-4" style="font-size: 100px;"></i>

                        <h3 class="text-success mb-3">¡Gracias por su Reserva!</h3>
                        <p class="lead mb-3">Su reserva ha sido recibida y será confirmada manualmente en breve.</p>
                        <p class="mb-3">Se ha enviado un correo electrónico de confirmación a <strong>{{ $reservation->user->email }}</strong>.</p>

                        @if($reservation->phone)
                            <p class="mb-3">También se ha enviado una confirmación por WhatsApp al número <strong>{{ $reservation->phone }}</strong>.</p>
                        @endif

                        <a href="{{ route('home') }}" class="btn btn-success btn-lg w-100">Volver a la página principal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
