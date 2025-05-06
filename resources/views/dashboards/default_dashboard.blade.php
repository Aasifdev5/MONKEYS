@extends('layout.master')

@section('title', __('Panel'))

@section('css')
<style>

    /* .card { border-radius: 12px; transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .card:hover { transform: translateY(-5px); box-shadow: 0 12px 24px rgba(0,0,0,0.15); }
    .card-header { background: linear-gradient(90deg, #007bff, #00d4ff); color: white; border-radius: 12px 12px 0 0; }
    .bg-purple { background: linear-gradient(90deg, #6f42c1, #a855f7); }
    .circular-progress { position: relative; width: 120px; height: 120px; margin: 0 auto; }
    .progress-circle { transform: rotate(-90deg); }
    .progress-circle-bg { stroke-dasharray: 339.292; stroke-dashoffset: 0; }
    .progress-circle-fill { stroke-dasharray: 339.292; stroke-dashoffset: 339.292; transition: stroke-dashoffset 1.5s ease; }
    .progress-text { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 1.5rem; font-weight: bold; color: #6f42c1; }
    .chart-container { position: relative; min-height: 250px; }
    .loading-spinner { display: none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); }
    .gradient-card { background: linear-gradient(135deg, #ffffff, #f8f9fa); }
    @media (max-width: 768px) {
        .card { margin-bottom: 1.5rem; }
        .circular-progress { width: 100px; height: 100px; }
        .progress-text { font-size: 1.2rem; }
        .container { padding-left: 15px; padding-right: 15px; }
    } */
</style>
@endsection

