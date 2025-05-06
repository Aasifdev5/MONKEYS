@extends('layout.master')

@section('title', 'Crear Reserva Manual')

@section('main_content')
<!-- Flatpickr and Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<div class="container-fluid mt-4">
    <h3>Crear Reserva Manual</h3>
    @if ($errors->has('error'))
    <div class="alert alert-danger">
        {{ $errors->first('error') }}
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
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="room_id">Habitación</label>
                    <select name="room_id" id="room_id" class="form-control select2">
                        <option value="">-- Seleccionar --</option>
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="date">Fecha</label>
                    <input type="date" name="date" id="date" class="form-control datepicker" autocomplete="off">
                </div>

                <div class="mb-3">
                    <label for="check_in_time">Hora de Entrada</label>
                    <input type="time" name="check_in_time" id="check_in_time" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="check_out_time">Hora de Salida</label>
                    <input type="time" name="check_out_time" id="check_out_time" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="guests">Número de Personas</label>
                    <input type="number" name="guests" id="guests" class="form-control">
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
    });
</script>
@endsection
