@extends('master')

@section('title', __('Panel'))

@section('content')
<div class="page_content_wrap" style="padding-top: 0 !important; padding-bottom: 0 !important;">
  <div class="content_wrap">
    <section class="py-5 bg-light">
      <div class="container" style="margin-top: 50px;">
        {{-- Flash Messages --}}
        @if(Session::has('success'))
          <div class="alert alert-success alert-dismissible fade show">
            <p>{{ Session::get('success') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if(Session::has('fail'))
          <div class="alert alert-danger alert-dismissible fade show">
            <p>{{ Session::get('fail') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h1 class="text-dark mb-0">{{ __('Panel de Control') }}</h1>
          <div class="text-muted">
            <i class="fas fa-calendar-alt me-2"></i>
            {{ now()->format('l, F j, Y') }}
          </div>
        </div>

        <div class="row">
          {{-- Sidebar Menu --}}
          <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm">
              <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fa-solid fa-bars me-2"></i>{{ __('Menú') }}</h5>
              </div>
              <div class="card-body p-0">
                <div class="list-group list-group-flush">
                  <a href="{{ url('dashboard') }}" class="list-group-item list-group-item-action d-flex align-items-center active">
                    <i class="fa-solid fa-tachometer-alt me-2 text-primary"></i> {{ __('Dashboard') }}
                  </a>
                  <a href="{{ url('reserve') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="fa-solid fa-bed me-2 text-success"></i> {{ __('Reservar habitación') }}
                  </a>

                  <a href="{{ url('logout') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="fa-solid fa-right-from-bracket me-2 text-danger"></i> {{ __('Cerrar sesión') }}
                  </a>
                </div>
              </div>
            </div>

            {{-- Quick Stats --}}
            <div class="card border-0 shadow-sm mt-4">
              <div class="card-header bg-info text-white">
                <h5 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Resumen</h5>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                  <span>Reservas Totales:</span>
                  <strong>{{ $stats['total'] ?? 0 }}</strong>
                </div>
                <div class="d-flex justify-content-between mb-2">
                  <span>Pendientes:</span>
                  <strong class="text-warning">{{ $stats['pending'] ?? 0 }}</strong>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Confirmadas:</span>
                  <strong class="text-success">{{ $stats['confirmed'] ?? 0 }}</strong>
                </div>
              </div>
            </div>
          </div>

          {{-- Main Content --}}
          <div class="col-md-9">
            {{-- Welcome Card --}}
            <div class="card border-0 shadow-sm mb-4">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="flex-shrink-0">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user_session->name) }}&background=random"
                         alt="User Avatar" class="rounded-circle" width="60">
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h4 class="text-dark mb-1">{{ __('Bienvenido, ') . $user_session->name }}</h4>
                    <p class="text-muted mb-0">{{ __('Estás viendo tu panel de control con estadísticas actualizadas') }}</p>
                  </div>
                </div>
              </div>
            </div>

            {{-- Stats Cards --}}
            <div class="row g-3 mb-4">
              <div class="col-md-4">
                <div class="card text-white bg-primary h-100 shadow-sm border-0">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h6 class="card-subtitle mb-2">Reservas Totales</h6>
                        <h3 class="card-title mb-0">{{ $stats['total'] ?? 0 }}</h3>
                      </div>
                      <div class="bg-white bg-opacity-25 p-3 rounded-circle">
                        <i class="fa-solid fa-calendar-check fa-lg"></i>
                      </div>
                    </div>
                    <div class="mt-3">
                      <small class="opacity-75">Total de todas tus reservas</small>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card text-white bg-warning h-100 shadow-sm border-0">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h6 class="card-subtitle mb-2">Pagos Pendientes</h6>
                        <h3 class="card-title mb-0">{{ $stats['pending'] ?? 0 }}</h3>
                      </div>
                      <div class="bg-white bg-opacity-25 p-3 rounded-circle">
                        <i class="fa-solid fa-clock fa-lg"></i>
                      </div>
                    </div>
                    <div class="mt-3">
                      <small class="opacity-75">Esperando confirmación</small>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card text-white bg-success h-100 shadow-sm border-0">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h6 class="card-subtitle mb-2">Pagos Confirmados</h6>
                        <h3 class="card-title mb-0">{{ $stats['confirmed'] ?? 0 }}</h3>
                      </div>
                      <div class="bg-white bg-opacity-25 p-3 rounded-circle">
                        <i class="fa-solid fa-check-circle fa-lg"></i>
                      </div>
                    </div>
                    <div class="mt-3">
                      <small class="opacity-75">Reservas completadas</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {{-- Main Chart --}}
            <div class="card shadow-sm border-0 mb-4">
              <div class="card-header bg-white border-0">
                <h5 class="mb-0">Tus Reservas por Fecha</h5>
              </div>
              <div class="card-body">
                <canvas id="reservationsChart" height="250"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Reservations by Date Chart
  document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('reservationsChart').getContext('2d');
    const reservationsChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: {!! json_encode($reservationsByDate->keys()) !!},
        datasets: [{
          label: 'Número de Reservas',
          data: {!! json_encode($reservationsByDate->values()) !!},
          backgroundColor: 'rgba(54, 162, 235, 0.7)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          },
          tooltip: {
            backgroundColor: 'rgba(0,0,0,0.8)',
            titleFont: { size: 14 },
            bodyFont: { size: 12 },
            padding: 12
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              stepSize: 1,
              precision: 0
            }
          }
        }
      }
    });
  });
</script>
@endsection
