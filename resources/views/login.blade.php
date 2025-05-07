@extends('master')

@section('title')
    {{ __('Iniciar Sesión') }}
@endsection

@section('content')
@php
$general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();
$category = getCategory();
$adminNotifications = userNotifications();
@endphp
<div class="container mt-5">
    <div class="card p-4 shadow-sm mx-auto" style="max-width: 400px; border-radius: 12px;">


        <div class="text-center mb-4">
            <h5 class="fw-bold mb-0">Iniciar sesión</h5>
            <img
                loading="lazy"
                class="logo_image mt-2 d-inline-block"
                src="{{ asset($general_setting['app_footer_payment_image'] ?? '') }}"
                srcset="{{ asset($general_setting['app_footer_payment_image'] ?? '') }}"
                alt="Monos"
                width="210"
                height="47"
            >
        </div>


        <form method="POST" action="{{ url('log') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Ingresa tu correo" style="border-radius: 8px;" >
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa tu contraseña" style="border-radius: 8px;" >
            </div>

            <div class="mb-3 text-end">
                <a href="{{ url('signup') }}" class="text-decoration-none" style="font-size: 14px;">Registrarse?</a>
            </div>

            <button type="submit" class="btn w-100 mb-3" style="background-color: #ff385c; border-color: #ff385c; color: #fff; border-radius: 8px;">Iniciar Sesión</button>
        </form>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    .form-label {
        font-size: 14px;
        font-weight: 500;
    }

    .form-control, .btn {
        padding: 10px;
    }

    .card {
        border: none;
    }

    hr {
        border-top: 1px solid #ddd;
    }
</style>
@endpush
@endsection
