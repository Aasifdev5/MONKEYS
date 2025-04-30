@extends('admin.Master')

@section('title')
    Eventos
@endsection

@section('content')
    <div class="page-body" style="background: #000">
        <div class="page-content">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                @if (Session::has('fail'))
                    <div class="alert alert-danger">
                        <p>{{ session('fail') }}</p>
                    </div>
                @endif
                <br>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card" style="background: #fff;">
                            <div class="card-header">
                                <h2>{{ __('Eventos creados') }}</h2>
                                <a class="btn btn-primary pull-right" href="{{ route('events.create') }}" style="background-color: #00f;">Añadir nuevo evento</a>
                                <button id="bulk-delete" class="btn btn-danger mb-3" disabled>
                                    <i class="fas fa-trash-alt"></i> Eliminar Seleccionados
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="advance-1" class="table  table-striped">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="select-all"></th>
                                                <th>Título del curso</th>
                                                <th>Descripción</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Enlace</th>

                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($events as $event)
                                                <tr class="removable-item">
                                                    <td><input type="checkbox" class="event-checkbox" value="{{ $event->uuid }}"></td>
                                                    <td>{{ $event->title }}</td>
                                                    <td>{!! Str::limit($event->description, 50) !!}</td>
                                                    <td>{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</td>

                                                    <td>{{ $event->time }}</td>

                                                    <td>
                                                        <a href="{{ $event->link }}" target="_blank" title="Meet" class="icon-link">
                                                            <div class="icon-container">
                                                                <i class="fab fa-google-meet" style="color: #ffffff; font-size: 24px;"></i> <!-- Font Awesome Google Meet Icon -->
                                                            </div>
                                                        </a>
                                                    </td>

                                                    <style>
                                                    .icon-link {
                                                        display: inline-block; /* Keeps the anchor inline */
                                                    }

                                                    .icon-container {
                                                        background-color: #4285F4; /* Google Meet blue */
                                                        border-radius: 50%; /* Makes it circular */
                                                        width: 48px; /* Size of the circle */
                                                        height: 48px; /* Size of the circle */
                                                        display: flex; /* Centers the icon */
                                                        align-items: center; /* Centers the icon vertically */
                                                        justify-content: center; /* Centers the icon horizontally */
                                                        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animation effects */
                                                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); /* Adds a subtle shadow */
                                                    }

                                                    .icon-container:hover {
                                                        transform: scale(1.1); /* Grows the icon slightly on hover */
                                                        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3); /* Increases shadow on hover */
                                                    }
                                                    </style>



                                                    <td>
                                                        <div class="action__buttons">
                                                            <a href="{{ route('events.edit', [$event->uuid]) }}" title="Editar" class="btn btn-success">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" title="Eliminar" class="btn btn-danger delete-event" data-url="{{ route('events.delete', $event->uuid) }}">
                                                                <i class="fa fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Select all checkboxes
            $('#select-all').click(function() {
                $('.event-checkbox').prop('checked', this.checked);
                toggleBulkDeleteButton();
            });

            // Enable/disable bulk delete button based on selected checkboxes
            $('.event-checkbox').change(function() {
                toggleBulkDeleteButton();
            });

            // Function to toggle the bulk delete button
            function toggleBulkDeleteButton() {
                $('#bulk-delete').prop('disabled', $('.event-checkbox:checked').length === 0);
            }

            // Bulk delete action
            $('#bulk-delete').click(function() {
                const selectedIds = $('.event-checkbox:checked').map(function() {
                    return $(this).val();
                }).get();

                if (selectedIds.length > 0) {
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡Esta acción eliminará permanentemente los eventos seleccionados!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#007bff',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('events.bulk.delete') }}",
                                type: 'POST',
                                data: {
                                    ids: selectedIds,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    if (response.success) {
                                        Swal.fire('Eliminado!', response.message, 'success').then(() => {
                                            location.reload();
                                        });
                                    } else {
                                        Swal.fire('Error!', response.message, 'error');
                                    }
                                },
                                error: function(xhr) {
                                    Swal.fire('Error!', 'Ocurrió un error al eliminar los eventos seleccionados.', 'error');
                                }
                            });
                        }
                    });
                }
            });

            // Individual delete confirmation with SweetAlert
            $('.delete-event').click(function(e) {
                e.preventDefault();

                let deleteUrl = $(this).data('url');

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡Esta acción eliminará permanentemente este evento!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#007bff',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "GET",
                            url: deleteUrl,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire('Eliminado!', 'Evento eliminado correctamente.', 'success').then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire('Error!', 'No se pudo eliminar el evento.', 'error');
                                }
                            },
                            error: function(xhr) {
                                Swal.fire('Error!', 'No se pudo eliminar el evento. Por favor, inténtelo de nuevo más tarde.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
