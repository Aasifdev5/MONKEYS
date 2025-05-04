<!DOCTYPE html>
<html lang="es" class="no-js scheme_default">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        img:is([sizes="auto" i], [sizes^="auto," i]) {
            contain-intrinsic-size: 3000px 1500px;
        }
    </style>

    @php
        $general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();
        $category = getCategory();
        $adminNotifications = userNotifications();
    @endphp

    <title>{{ $general_setting['app_name'] ?? 'MONOS' }} | @yield('title', 'Bienvenido') </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset($general_setting['app_fav_icon'] ?? '') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset($general_setting['app_fav_icon'] ?? '') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
            color: #222;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.4rem;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .btn {
            border-radius: 0.5rem;
        }

        .btn-dark {
            background-color: #000;
            border-color: #000;
        }

        .btn-dark:hover {
            background-color: #343a40;
            border-color: #343a40;
        }
    </style>

    @stack('styles')
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img loading="lazy" class="logo_image"
                     src="{{ asset($general_setting['app_logo'] ?? '') }}"
                     alt="Monos" width="210" height="47">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item"><a class="nav-link" href="{{ url('dashboard') }}"><i class="fa-solid fa-tachometer-alt me-2"></i>Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('reserve') }}"><i class="fa-solid fa-bed me-2"></i>Reservar habitación</a></li>

                    @if(!empty($user_session))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="position-relative">
                                    <div class="rounded-circle bg-light text-dark d-flex justify-content-center align-items-center"
                                         style="width: 36px; height: 36px;">
                                        {{ strtoupper(substr($user_session->name, 0, 1)) }}
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow rounded-4 p-2" aria-labelledby="userDropdown">
                                <li><a href="{{ url('logout') }}" class="text-dark text-decoration-none d-flex align-items-center">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i> {{ __('Cerrar sesión') }}
                                  </a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item"><a class="btn btn-outline-light btn-sm ms-2" href="{{ url('Userlogin') }}">Iniciar sesión</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <main class="container mt-5 pt-5">
        @yield('content')
    </main>

    {{-- Optional Footer --}}
    <footer class="text-center py-4 mt-5 text-muted small">
        <div class="container">
            © {{ date('Y') }} MonoResidente. Todos los derechos reservados.
        </div>
    </footer>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')
</body>
</html>
