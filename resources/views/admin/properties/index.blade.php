@extends('layout.master')
@section('title')
    {{ __('Properties') }}
@endsection
@section('main_content')
    <div class="container">
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
        <div class="card">
            <div class="card-header">
                <h2 class="mb-4">Properties</h2>
                <a href="{{ route('properties.create') }}" class="btn btn-primary mb-3">Add New Property</a>
                <button id="bulkDeleteBtn" class="btn btn-danger mb-3 pull-right">Delete Selected</button>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="basic-1">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>Name</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($properties as $property)
                            <tr id="tr_{{ $property->id }}">
                                <td><input type="checkbox" class="checkbox" data-id="{{ $property->id }}"></td>
                                <td>{{ $property->name }}</td>

                                <td>
                                    <a href="{{ route('properties.edit', $property->id) }}" title="Editar"
                                       class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5"
                                       data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                                    <button title="Eliminar"
                                            class="btn btn-icon waves-effect waves-light btn-danger m-b-5 deleteBtn"
                                            data-toggle="tooltip" data-id="{{ $property->id }}"><i
                                            class="fa fa-remove"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            // Select all checkbox logic
            $('#selectAll').on('click', function () {
                $('.checkbox').prop('checked', this.checked);
            });

            // Single delete
            $('.deleteBtn').click(function () {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This action cannot be undone!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route("properties.delete", ":id") }}'.replace(':id', id),
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                $('#tr_' + id).remove();
                                Swal.fire('Deleted!', response.success, 'success');
                            },
                            error: function (xhr) {
                                Swal.fire('Error!', xhr.responseJSON?.error || 'Something went wrong.', 'error');
                            }
                        });
                    }
                });
            });

            // Bulk delete
            $('#bulkDeleteBtn').click(function () {
                var ids = [];
                $('.checkbox:checked').each(function () {
                    ids.push($(this).data('id'));
                });

                if (ids.length === 0) {
                    Swal.fire('Please select at least one record.');
                    return;
                }

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Selected properties will be deleted!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete them!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route("properties.bulk.delete") }}',
                            type: 'POST',
                            data: {
                                ids: ids,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                $.each(ids, function (index, id) {
                                    $('#tr_' + id).remove();
                                });
                                Swal.fire('Deleted!', response.success, 'success');
                            },
                            error: function () {
                                Swal.fire('Error!', 'Bulk delete failed.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
