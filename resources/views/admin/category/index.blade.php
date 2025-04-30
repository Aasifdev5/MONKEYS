@extends('layout.master')

@section('title')
    Categorías
@endsection

@section('main_content')

    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid">
            @if(Session::has('success'))
            <div class="alert alert-success">
                <p>{{session::get('success')}}</p>
            </div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">
                <p>{{session::get('fail')}}</p>
            </div>
            @endif
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card" >
                        <div class="card-header">
                            <h2>{{ __('Lista de categoría') }}</h2>
                            <a href="{{ route('category.create') }}" class="btn btn-success btn-sm pull-right"> <i
                                    class="fa fa-plus"></i> {{ __('añadir categoría') }} </a>
                        </div>
                        <div class="card-body">
                            <button id="bulk-delete" class="btn btn-danger mb-3" disabled>
                                <i class="fas fa-trash-alt"></i> Eliminar Seleccionados
                            </button>
                            <div class="table-responsive">
                                <table id="advance-1" class="row-border data-table-filter table-style">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select-all"></th>
                                            <th>{{ __('categoria ID') }}</th>
                                            <th>{{ __('Nombre') }}</th>
                                            <th>{{ __('Función') }}</th>
                                            <th>{{ __('Acción') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                        <tr class="removable-item">
                                            <td><input type="checkbox" class="category-checkbox" value="{{ $category->uuid }}"></td>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                @if ($category->is_feature == 'yes')
                                                    <span class="status active">{{ __('Sí') }}</span>
                                                @else
                                                    <span class="status blocked">{{ __('No') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="action__buttons">
                                                    <a href="{{ route('category.edit', [$category->uuid]) }}"
                                                        title="Edit"
                                                        class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5"
                                                        data-toggle="tooltip"> <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" title="Delete"
                                                        class="btn btn-icon waves-effect waves-light btn-danger m-b-5 delete-category"
                                                        data-toggle="tooltip" title="{{ trans('remove') }}"
                                                        data-url="{{ route('category.delete', $category->uuid) }}">
                                                        <i class="fa fa-remove"></i>
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
    <!-- Page content area end -->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Select all checkboxes
        $('#select-all').click(function() {
            $('.category-checkbox').prop('checked', this.checked);
            toggleBulkDeleteButton();
        });

        // Enable/disable bulk delete button based on selected checkboxes
        $('.category-checkbox').change(function() {
            toggleBulkDeleteButton();
        });

        // Function to toggle the bulk delete button
        function toggleBulkDeleteButton() {
            $('#bulk-delete').prop('disabled', $('.category-checkbox:checked').length === 0);
        }

        // Bulk delete action
        $('#bulk-delete').click(function() {
            const selectedIds = $('.category-checkbox:checked').map(function() {
                return $(this).val();
            }).get();

            if (selectedIds.length > 0) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡Esta acción eliminará permanentemente las categorías seleccionadas!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#007bff',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('category.bulk.delete') }}",
                            type: 'POST',
                            data: {
                                ids: selectedIds,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    toastr.success(response.message);
                                    location.reload();
                                } else {
                                    toastr.error(response.message);
                                }
                            },
                            error: function(xhr) {
                                toastr.error('Ocurrió un error al eliminar las categorías seleccionadas.');
                            }
                        });
                    }
                });
            }
        });

        // Individual delete confirmation with SweetAlert
        $('.delete-category').click(function(e) {
            e.preventDefault();

            let deleteUrl = $(this).data('url');

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción eliminará permanentemente esta categoría!",
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
                                toastr.success("Categoría eliminada correctamente.", "", {
                                    onHidden: function() {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                toastr.error("No se pudo eliminar la categoría.");
                            }
                        },
                        error: function(xhr) {
                            toastr.error("No se pudo eliminar la categoría. Por favor, inténtelo de nuevo más tarde.");
                        }
                    });
                }
            });
        });
    });
</script>
@endsection
