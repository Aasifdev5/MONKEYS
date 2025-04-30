@extends('master')

@section('title')
    {{ __('Iniciar Sesión') }}
@endsection

@section('content')

<div class="container mt-5">
    <div class="card p-4 shadow-sm mx-auto" style="max-width: 400px; border-radius: 12px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Log in or sign up</h5>
            <button type="button" class="btn-close" aria-label="Close"></button>
        </div>

        <h3 class="fw-bold mb-4">Welcome to 🐵 MONKEYS Booking</h3>

        <form method="POST" action="{{ url('log') }}">
            @csrf

            <div class="mb-3">
                <label for="country" class="form-label">Country/Region</label>
                <select name="country" id="country" class="form-control" style="border-radius: 8px;">
                    <option value="IN" selected>India (+91)</option>
                    <option value="US">United States (+1)</option>
                    <option value="UK">United Kingdom (+44)</option>
                    <!-- Add more countries as needed -->
                </select>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone number</label>
                <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone number" style="border-radius: 8px;" required>
            </div>

            <p class="text-muted mb-4" style="font-size: 14px;">
                We'll call or text you to confirm your number. Standard message and data rates apply.
                <a href="#" class="text-decoration-none">Privacy Policy</a>.
            </p>

            <button type="submit" class="btn w-100 mb-3" style="background-color: #ff385c; border-color: #ff385c; color: #fff; border-radius: 8px;">Continue</button>
        </form>

        <div class="d-flex align-items-center mb-3">
            <hr class="flex-grow-1">
            <span class="px-3 text-muted">or</span>
            <hr class="flex-grow-1">
        </div>

        <button type="button" class="btn btn-outline-dark w-100 mb-2 d-flex align-items-center justify-content-center" style="border-radius: 8px;">
            <img src="https://www.google.com/favicon.ico" alt="Google" style="width: 20px; margin-right: 10px;">
            Continue with Google
        </button>

        <button type="button" class="btn btn-outline-dark w-100 d-flex align-items-center justify-content-center" style="border-radius: 8px;">
            <i class="fab fa-apple me-2" style="font-size: 20px;"></i>
            Continue with Apple
        </button>
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
