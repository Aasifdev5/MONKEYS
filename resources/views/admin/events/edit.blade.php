@extends('admin.Master')
@section('title')
    Editar evento
@endsection

@section('content')
    <!-- Page content area start -->
    <div class="page-body" style="background: #000; margin-top: 80px;">
        <div class="container">
            <div class="card mt-4 p-4" style="background: #fff;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-vertical__item bg-style">
                                <div class="item-top mb-30">
                                    <h2>{{ __('Editar evento') }}</h2>
                                </div>
                                <form id="courseForm" action="{{ route('events.update', $event->uuid) }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Título del curso</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Título" value="{{ old('title', $event->title) }}">
                                        <small id="titleError" class="text-danger"></small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Descripción</label>
                                        <textarea class="form-control summernote" id="description" name="description" rows="3" placeholder="Escribe la descripción del curso">{!!old('description', $event->description) !!}</textarea>
                                        <small id="descriptionError" class="text-danger"></small>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="date" class="form-label">Fecha</label>
                                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $event->date) }}">
                                            <small id="dateError" class="text-danger"></small>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="time" class="form-label">Hora</label>
                                            <input type="time" class="form-control" id="time" name="time" value="{{ old('time', $event->time) }}">
                                            <small id="timeError" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="link" class="form-label">Enlace</label>
                                        <input type="url" class="form-control" id="link" name="link" placeholder="yoursite.com" value="{{ old('link', $event->link) }}">
                                        <small id="linkError" class="text-danger"></small>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100" style="background-color: #00f;">Actualizar Evento</button>
                                </form>

                                <!-- Include jQuery and SweetAlert -->
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                <script>
                                    $(document).ready(function() {
                                        $('#courseForm').submit(function(e) {
                                            e.preventDefault();

                                            // Clear previous error messages
                                            $('.text-danger').text('');

                                            let formData = new FormData(this);

                                            $.ajax({
                                                type: "POST",
                                                url: "{{ route('events.update', $event->uuid) }}",
                                                data: formData,
                                                contentType: false,
                                                processData: false,
                                                headers: {
                                                    'X-HTTP-Method-Override': 'POST' // Override method to PUT
                                                },
                                                success: function(response) {
                                                    if (response.success) {
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Éxito',
                                                            text: 'Evento actualizado exitosamente.',
                                                        }).then(() => {
                                                            window.location.href = "{{ route('events.index') }}";
                                                        });
                                                    } else {
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: response.message || 'No se pudo actualizar el evento.',
                                                        });
                                                    }
                                                },
                                                error: function(xhr) {
                                                    let errors = xhr.responseJSON.errors;
                                                    if (errors) {
                                                        // Display validation errors
                                                        if (errors.title) $('#titleError').text(errors.title[0]);
                                                        if (errors.description) $('#descriptionError').text(errors.description[0]);
                                                        if (errors.date) $('#dateError').text(errors.date[0]);
                                                        if (errors.time) $('#timeError').text(errors.time[0]);
                                                        if (errors.link) $('#linkError').text(errors.link[0]);
                                                    } else {
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: 'Ocurrió un error. Por favor, inténtelo de nuevo más tarde.',
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content area end -->
@endsection
