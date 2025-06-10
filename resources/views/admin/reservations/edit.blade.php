@extends('layout.master')

@section('title', 'Editar Reserva Manual')

@section('main_content')
<!-- Flatpickr, Select2, and SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

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
                            <option value="{{ $room->id }}" data-max-people="{{ $room->max_people }}" {{ old('room_id', $reservation->room_id) == $room->id ? 'selected' : '' }}>
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
                    <input type="text" name="date" id="date-picker" class="form-control datepicker @error('date') is-invalid @enderror" autocomplete="off" value="{{ old('date', $reservation->date) }}">
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="check_in_time" class="form-label">Hora de Entrada</label>
                    <input type="text" name="check_in_time" id="check-in-hour-picker" class="form-control @error('check_in_time') is-invalid @enderror" value="{{ old('check_in_time', $reservation->check_in_time) }}">
                    @error('check_in_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="duration" class="form-label"><span class="emoji">💰</span> Duración y Precio</label>
                    <select id="duration-picker" name="duration" class="form-select @error('duration') is-invalid @enderror">
                        <option value="">Cargando opciones...</option>
                    </select>
                    <input type="hidden" name="base_amount" id="base_amount" value="{{ old('base_amount', $reservation->amount) }}">
                    <input type="hidden" name="extra_fee" id="extra_fee" value="{{ old('extra_fee', 0) }}">
                    <input type="hidden" name="amount" id="amount" value="{{ old('amount', $reservation->amount) }}">
                    @error('duration')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('base_amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('extra_fee')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="guests" class="form-label">Número de Personas</label>
                    <input type="number" name="guests" id="guest-count" class="form-control @error('guests') is-invalid @enderror" value="{{ old('guests', $reservation->guests) }}" min="1">
                    @error('guests')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary" id="reserve-button">Actualizar Reserva</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        // Initialize Select2
        $('.select2').select2({
            width: '100%',
            placeholder: "-- Seleccionar --",
            allowClear: false
        });

        // Initialize Flatpickr for date
        flatpickr("#date-picker", {
            locale: "es",
            dateFormat: "Y-m-d",
            minDate: "today",
            allowInput: true,
            onClose: function(selectedDates, dateStr, instance) {
                if (selectedDates.length > 0) {
                    instance.input.value = dateStr;
                }
            }
        });

        // Initialize Flatpickr for check-in time
        flatpickr("#check-in-hour-picker", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            allowInput: true,
            onClose: function(selectedDates, dateStr, instance) {
                if (selectedDates.length > 0) {
                    instance.input.value = dateStr;
                }
            }
        });

        // Load durations based on room selection
        function loadDurations(roomId) {
            const durationPicker = $('#duration-picker');
            durationPicker.empty().append('<option value="">Cargando...</option>');

            if (roomId) {
                $.get(`/rooms/${roomId}/prices`, function (data) {
                    let prices = data;
                    if (typeof data === 'string') {
                        try {
                            prices = JSON.parse(data);
                        } catch (e) {
                            durationPicker.empty().append('<option value="">Error al cargar precios</option>');
                            $('#base_amount').val('');
                            $('#extra_fee').val('0');
                            $('#amount').val('');
                            return;
                        }
                    }

                    durationPicker.empty().append('<option value="">Selecciona una opción</option>');
                    if (Array.isArray(prices) && prices.length > 0) {
                        const oldDuration = "{{ old('duration', $reservation->duration) }}";
                        const oldBaseAmount = "{{ old('base_amount', $reservation->amount) }}";
                        prices.forEach(function (item) {
                            const label = `${item.hours} hora${item.hours > 1 ? 's' : ''} por ${item.amount}bs`;
                            const isSelected = (parseInt(item.hours) === parseInt(oldDuration) && parseFloat(item.amount) === parseFloat(oldBaseAmount)) ? 'selected' : '';
                            durationPicker.append(`<option value="${item.hours}" data-amount="${item.amount}" ${isSelected}>${label}</option>`);
                        });

                        // Update base_amount and trigger amount calculation
                        $('#duration-picker').on('change', function () {
                            const baseAmount = parseFloat($(this).find(':selected').data('amount')) || '';
                            $('#base_amount').val(baseAmount);
                            updateTotalAmount();
                        });

                        // Trigger for old duration
                        const selectedOption = durationPicker.find('option:selected');
                        if (selectedOption.length) {
                            $('#base_amount').val(parseFloat(selectedOption.data('amount')) || '');
                            updateTotalAmount();
                        }
                    } else {
                        durationPicker.append('<option value="">No hay precios disponibles</option>');
                        $('#base_amount').val('');
                        $('#extra_fee').val('0');
                        $('#amount').val('');
                    }
                }).fail(function () {
                    durationPicker.empty().append('<option value="">Error al cargar precios</option>');
                    $('#base_amount').val('');
                    $('#extra_fee').val('0');
                    $('#amount').val('');
                });
            } else {
                durationPicker.empty().append('<option value="">Selecciona una habitación primero</option>');
                $('#base_amount').val('');
                $('#extra_fee').val('0');
                $('#amount').val('');
            }
        }

        // Guest count validation
        $("#guest-count").on("input", function() {
            let value = parseInt($(this).val());
            if (value < 1 || isNaN(value)) {
                $(this).val(1);
                Swal.fire({
                    icon: 'warning',
                    title: 'Valor inválido',
                    text: 'El número de personas debe ser al menos 1.',
                });
            } else {
                updateTotalAmount();
            }
        });

        // Calculate total amount based on guests and duration
        function updateTotalAmount() {
            const durationOption = $("#duration-picker option:selected");
            const baseAmount = parseFloat(durationOption.data('amount')) || 0;
            const guestCount = parseInt($("#guest-count").val()) || 1;
            const maxPeople = parseInt($("#room_id option:selected").data('max-people')) || 0;
            const extraGuestFee = 50; // Fee per extra person
            const extraGuests = guestCount > maxPeople ? guestCount - maxPeople : 0;
            const extraFee = extraGuests * extraGuestFee;
            const totalAmount = baseAmount + extraFee;

            $('#base_amount').val(baseAmount);
            $('#extra_fee').val(extraFee);
            $('#amount').val(totalAmount);
        }

        // Form submission with extra fee confirmation
        $("#reservation-form").on("submit", function(e) {
            e.preventDefault();
            const userId = $("#user_id").val();
            const roomId = $("#room_id").val();
            const date = $("#date-picker").val();
            const checkInTime = $("#check-in-hour-picker").val();
            const duration = $("#duration-picker").val();
            const baseAmount = $("#base_amount").val();
            const guestCount = parseInt($("#guest-count").val());
            const maxPeople = parseInt($("#room_id option:selected").data('max-people')) || 0;
            const extraGuestFee = 50; // Fee per extra person
            const extraGuests = guestCount > maxPeople ? guestCount - maxPeople : 0;
            const extraFee = extraGuests * extraGuestFee;
            const totalAmount = parseFloat(baseAmount) + extraFee;

            // Validate inputs
            if (!userId || !roomId || !date || !checkInTime || !duration || !baseAmount || !guestCount) {
                Swal.fire({
                    icon: 'error',
                    title: 'Campos incompletos',
                    text: 'Por favor, completa todos los campos (usuario, habitación, fecha, hora de entrada, duración y número de personas).',
                });
                return;
            }

            if (isNaN(guestCount) || guestCount < 1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Valor inválido',
                    text: 'El número de personas debe ser al menos 1.',
                });
                return;
            }

            // Confirm extra fees if applicable
            if (extraGuests > 0) {
                Swal.fire({
                    icon: 'info',
                    title: 'Cargos adicionales',
                    text: `Se cobrarán ${extraGuestFee}bs por cada persona adicional (${extraGuests} persona${extraGuests > 1 ? 's' : ''}). Total adicional: ${extraFee}bs.`,
                    showConfirmButton: true,
                    confirmButtonText: 'Continuar',
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#reservation-form").off("submit").submit();
                    }
                });
            } else {
                $("#reservation-form").off("submit").submit();
            }
        });

        // Load durations for the initial room_id
        loadDurations($('#room_id').val());
    });
</script>
@endsection
