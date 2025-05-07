@extends('master')

@section('title')
    {{ __('Historial de Reservas') }}
@endsection

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Historial de Reservas</h3>

    <div class="table-responsive">
        <table id="reservationsTable" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre Completo</th>
                    <th>Correo Electrónico</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Hora de Entrada</th>
                    <th>Hora de Salida</th>
                    <th>Huéspedes</th>
                    <th>Prueba de Pago</th>
                    <th>Estado de Pago</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $reservation->full_name }}</td>
                        <td>{{ $reservation->email }}</td>
                        <td>{{ $reservation->phone }}</td>
                        <td>{{ $reservation->date }}</td>
                        <td>{{ $reservation->check_in_time }}</td>
                        <td>{{ $reservation->check_out_time }}</td>
                        <td>{{ $reservation->guests }}</td>
                        <td>
                            <a href="{{ asset($reservation->proof_path) }}" target="_blank" class="btn btn-info btn-sm">
                                <i class="fas fa-file-upload"></i> Ver Prueba
                            </a>
                        </td>
                        <td class="text-center text-dark">
                            <span class="badge badge-{{ $reservation->payment_status === 'pending' ? 'warning' : 'success' }}" style="color: #000;">
                                {{ ucfirst($reservation->payment_status) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Include DataTables CSS -->
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

<!-- Include DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTables
        $('#reservationsTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Spanish.json" // For Spanish language
            },
            "lengthMenu": [10, 25, 50, 100], // Set the number of records per page
        });
    });
</script>
@endsection


