```blade
@extends('layout.master')

@section('title', 'Editar Reserva Manual')

@section('main_content')
<!-- Flatpickr and Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<div class="container-fluid mt-4">
    <h3>Editar Reserva Manual</h3>
    @if ($errors->has('error'))
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('manual-reservation.update', $reservation) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="user_id" class="form-label">Usuario</label>
                    <select name="user_id" id="user_id" class="form-control select2 @error('user_id') is-invalid @enderror">
                        <option value="">-- Seleccionar --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $reservation->user_id ? 'selected' : '' }}>
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
                            <option value="{{ $room->id }}" {{ $room->id == $reservation->room_id ? 'selected' : '' }}>
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
                    <label for="check_out_time" class="form-label">Hora de Salida</label>
                    <input type="time" name="check_out_time" id="check_out_time" class="form-control @error('check_out_time') is-invalid @enderror" value="{{ old('check_out_time', $reservation->check_out_time) }}">
                    @error('check_out_time')
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
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
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

        // Client-side validation
        $('form').on('submit', function (e) {
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
        });
    });
</script>
@endsection
```
