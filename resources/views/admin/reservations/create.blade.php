@extends('layout.master')

@section('title', 'Crear Reserva Manual')

@section('main_content')
<!-- Flatpickr and Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<div class="container-fluid mt-4">
    <h3>Crear Reserva Manual</h3>
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
            <form action="{{ route('manual-reservation.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="user_id">Usuario</label>
                    <select name="user_id" id="user_id" class="form-control select2">
                        <option value="">-- Seleccionar --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="room_id">Habitación</label>
                    <select name="room_id" id="room_id" class="form-control select2">
                        <option value="">-- Seleccionar --</option>
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>{{ $room->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="date">Fecha</label>
                    <input type="date" name="date" id="date" class="form-control datepicker" autocomplete="off" value="{{ old('date') }}">
                </div>

                <div class="mb-3">
                    <label for="check_in_time">Hora de Entrada</label>
                    <input type="time" name="check_in_time" id="check_in_time" class="form-control" value="{{ old('check_in_time') }}">
                </div>

                <div class="mb-3">
                    <div class="booking-date-field">
                        <label><span class="emoji">💰</span> Selecciona duración y precio</label>
                        <select id="duration-picker" name="duration" class="form-select">
                            <option value="">Selecciona una habitación primero</option>
                        </select>
                        <input type="hidden" name="amount" id="amount" value="{{ old('amount') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="guests">Número de Personas</label>
                    <input type="number" name="guests" id="guests" class="form-control" value="{{ old('guests') }}">
                </div>

                <button type="submit" class="btn btn-primary">Crear Reserva</button>
            </form>
        </div>
    </div>
</div>

<!-- JS Includes -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('.select2').select2({
            width: '100%',
            placeholder: "-- Seleccionar --",
            allowClear: true
        });

        flatpickr(".datepicker", {
            locale: "es",
            dateFormat: "Y-m-d",
            altInput: true,
            altFormat: "d-m-Y",
            allowInput: true
        });

        $('#room_id').on('change', function () {
            const roomId = $(this).val();
            const durationPicker = $('#duration-picker');
            durationPicker.empty().append('<option value="">Cargando...</option>');

            if (roomId) {
                $.get(`/rooms/${roomId}/prices`, function (data) {
                    durationPicker.empty().append('<option value="">Selecciona una opción</option>');

                    // FIX: parse JSON string if it's not already an array
                    let prices = data;
                    if (typeof data === 'string') {
                        try {
                            prices = JSON.parse(data);
                        } catch (e) {
                            durationPicker.empty().append('<option value="">Error al cargar precios</option>');
                            $('#amount').val('');
                            return;
                        }
                    }

                    if (Array.isArray(prices) && prices.length > 0) {
                        const oldDuration = "{{ old('duration') }}";
                        const oldAmount = "{{ old('amount') }}";
                        prices.forEach(function (item) {
                            const label = `${item.hours} hora${item.hours > 1 ? 's' : ''} por ${item.amount}bs`;
                            const isSelected = (parseInt(item.hours) === parseInt(oldDuration) && parseFloat(item.amount) === parseFloat(oldAmount)) ? 'selected' : '';
                            durationPicker.append(`<option value="${item.hours}" data-amount="${item.amount}" ${isSelected}>${label}</option>`);
                        });
                        // Set amount for the selected duration
                        $('#duration-picker').on('change', function () {
                            const amount = parseFloat($(this).find(':selected').data('amount')) || '';
                            $('#amount').val(amount);
                        });
                        // Trigger amount update for old duration
                        const selectedOption = durationPicker.find('option:selected');
                        if (selectedOption.length) {
                            $('#amount').val(parseFloat(selectedOption.data('amount')) || '');
                        }
                    } else {
                        durationPicker.append('<option value="">No hay precios disponibles</option>');
                        $('#amount').val('');
                    }
                });
            } else {
                durationPicker.empty().append('<option value="">Selecciona una habitación primero</option>');
                $('#amount').val('');
            }
        });

        // Trigger room_id change to load durations for old room_id
        if ($('#room_id').val()) {
            $('#room_id').trigger('change');
        }
    });
</script>
@endsection
