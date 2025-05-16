@extends('layout.master')

@section('title', 'Editar Reserva Manual')

@section('main_content')
<!-- Flatpickr and Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<div class="container-fluid mt-4">
    <h3>Editar Reserva Manual</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('manual-reservation.update', $reservation) }}" method="POST" id="reservation-form">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="user_id" class="form-label">Usuario</label>
                    <select name="user_id" id="user_id" class="form-control select2 @error('user_id') is-invalid @enderror">
                        <option value="">-- Seleccionar --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $reservation->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="room_id" class="form-label">Habitación</label>
                    <select name="room_id" id="room_id" class="form-control select2 @error('room_id') is-invalid @enderror">
                        <option value="">-- Seleccionar --</option>
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}" {{ old('room_id', $reservation->room_id) == $room->id ? 'selected' : '' }}>
                                {{ $room->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('room_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Fecha</label>
                    <input type="text" name="date" id="date" class="form-control datepicker @error('date') is-invalid @enderror" autocomplete="off" value="{{ old('date', $reservation->date) }}">
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="check_in_time" class="form-label">Hora de Entrada</label>
                    <input type="time" name="check_in_time" id="check_in_time" class="form-control @error('check_in_time') is-invalid @enderror" value="{{ old('check_in_time', $reservation->check_in_time) }}">
                    @error('check_in_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="duration" class="form-label">Duración y Precio</label>
                    <select id="duration" name="duration" class="form-select @error('duration') is-invalid @enderror">
                        <option value="">Cargando opciones...</option>
                    </select>
                    <input type="hidden" name="amount" id="amount" value="{{ old('amount', $reservation->amount) }}">
                    @error('duration')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="guests" class="form-label">Número de Personas</label>
                    <input type="number" name="guests" id="guests" class="form-control @error('guests') is-invalid @enderror" value="{{ old('guests', $reservation->guests) }}" min="1">
                    @error('guests')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
                    <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JS Includes -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        const selectedRoomId = $('#room_id').val();
        const selectedDuration = "{{ $reservation->duration }}";
        const selectedAmount = "{{ $reservation->amount }}";

        $('.select2').select2({
            width: '100%',
            placeholder: "-- Seleccionar --",
            allowClear: false
        });

        flatpickr(".datepicker", {
            locale: "es",
            dateFormat: "Y-m-d",
            altInput: true,
            altFormat: "d-m-Y",
            allowInput: true,
            minDate: "today"
        });

        function calculateCheckOutTime() {
            const checkInTime = $('#check_in_time').val();
            const duration = parseInt($('#duration').val());
            if (checkInTime && !isNaN(duration)) {
                const [hours, minutes] = checkInTime.split(':').map(Number);
                const checkIn = new Date();
                checkIn.setHours(hours, minutes);
                const checkOut = new Date(checkIn.getTime() + duration * 60 * 60 * 1000);
                const checkOutHours = checkOut.getHours().toString().padStart(2, '0');
                const checkOutMinutes = checkOut.getMinutes().toString().padStart(2, '0');
                $('#check_out_time').val(`${checkOutHours}:${checkOutMinutes}`);
            } else {
                $('#check_out_time').val('');
            }
        }

        function loadDurations(roomId) {
            const durationPicker = $('#duration');
            durationPicker.empty().append('<option value="">Cargando...</option>');

            if (roomId) {
                $.get(`/rooms/${roomId}/prices`, function (data) {
                    let prices = data;
                    if (typeof data === 'string') {
                        try {
                            prices = JSON.parse(data);
                        } catch (e) {
                            durationPicker.empty().append('<option value="">Error al cargar precios</option>');
                            return;
                        }
                    }

                    durationPicker.empty().append('<option value="">Selecciona una opción</option>');
                    if (Array.isArray(prices) && prices.length > 0) {
                        prices.forEach(function (item) {
                            const label = `${item.hours} hora${item.hours > 1 ? 's' : ''} por ${item.amount}bs`;
                            const isSelected = (parseInt(item.hours) === parseInt(selectedDuration) && parseFloat(item.amount) === parseFloat(selectedAmount)) ? 'selected' : '';
                            durationPicker.append(`<option value="${item.hours}" data-amount="${item.amount}" ${isSelected}>${label}</option>`);
                        });
                        // Set amount for the initially selected duration
                        const selectedOption = durationPicker.find('option:selected');
                        if (selectedOption.length) {
                            $('#amount').val(parseFloat(selectedOption.data('amount')) || '');
                        }
                    } else {
                        durationPicker.append('<option value="">No hay precios disponibles</option>');
                        $('#amount').val('');
                    }
                    calculateCheckOutTime();
                }).fail(function () {
                    durationPicker.empty().append('<option value="">Error al cargar precios</option>');
                    $('#amount').val('');
                });
            } else {
                durationPicker.empty().append('<option value="">Selecciona una habitación primero</option>');
                $('#amount').val('');
                $('#check_out_time').val('');
            }
        }

        loadDurations(selectedRoomId);

        $('#room_id').on('change', function () {
            loadDurations($(this).val());
        });

        $('#duration').on('change', function () {
            const amount = parseFloat($(this).find(':selected').data('amount')) || '';
            $('#amount').val(amount);
            calculateCheckOutTime();
        });

        $('#check_in_time').on('change', calculateCheckOutTime);

        // Client-side validation
        $('#reservation-form').on('submit', function (e) {
            if (!$('#user_id').val()) {
                e.preventDefault();
                alert('Por favor, seleccione un usuario.');
                return false;
            }
            if (!$('#room_id').val()) {
                e.preventDefault();
                alert('Por favor, seleccione una habitación.');
                return false;
            }
            if (!$('#duration').val()) {
                e.preventDefault();
                alert('Por favor, seleccione una duración.');
                return false;
            }
            if (!$('#amount').val()) {
                e.preventDefault();
                alert('Por favor, seleccione un precio válido.');
                return false;
            }
        });
    });
</script>
@endsection
