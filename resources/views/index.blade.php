@extends('master')

@section('title')
{{ __('Inicio') }}
@endsection

@section('content')
<!-- Flatpickr CSS -->
<!-- Airbnb-like Flatpickr and Fonts -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Circular,-apple-system,BlinkMacSystemFont,Roboto,Helvetica Neue,sans-serif&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
    .search-container {
        max-width: 1200px;
        margin: 40px auto;
        text-align: center;
    }

    .search-bar {
        background: #fff;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        border-radius: 16px;
        padding: 12px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 30px auto;
        max-width: 1000px;
        flex-wrap: wrap;
        gap: 12px;
        border: 1px solid #f0f0f0;
    }

    .search-bar .form-group {
        flex: 1;
        min-width: 160px;
        position: relative;
        padding: 8px 16px;
    }

    .search-bar .form-group:not(:last-child) {
        border-right: 1px solid #f0f0f0;
    }

    .search-bar .form-control {
        border: none;
        box-shadow: none;
        padding: 10px 0 10px 32px;
        font-size: 0.95rem;
        background: transparent;
        width: 100%;
        color: #333;
        height: 40px; /* Ensure enough height for text */
    }

    .search-bar .form-control:focus {
        box-shadow: none;
        border: none;
        outline: none;
    }

    .search-bar .form-group label {
        display: block;
        text-align: left;
        font-size: 0.75rem;
        font-weight: 600;
        color: #666;
        text-transform: uppercase;
        margin-bottom: 6px;
        letter-spacing: 0.5px;
    }

    .search-bar .form-group .input-icon {
        position: absolute;
        left: 20px;
        top: 38px;
        color: #666;
        font-size: 1rem;
    }

    .search-bar .btn {
        background: linear-gradient(135deg, #ff385c 0%, #e61e4d 100%);
        color: #fff;
        border-radius: 12px;
        padding: 12px 28px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        white-space: nowrap;
        border: none;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(230, 30, 77, 0.2);
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .search-bar .btn:hover {
        background: linear-gradient(135deg, #e61e4d 0%, #d70466 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(230, 30, 77, 0.3);
    }

    .search-bar .btn i {
        margin-right: 10px;
    }

    .room-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 24px;
        margin-top: 40px;
    }

    .room-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        position: relative;
    }

    .room-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    }

    .room-card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .room-card .card-body {
        padding: 15px;
    }

    .room-card .badge {
        background: #ff385c;
        color: #fff;
        padding: 3px 10px;
        border-radius: 10px;
        font-size: 0.9rem;
        position: absolute;
        top: 10px;
        left: 10px;
    }

    .room-card .text-muted {
        font-size: 0.95rem;
        color: #717171;
    }

    .room-card .price {
        font-size: 1.2rem;
        font-weight: 600;
        color: #000;
        margin: 5px 0;
    }

    .heart-icon {
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 1.8rem;
        color: rgba(255, 255, 255, 0.8);
        cursor: pointer;
        z-index: 1;
        transition: all 0.2s ease;
    }

    .heart-icon:hover {
        color: #ff385c;
        transform: scale(1.1);
    }

    .heart-icon.active {
        color: #ff385c;
    }

    /* Enhanced Pagination Styles */
    .pagination-container {
        display: flex;
        justify-content: center;
        margin: 40px 0 30px;
    }

    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        align-items: center;
        gap: 8px;
    }

    .pagination li {
        margin: 0;
    }

    .pagination .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        height: 40px;
        padding: 0 12px;
        border-radius: 10px;
        font-size: 0.95rem;
        font-weight: 500;
        color: #4a5568;
        background-color: #fff;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
        text-decoration: none;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .pagination .page-link:hover {
        background-color: #f7fafc;
        border-color: #cbd5e0;
        transform: translateY(-1px);
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #ff385c 0%, #e61e4d 100%);
        color: #fff;
        border-color: transparent;
        font-weight: 600;
        box-shadow: 0 2px 6px rgba(230, 30, 77, 0.3);
        transform: scale(1.05);
    }

    .pagination .page-item.disabled .page-link {
        color: #a0aec0;
        background-color: #f7fafc;
        border-color: #e2e8f0;
        cursor: not-allowed;
        opacity: 0.7;
        box-shadow: none;
    }

    .pagination .page-item:first-child .page-link,
    .pagination .page-item:last-child .page-link {
        padding: 0 16px;
        font-weight: 600;
    }

    .pagination .page-item:first-child .page-link::before {
        content: '←';
        margin-right: 8px;
    }

    .pagination .page-item:last-child .page-link::after {
        content: '→';
        margin-left: 8px;
    }

    .pagination .page-item.ellipsis .page-link {
        background: transparent;
        border: none;
        box-shadow: none;
        cursor: default;
        min-width: auto;
    }

    @media (max-width: 992px) {
        .search-bar .form-group {
            min-width: 140px;
            padding: 8px 12px;
        }

        .search-bar .btn {
            padding: 10px 20px;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 768px) {
        .search-bar {
            flex-direction: column;
            padding: 16px;
            align-items: stretch;
            gap: 16px;
        }

        .search-bar .form-group {
            width: 100%;
            padding: 12px 0;
            border-right: none !important;
            border-bottom: 1px solid #f0f0f0;
        }

        .search-bar .form-group:last-child {
            border-bottom: none;
        }

        .search-bar .form-control {
            padding: 12px 12px 12px 40px; /* Adjusted padding for better text visibility */
            height: 48px; /* Increased height to prevent text cutoff */
            font-size: 0.9rem; /* Slightly smaller font for better fit */
            line-height: 1.2; /* Ensure text is vertically centered */
        }

        .search-bar .btn {
            width: 100%;
            margin-top: 8px;
        }

        /* Adjust icon positioning for native mobile pickers */
        .search-bar .form-group .input-icon {
            top: 50%;
            transform: translateY(-50%);
            left: 12px; /* Adjusted to align with new padding */
        }

        .search-bar .form-control.flatpickr-mobile {
            padding: 12px 12px 12px 40px; /* Ensure padding matches for native picker */
            height: 48px; /* Match height for consistency */
            font-size: 0.9rem;
            line-height: 1.2;
        }

        .pagination {
            flex-wrap: wrap;
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .search-container h1 {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .search-bar {
            margin: 20px auto;
        }

        .pagination .page-link {
            min-width: 36px;
            height: 36px;
            padding: 0 8px;
            font-size: 0.85rem;
        }

        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            padding: 0 12px;
        }
    }
</style>

<div class="search-container">
    <h1 class="text-dark fw-bold" style="font-size: 2.2rem; margin-bottom: 16px;">Encuentra tu estancia perfecta</h1>
    <p class="text-muted" style="margin-bottom: 8px;">Reserva espacios únicos para cualquier ocasión</p>

    <div class="search-bar">
        <div class="form-group">
            <label>Fecha</label>
            <i class="fas fa-calendar input-icon"></i>
            <input type="text" class="form-control flatpickr-date" id="date" placeholder="Selecciona fecha">
        </div>

        <div class="form-group">
            <label>Hora de entrada</label>
            <i class="fas fa-clock input-icon"></i>
            <input type="text" class="form-control flatpickr-time" id="check_in_hour" placeholder="Hora de entrada">
        </div>

        <div class="form-group">
            <label>Hora de salida</label>
            <i class="fas fa-clock input-icon"></i>
            <input type="text" class="form-control flatpickr-time" id="check_out_hour" placeholder="Hora de salida">
        </div>

        <div class="form-group">
            <label>Personas</label>
            <i class="fas fa-user input-icon"></i>
            <input type="number" class="form-control" id="people" min="1" max="8" placeholder="Nº de personas">
        </div>

        <button type="button" class="btn btn-search" id="searchBtn">
            <i class="fas fa-search"></i> Buscar
        </button>
    </div>
</div>

<div class="container">
    <div class="room-grid" id="roomResults"></div>
    <div class="pagination-container">
        @include('admin.pagination', ['paginator' => $rooms])
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
// People input validation
document.getElementById('people').addEventListener('input', function () {
    const value = parseInt(this.value);
    if (value > 8) {
        this.value = 8;
        Swal.fire({
            icon: 'warning',
            title: 'Límite excedido',
            text: 'Solo puedes ingresar hasta 8 personas.',
        });
    }
});

// Main script
$(document).ready(function () {
    // Set up CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Single date picker
    flatpickr("#date", {
        minDate: "today",
        maxDate: new Date().fp_incr(365),
        dateFormat: "d M Y",
        theme: "airbnb",
        allowInput: true,
        disableMobile: false, // Explicitly allow native mobile picker
        prevArrow: "<span class='flatpickr-prev-month'><i class='fas fa-chevron-left'></i></span>",
        nextArrow: "<span class='flatpickr-next-month'><i class='fas fa-chevron-right'></i></span>",
        locale: {
            weekdays: {
                shorthand: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
                longhand: [
                    "Domingo",
                    "Lunes",
                    "Martes",
                    "Miércoles",
                    "Jueves",
                    "Viernes",
                    "Sábado",
                ],
            },
            months: {
                shorthand: [
                    "Ene",
                    "Feb",
                    "Mar",
                    "Abr",
                    "May",
                    "Jun",
                    "Jul",
                    "Ago",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dic",
                ],
                longhand: [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre",
                ],
            },
        },
        onClose: function(selectedDates, dateStr, instance) {
            if (selectedDates.length > 0) {
                instance.input.value = dateStr;
            }
        },
        onReady: function(selectedDates, dateStr, instance) {
            // Debug: Log whether Flatpickr is using the native mobile picker
            console.log('Date picker - Is mobile native:', instance.input.classList.contains('flatpickr-mobile'));
        }
    });

    // Time pickers
    flatpickr("#check_in_hour", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        defaultHour: 14,
        minuteIncrement: 15,
        allowInput: true,
        disableMobile: false, // Explicitly allow native mobile picker
        onClose: function(selectedDates, dateStr, instance) {
            if (selectedDates.length > 0) {
                instance.input.value = dateStr;
            }
        },
        onReady: function(selectedDates, dateStr, instance) {
            // Debug: Log whether Flatpickr is using the native mobile picker
            console.log('Check-in time picker - Is mobile native:', instance.input.classList.contains('flatpickr-mobile'));
        }
    });

    flatpickr("#check_out_hour", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        defaultHour: 11,
        minuteIncrement: 15,
        allowInput: true,
        disableMobile: false, // Explicitly allow native mobile picker
        onClose: function(selectedDates, dateStr, instance) {
            if (selectedDates.length > 0) {
                instance.input.value = dateStr;
            }
        },
        onReady: function(selectedDates, dateStr, instance) {
            // Debug: Log whether Flatpickr is using the native mobile picker
            console.log('Check-out time picker - Is mobile native:', instance.input.classList.contains('flatpickr-mobile'));
        }
    });

    // Populate rooms function
    function populateRooms(rooms) {
        let html = '';
        if (!rooms || rooms.length === 0) {
            html = '<div class="text-center text-muted py-5">No hay habitaciones disponibles para los criterios seleccionados. Es posible que las habitaciones estén reservadas para el horario solicitado.</div>';
        } else {
            rooms.forEach(room => {
                html += `
                    <a href="/roomdetails/${room.id}" class="text-decoration-none text-dark">
                        <div class="room-card position-relative">
                            <img src="${room.thumbnail || 'https://via.placeholder.com/300'}" alt="${room.name}">
                            <i class="fas fa-heart heart-icon ${room.favorite ? 'active' : ''}" data-room-id="${room.id}"></i>
                            <div class="card-body">
                                ${room.favorite ? '<span class="badge">Favorito de los huéspedes</span>' : ''}
                                <p class="text-muted mb-1">${room.name}</p>
                                <p class="text-muted mb-1">${room.max_people} Personas</p>
                                <p class="price mb-1">Desde Bs ${Number(room.price).toLocaleString()} x hora</p>
                                <p class="text-muted mb-0">Equipamiento ★ ${room.rating}</p>
                            </div>
                        </div>
                    </a>
                `;
            });
        }
        $('#roomResults').html(html);
    }

    // Initial rooms from Laravel
    const rooms = @json($rooms->items());
    populateRooms(rooms);

    // Search button click
    $('#searchBtn').on('click', function () {
        const date = $('#date').val();
        const checkInHour = $('#check_in_hour').val();
        const checkOutHour = $('#check_out_hour').val();
        const people = parseInt($('#people').val()) || 0;

        if (!date || !checkInHour || !checkOutHour || !people) {
            $('#roomResults').html('<div class="text-center text-muted py-5">Por favor, completa todos los campos.</div>');
            $('#paginationLinks').html('');
            return;
        }

        // Send AJAX request
        $.ajax({
            url: '/',
            method: 'POST',
            data: {
                date: date,
                check_in_hour: checkInHour,
                check_out_hour: checkOutHour,
                people: people,
                page: 1 // Reset to first page on new search
            },
            success: function (response) {
                if (response.error) {
                    $('#roomResults').html(`<div class="text-center text-muted py-5">${response.error}</div>`);
                    $('#paginationLinks').html('');
                    return;
                }
                populateRooms(response.data);
                $('#paginationLinks').html(response.pagination.links);
            },
            error: function (xhr) {
                console.error('AJAX Error:', xhr.responseText, xhr.status, xhr.statusText);
                let errorMsg = 'Error al buscar habitaciones. Inténtalo de nuevo.';
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    errorMsg = xhr.responseJSON.error;
                }
                $('#roomResults').html(`<div class="text-center text-muted py-5">${errorMsg}</div>`);
                $('#paginationLinks').html('');
            }
        });
    });

    // Handle pagination link clicks
    $(document).on('click', '.pagination .page-link', function (e) {
        e.preventDefault();
        const url = $(this).attr('href');
        if (!url) return; // Skip if no URL (e.g., disabled link)

        const date = $('#date').val();
        const checkInHour = $('#check_in_hour').val();
        const checkOutHour = $('#check_out_hour').val();
        const people = parseInt($('#people').val()) || 0;

        // Extract page number from URL
        const page = new URLSearchParams(url.split('?')[1]).get('page') || 1;

        // Send AJAX request for the new page
        $.ajax({
            url: '/',
            method: 'POST',
            data: {
                date: date,
                check_in_hour: checkInHour,
                check_out_hour: checkOutHour,
                people: people,
                page: page
            },
            success: function (response) {
                if (response.error) {
                    $('#roomResults').html(`<div class="text-center text-muted py-5">${response.error}</div>`);
                    $('#paginationLinks').html('');
                    return;
                }
                populateRooms(response.data);
                $('#paginationLinks').html(response.pagination.links);
                // Scroll to top of room grid
                $('html, body').animate({
                    scrollTop: $("#roomResults").offset().top - 20
                }, 500);
            },
            error: function (xhr) {
                console.error('AJAX Error:', xhr.responseText, xhr.status, xhr.statusText);
                let errorMsg = 'Error al buscar habitaciones. Inténtalo de nuevo.';
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    errorMsg = xhr.responseJSON.error;
                }
                $('#roomResults').html(`<div class="text-center text-muted py-5">${errorMsg}</div>`);
                $('#paginationLinks').html('');
            }
        });
    });

    // Favorite toggle
    $(document).on('click', '.heart-icon', function (e) {
        e.preventDefault();
        const roomId = $(this).data('room-id');
        const $icon = $(this);
        const isActive = !$icon.hasClass('active');

        // Update UI
        $icon.toggleClass('active');

        // Send AJAX request to update favorite
        $.ajax({
            url: '/rooms/' + roomId + '/favorite',
            method: 'POST',
            data: {
                favorite: isActive
            },
            success: function (response) {
                console.log('Favorite updated:', response);
            },
            error: function (xhr) {
                console.error('Error updating favorite:', xhr);
                // Revert UI change on error
                $icon.toggleClass('active');
            }
        });
    });
});
</script>
@endpush
@endsection
