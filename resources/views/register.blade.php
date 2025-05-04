@extends('master')

@section('title')
    {{ __('Registro de Cliente') }}
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
            <h5 class="fw-bold mb-0">Registro de Cliente</h5>
            <img
                loading="lazy"
                class="logo_image mt-2"
                src="{{ asset($general_setting['app_footer_payment_image'] ?? '') }}"
                srcset="{{ asset($general_setting['app_footer_payment_image'] ?? '') }}"
                alt="Monos"
                width="210"
                height="47"
            >
        </div>

        <form method="POST" action="{{ url('reg') }}">
            @csrf

            @if (Session::has('flash_message'))
                <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
            @endif

            @if (Session::has('error_flash_message'))
                <div class="alert alert-danger">{{ Session::get('error_flash_message') }}</div>
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Tu nombre" style="border-radius: 8px;" >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Ingresa tu correo electrónico" style="border-radius: 8px;" >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" style="border-radius: 8px;" >
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="mobile_number" class="form-label">Número de WhatsApp</label>
                <input type="text" name="mobile_number" id="mobile_number" value="{{ old('mobile_number') }}" class="form-control @error('mobile_number') is-invalid @enderror" placeholder="Número de WhatsApp" style="border-radius: 8px;" >
                @error('mobile_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn w-100 mb-3" style="background-color: #ff385c; border-color: #ff385c; color: #fff; border-radius: 8px;">Registrar</button>

            <div class="text-center">
                <span class="text-muted">¿Ya tienes una cuenta?</span>
                <a href="{{ url('Userlogin') }}" class="text-primary fw-bold">Inicia sesión aquí</a>
            </div>
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
</style>
@endpush
@endsection