@section('main_content')
<div class="page_content_wrap" style="padding-top: 0 !important; padding-bottom: 0 !important;">
    <div class="content_wrap">
        <section class="py-5">
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

                {{-- Date Range Filter --}}
                <div class="card shadow-sm mb-4 gradient-card">
                    <div class="card-body">
                        <form id="dateFilterForm">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-3">
                                    <label for="start_date" class="form-label fw-bold">Desde</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ now('America/La_Paz')->subDays(30)->format('Y-m-d') }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="end_date" class="form-label fw-bold">Hasta</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ now('America/La_Paz')->format('Y-m-d') }}">
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary w-100 d-flex align-items-center justify-content-center gap-2" style="margin-top: 27px;">
                                      <i data-feather="filter"></i>
                                      <span>Filtrar</span>
                                    </button>
                                  </div>

                                <div class="col-md-3 d-flex align-items-end justify-content-end" style="margin-top: 27px;">
                                    <div class="text-light">
                                        <i class="fas fa-calendar-alt me-2"></i>
                                        {{ now('America/La_Paz')->format('l, j \d\e F, Y') }}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="text-light mb-0 fw-bold">{{ __('Panel de Control') }}</h1>
                    <div class="dropdown">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dashboardActions" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-cog me-2"></i>Acciones
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dashboardActions">
                            <li><a class="dropdown-item" href="#" onclick="alert('Exportación de PDF en desarrollo');"><i class="fas fa-file-pdf me-2"></i>Exportar PDF</a></li>
                            <li><a class="dropdown-item" href="#" onclick="alert('Exportación de Excel en desarrollo');"><i class="fas fa-file-excel me-2"></i>Exportar Excel</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#" onclick="loadDashboardData();"><i class="fas fa-sync-alt me-2"></i>Actualizar Datos</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {{-- Welcome Card --}}
                        <div class="card border-0 shadow-sm mb-4 gradient-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user_session->name) }}&background=random"
                                             alt="User Avatar" class="rounded-circle" width="60">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h4 class="text-light mb-1 fw-bold">{{ __('Bienvenido, ') . $user_session->name }}</h4>
                                        <p class="text-light mb-0">{{ __('Estadísticas actualizadas en tiempo real') }}</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <span class="badge bg-primary">Usuario desde: {{ $user_session->created_at->format('M Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Quick Stats and Occupancy Rate --}}
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm gradient-card">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Resumen</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <span>Reservas Totales:</span>
                                            <strong id="stat-total">{{ $stats['total'] ?? 0 }}</strong>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <span>Pendientes:</span>
                                            <strong class="text-warning" id="stat-pending">{{ $stats['pending'] ?? 0 }}</strong>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <span>Confirmadas:</span>
                                            <strong class="text-success" id="stat-confirmed">{{ $stats['confirmed'] ?? 0 }}</strong>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>Canceladas:</span>
                                            <strong class="text-danger" id="stat-cancelled">{{ $stats['cancelled'] ?? 0 }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm gradient-card">
                                    <div class="card-header bg-purple text-white">
                                        <h5 class="mb-0"><i class="fas fa-percentage me-2"></i>Tasa de Ocupación</h5>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="circular-progress mx-auto" data-value="0">
                                            <svg class="progress-circle" width="120" height="120" viewBox="0 0 120 120">
                                                <circle class="progress-circle-bg" cx="60" cy="60" r="54" fill="none" stroke="#e6e6e6" stroke-width="6"></circle>
                                                <circle class="progress-circle-fill" cx="60" cy="60" r="54" fill="none" stroke="#6f42c1" stroke-width="6" stroke-linecap="round" transform="rotate(-90 60 60)"></circle>
                                            </svg>
                                            <div class="progress-text">
                                                <span id="occupancy-rate">0</span>%
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-light">Porcentaje de habitaciones ocupadas</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Stats Cards --}}
                        <div class="row g-4 mb-4">
                            <div class="col-md-3">
                                <div class="card text-white bg-primary h-100 shadow-sm border-0 gradient-card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-subtitle mb-2 opacity-75">Reservas Totales</h6>
                                                <h3 class="card-title mb-0" id="card-total">{{ $stats['total'] ?? 0 }}</h3>
                                            </div>
                                            <div class="bg-white bg-opacity-25 p-3 rounded-circle">
                                                <i class="fas fa-calendar-check fa-lg"></i>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <small class="opacity-75">Total de todas tus reservas</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-white bg-warning h-100 shadow-sm border-0 gradient-card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-subtitle mb-2 opacity-75">Pagos Pendientes</h6>
                                                <h3 class="card-title mb-0" id="card-pending">{{ $stats['pending'] ?? 0 }}</h3>
                                            </div>
                                            <div class="bg-white bg-opacity-25 p-3 rounded-circle">
                                                <i class="fas fa-clock fa-lg"></i>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <small class="opacity-75">Esperando confirmación</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-white bg-success h-100 shadow-sm border-0 gradient-card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-subtitle mb-2 opacity-75">Pagos Confirmados</h6>
                                                <h3 class="card-title mb-0" id="card-confirmed">{{ $stats['confirmed'] ?? 0 }}</h3>
                                            </div>
                                            <div class="bg-white bg-opacity-25 p-3 rounded-circle">
                                                <i class="fas fa-check-circle fa-lg"></i>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <small class="opacity-75">Reservas completadas</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-white bg-danger h-100 shadow-sm border-0 gradient-card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-subtitle mb-2 opacity-75">Canceladas</h6>
                                                <h3 class="card-title mb-0" id="card-cancelled">{{ $stats['cancelled'] ?? 0 }}</h3>
                                            </div>
                                            <div class="bg-white bg-opacity-25 p-3 rounded-circle">
                                                <i class="fas fa-ban fa-lg"></i>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <small class="opacity-75">Reservas canceladas</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Income Card --}}
                        <div class="card shadow-sm border-0 mb-4 gradient-card">
                            <div class="card-header bg-primary text-white border-0">
                                <h5 class="mb-0">Ingresos Totales</h5>
                            </div>
                            <div class="card-body chart-container">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="display-4 mb-0 text-primary" id="total-income">Bs 0.00</h2>
                                        <p class="text-light mb-0">Ingresos generados en el período</p>
                                    </div>
                                    <div class="col-md-6 position-relative">
                                        <canvas id="incomeChart" height="150"></canvas>
                                        <div class="loading-spinner">
                                            <div class="spinner-border text-primary" role="status">
                                                <span class="visually-hidden">Cargando...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Charts Row --}}
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="card shadow-sm h-100 gradient-card">
                                    <div class="card-header bg-primary text-white border-0">
                                        <h5 class="mb-0">Reservas por Fecha</h5>
                                    </div>
                                    <div class="card-body chart-container position-relative">
                                        <canvas id="reservationsChart" height="250"></canvas>
                                        <div class="loading-spinner">
                                            <div class="spinner-border text-primary" role="status">
                                                <span class="visually-hidden">Cargando...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card shadow-sm h-100 gradient-card">
                                    <div class="card-header bg-primary text-white border-0">
                                        <h5 class="mb-0">Distribución de Reservas</h5>
                                    </div>
                                    <div class="card-body chart-container position-relative">
                                        <canvas id="reservationsPieChart" height="250"></canvas>
                                        <div class="loading-spinner">
                                            <div class="spinner-border text-primary" role="status">
                                                <span class="visually-hidden">Cargando...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="https://cdn.jsdelivr.net/npm/luxon@3.0.1"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@1.2.0"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize date filter
    const dateFilterForm = document.getElementById('dateFilterForm');
    const spinners = document.querySelectorAll('.loading-spinner');

    // Initialize chart variables
    window.reservationsChart = null;
    window.incomeChart = null;
    window.pieChart = null;

    // Load initial data
    loadDashboardData();

    // Form submission handler
    dateFilterForm.addEventListener('submit', function(e) {
        e.preventDefault();
        loadDashboardData();
    });

    function showLoading() {
        spinners.forEach(spinner => spinner.style.display = 'block');
    }

    function hideLoading() {
        spinners.forEach(spinner => spinner.style.display = 'none');
    }

    function loadDashboardData() {
        const startDate = document.getElementById('start_date').value;
        const endDate = document.getElementById('end_date').value;

        showLoading();

        // Fetch report data
        fetch(`{{ route('dashboard.report-data') }}?start_date=${startDate}&end_date=${endDate}`)
            .then(response => {
                if (!response.ok) throw new Error('Error al cargar los datos');
                return response.json();
            })
            .then(data => {
                if (data.error) {
                    throw new Error(data.error);
                }
                updateStats(data);
                updateCharts(data);
                hideLoading();
            })
            .catch(error => {
                console.error('Error:', error);
                alert(error.message || 'No se pudieron cargar los datos. Por favor, intenta de nuevo.');
                hideLoading();
            });
    }

    function updateStats(data) {
        // Update quick stats
        document.getElementById('stat-total').textContent = data.reservations.total;
        document.getElementById('stat-pending').textContent = data.reservations.pending;
        document.getElementById('stat-confirmed').textContent = data.reservations.confirmed;
        document.getElementById('stat-cancelled').textContent = data.reservations.cancelled;

        // Update cards
        document.getElementById('card-total').textContent = data.reservations.total;
        document.getElementById('card-pending').textContent = data.reservations.pending;
        document.getElementById('card-confirmed').textContent = data.reservations.confirmed;
        document.getElementById('card-cancelled').textContent = data.reservations.cancelled;

        // Update income
        document.getElementById('total-income').textContent = `Bs ${parseFloat(data.income).toFixed(2)}`;

        // Update occupancy rate
        const occupancyRate = parseFloat(data.occupancy_rate);
        document.getElementById('occupancy-rate').textContent = occupancyRate.toFixed(2);

        // Animate circular progress
        const circle = document.querySelector('.progress-circle-fill');
        const circumference = 2 * Math.PI * 54;
        const offset = circumference - (occupancyRate / 100) * circumference;
        circle.style.strokeDashoffset = offset;
    }

    function updateCharts(data) {
        console.log('Chart data received:', data);

        // Prepare chart data - ensure dates are sorted
        const labels = Object.keys(data.chart_data).sort();
        const reservationsData = labels.map(date => data.chart_data[date].reservations);
        const incomeData = labels.map(date => parseFloat(data.chart_data[date].income));

        // Destroy existing charts if they exist and are valid Chart.js instances
        if (window.reservationsChart && typeof window.reservationsChart.destroy === 'function') {
            window.reservationsChart.destroy();
        }
        if (window.incomeChart && typeof window.incomeChart.destroy === 'function') {
            window.incomeChart.destroy();
        }
        if (window.pieChart && typeof window.pieChart.destroy === 'function') {
            window.pieChart.destroy();
        }

        // Format dates for display (DD/MM)
        const displayLabels = labels.map(date => {
            const d = new Date(date);
            return `${d.getDate()}/${d.getMonth() + 1}`;
        });

        // Reservations by Date Chart (Bar)
        const reservationsCtx = document.getElementById('reservationsChart').getContext('2d');
        window.reservationsChart = new Chart(reservationsCtx, {
            type: 'bar',
            data: {
                labels: displayLabels,
                datasets: [{
                    label: 'Reservas',
                    data: reservationsData,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            title: function(context) {
                                return labels[context[0].dataIndex]; // Show full date in tooltip
                            },
                            label: function(context) {
                                return `Reservas: ${context.raw}`;
                            }
                        }
                    }
                },
                scales: {
                    x: { title: { display: true, text: 'Fecha' } },
                    y: {
                        beginAtZero: true,
                        title: { display: true, text: 'Número de Reservas' },
                        ticks: { stepSize: 1, precision: 0 }
                    }
                }
            }
        });

        // Income Chart (Line)
        const incomeCtx = document.getElementById('incomeChart').getContext('2d');
        window.incomeChart = new Chart(incomeCtx, {
            type: 'line',
            data: {
                labels: displayLabels,
                datasets: [{
                    label: 'Ingresos',
                    data: incomeData,
                    fill: true,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            title: function(context) {
                                return labels[context[0].dataIndex];
                            },
                            label: function(context) {
                                return `Bs ${context.raw.toFixed(2)}`;
                            }
                        }
                    }
                },
                scales: {
                    x: { title: { display: true, text: 'Fecha' } },
                    y: {
                        beginAtZero: true,
                        title: { display: true, text: 'Ingresos (Bs)' },
                        ticks: {
                            callback: function(value) {
                                return `Bs ${value}`;
                            }
                        }
                    }
                }
            }
        });

        // Reservations Distribution (Doughnut)
        const pieCtx = document.getElementById('reservationsPieChart').getContext('2d');
        window.pieChart = new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: ['Confirmadas', 'Pendientes', 'Canceladas'],
                datasets: [{
                    data: [
                        data.reservations.confirmed,
                        data.reservations.pending,
                        data.reservations.cancelled
                    ],
                    backgroundColor: [
                        'rgba(40, 167, 69, 0.7)',
                        'rgba(255, 193, 7, 0.7)',
                        'rgba(220, 53, 69, 0.7)'
                    ],
                    borderColor: [
                        'rgba(40, 167, 69, 1)',
                        'rgba(255, 193, 7, 1)',
                        'rgba(220, 53, 69, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'right', labels: { font: { size: 14 } } },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const value = context.raw;
                                const percentage = Math.round((value / total) * 100);
                                return `${context.label}: ${value} (${percentage}%)`;
                            }
                        }
                    },
                    datalabels: { display: false }
                },
                cutout: '70%'
            }
        });
    }
});
</script>
@endsection
