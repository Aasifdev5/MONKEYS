@extends('master')

@section('title')
{{ __('Inicio') }}
@endsection

@section('content')
<!-- Flatpickr CSS -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css" rel="stylesheet">

<style>
    .search-container {
        max-width: 1200px;
        margin: 40px auto;
        text-align: center;
    }

    .search-bar {
        background: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 40px;
        padding: 10px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 20px auto;
        max-width: 1000px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .search-bar .form-group {
        flex: 1;
        min-width: 150px;
        position: relative;
        padding: 8px 15px;
        border-right: 1px solid #eee;
    }

    .search-bar .form-group:last-child {
        border-right: none;
    }

    .search-bar .form-control {
        border: none;
        box-shadow: none;
        padding: 10px 0;
        font-size: 1rem;
        background: transparent;
        width: 100%;
        color: #333;
    }

    .search-bar .form-control::placeholder {
        color: #717171;
    }

    .search-bar .form-control:focus {
        box-shadow: none;
        border: none;
        outline: none;
    }

    .search-bar .btn {
        background: #ff385c;
        color: #fff;
        border-radius: 20px;
        padding: 12px 30px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        white-space: nowrap;
        border: none;
        cursor: pointer;
    }

    .search-bar .btn:hover {
        background: #e63946;
        transform: scale(1.02);
    }

    .search-bar .btn i {
        margin-right: 8px;
    }

    .room-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
        margin-top: 40px;
    }

    .room-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        position: relative;
    }

    .room-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
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

    @media (max-width: 992px) {
        .search-bar .form-group {
            min-width: 120px;
            padding: 8px 10px;
        }
    }

    @media (max-width: 768px) {
        .search-bar {
            flex-direction: column;
            padding: 15px;
            border-radius: 15px;
            align-items: stretch;
        }

        .search-bar .form-group {
            width: 100%;
            margin-bottom: 5px;
            padding: 10px 15px;
            border-right: none;
            border-bottom: 1px solid #eee;
        }

        .search-bar .form-group:last-child {
            border-bottom: none;
        }

        .search-bar .btn {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
        }

        .room-card img {
            height: 200px;
        }
    }

    @media (max-width: 576px) {
        .search-container h1 {
            font-size: 2rem;
        }

        .room-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="search-container">
    <h1 class="text-dark fw-bold" style="font-size: 2.5rem;">Encuentra tu estancia perfecta</h1>
    <div class="search-bar">
        <div class="form-group">
            <input type="text" class="form-control flatpickr-date" placeholder="📅 Fecha" id="date" readonly>
        </div>
        <div class="form-group">
            <input type="text" class="form-control flatpickr-time" placeholder="⏰ Hora de entrada" id="check_in_hour" readonly>
        </div>
        <div class="form-group">
            <input type="text" class="form-control flatpickr-time" placeholder="⏰ Hora de salida" id="check_out_hour" readonly>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="👥 Número de personas" id="people" min="1">
        </div>
        <button type="button" class="btn btn-search" id="searchBtn">
            <i class="fas fa-search"></i> Buscar
        </button>
    </div>
</div>

<div class="container">
    <div class="room-grid" id="roomResults"></div>
</div>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
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
</script>
<script>
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
    });

    // Time pickers
    flatpickr("#check_in_hour", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        defaultHour: 14,
        minuteIncrement: 15,
        placeholder: "⏰ Hora de entrada"
    });

    flatpickr("#check_out_hour", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        defaultHour: 11,
        minuteIncrement: 15,
        placeholder: "⏰ Hora de salida"
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
    const rooms = @json($rooms);
    populateRooms(rooms);

    // Search button click
    $('#searchBtn').on('click', function () {
        const date = $('#date').val();
        const checkInHour = $('#check_in_hour').val();
        const checkOutHour = $('#check_out_hour').val();
        const people = parseInt($('#people').val()) || 0;

        if (!date || !checkInHour || !checkOutHour || !people) {
            $('#roomResults').html('<div class="text-center text-muted py-5">Por favor, completa todos los campos.</div>');
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
                people: people
            },
            success: function (response) {
                populateRooms(response);
            },
            error: function (xhr) {
                console.error('AJAX Error:', xhr.responseText, xhr.status, xhr.statusText);
                let errorMsg = 'Error al buscar habitaciones. Inténtalo de nuevo.';
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    errorMsg = xhr.responseJSON.error;
                }
                $('#roomResults').html(`<div class="text-center text-muted py-5">${errorMsg}</div>`);
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
