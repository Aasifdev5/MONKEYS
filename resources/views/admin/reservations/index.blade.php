```blade
@extends('layout.master')
@section('title')
    {{ __('Reservas') }}
@endsection

@section('main_content')
<div class="container my-4">
    @if(Session::has('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">
                <p>{{ session('fail') }}</p>
            </div>
            @endif
    <div class="card shadow-lg">
        <div class="card-header text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Reservas</h4>
            <a href="{{ route('manual-reservation.create') }}" class="btn btn-primary mb-3">+ Nueva Reserva Manual</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-1" class="table table-hover table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Habitación</th>
                            <th>Nombre Completo</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Fecha</th>
                            <th>Entrada</th>
                            <th>Salida</th>
                            <th>Huéspedes</th>
                            <th>Pago</th>
                            <th>Comprobante</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $res)
                            <tr>
                                <td>{{ $res->id }}</td>
                                <td><strong>{{ $res->room ? $res->room->name : 'N/D' }}</strong></td>
                                <td>{{ $res->full_name }}</td>
                                <td>{{ $res->email }}</td>
                                <td>{{ $res->phone }}</td>
                                <td>{{ $res->date }}</td>
                                <td>{{ $res->check_in_time }}</td>
                                <td>{{ $res->check_out_time }}</td>
                                <td>{{ $res->guests }}</td>
                                <td>
                                    <select class="form-select form-select-sm payment-status" data-id="{{ $res->id }}" style="min-width: 120px;">
                                        <option value="pending" {{ $res->payment_status == 'pending' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="confirmed" {{ $res->payment_status == 'confirmed' ? 'selected' : '' }}>Confirmado</option>
                                        <option value="cancelled" {{ $res->payment_status == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                                    </select>
                                </td>
                                <td>
                                    @if ($res->proof_path)
                                        <a href="/{{ $res->proof_path }}" target="_blank" class="btn btn-sm btn-outline-primary">Ver</a>
                                    @else
                                        <span class="text-muted">N/D</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('manual-reservation.edit', $res) }}" class="btn btn-sm btn-primary">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Contenedor de Toast -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="toast-container" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toast-message">Estado actualizado exitosamente.</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
        </div>
    </div>
</div>

<script>
    $(document).on('change', '.payment-status', function () {
        const reservationId = $(this).data('id');
        const newStatus = $(this).val();

        $.ajax({
            url: `/admin/reservations/${reservationId}/update-status`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                payment_status: newStatus
            },
            success: function (response) {
                $('#toast-message').text(response.message);
                const toast = new bootstrap.Toast(document.getElementById('toast-container'));
                toast.show();
            },
            error: function () {
                alert('Error al actualizar el estado.');
            }
        });
    });
</script>
@endsection
```
