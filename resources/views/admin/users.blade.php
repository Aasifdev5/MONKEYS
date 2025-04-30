@extends('layout.master')
@section('title')
LISTA DE USUARIOS
@endsection
@section('main_content')

   <div class="container-fluid">
    @if (session()->has('success'))
    <div class="alert alert-success" style="background-color: green;">
        <p style="color: #fff;">{{ session()->get('success') }}</p>
    </div>
@endif
@if (session()->has('fail'))
    <div class="alert alert-danger" style="background-color: red;">
        <p style="color: #fff;">{{ session()->get('fail') }}</p>
    </div>
@endif
      <div class="row">
         <div class="col-sm-12">
            <div class="card" >
               <div class="card-header">
                  <h5>LISTA DE USUARIOS</h5>
                  <a class="btn btn-pill btn-primary btn-air-primary pull-right" href="{{url('admin/add_user')}}" data-toggle="tooltip" title="" role="button" data-bs-original-title="btn btn-primary">Agregar Usuario
                  </a>
                  <button id="bulk-delete" class="btn btn-danger pull-right me-2" data-toggle="tooltip" title="Eliminar Seleccionados" style="display: none;">
                      Eliminar Seleccionados
                  </button>
               </div>
               <div class="card-body">
                  <div class="content-page">
                     <div class="content">
                        <div class="container-fluid">
                           <div class="row">
                              <div class="col-12">
                                 <div class="card-box table-responsive">
                                    @if(Session::has('flash_message'))
                                    <div class="alert alert-success">
                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span></button>
                                       {{ Session::get('flash_message') }}
                                    </div>
                                    @endif
                                    <div class="table-responsive">
                                       <table class="table table-bordered display" id="salesTable">
                                          <thead>
                                             <tr>
                                                <th class="text-center">
                                                   <input type="checkbox" id="select-all">
                                                </th>
                                                <th>Acción</th>
                                                <th>Nombre de Usuario</th>
                                                <th>Correo Electrónico</th>
                                                <th>Dirección IP</th>
                                                <th>Estado del correo electrónico</th>


                                                <th>La fecha registrada</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             @foreach($usersData as $i => $data)
                                             @if($data->account_type != "admin")
                                             <tr>
                                                <td class="text-center">
                                                   <input type="checkbox" class="user-checkbox" value="{{ $data->id }}">
                                                </td>
                                                <td>
                                                   <a href="{{ url('admin/user/edit',$data->id) }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="edit">
                                                      <i class="fa fa-edit"></i>
                                                   </a>
                                                   <a href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 m-r-5 delete-btn" data-id="{{ $data->id }}" data-toggle="tooltip" title="Eliminar">
                                                      <i class="fa fa-trash"></i>
                                                   </a>
                                                </td>
                                                <td>

                                                   {{ stripslashes($data->name) }}
                                                </td>
                                                <td>{{ $data->email }}</td>


                                                <td>{{ $data->ip_address }}</td>
                                                <td>
                                                   @if($data->status == 1)
                                                       <span class="badge badge-success">Activo</span>
                                                   @else
                                                       <span class="badge badge-danger">Inactivo</span>
                                                   @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y  H:i:s') }}</td>
                                             </tr>
                                             @endif
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
            </div>
         </div>
      </div>
   </div>

<!-- Required DataTables CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<style>
    /* Ensure text is white and handle table overflow */
    .table-dark th, .table-dark td {
        white-space: nowrap;
        color: #ededed;
    }

    /* Set padding for readability */
    .table-dark th, .table-dark td {
        padding: 10px;
    }

    /* Adjust badge styling */
    .badge {
        font-size: 1em;
        padding: 5px 10px;
    }

    /* Custom style for DataTables buttons */
    .dt-buttons .btn, .dt-buttons .dt-button {
        background-color: #333; /* Dark background */
        color: #ededed;         /* White text */
        border: none;           /* Remove border */
        padding: 5px 10px;
        margin: 2px;
        border-radius: 4px;
    }

    /* Hover and focus effect for buttons */
    .dt-buttons .btn:hover, .dt-buttons .dt-button:hover,
    .dt-buttons .btn:focus, .dt-buttons .dt-button:focus {
        background-color: #0090ff; /* Accent color on hover */
        color: #fff;
    }
</style>

<script>
    $(document).ready(function() {
        $('#salesTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
                'pdfHtml5',
                'print'
            ],
            paging: true,
            pageLength: 5,
            responsive: true, // Enable responsiveness
            autoWidth: false, // Disable auto width to prevent overlapping
            language: {
                url: "//cdn.datatables.net/plug-ins/1.11.3/i18n/Spanish.json"
            }
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        const selectAllCheckbox = $('#select-all');
        const userCheckboxes = $('.user-checkbox');
        const bulkDeleteButton = $('#bulk-delete');

        // Toggle all checkboxes
        selectAllCheckbox.change(function() {
            userCheckboxes.prop('checked', this.checked);
            bulkDeleteButton.toggle(userCheckboxes.is(':checked'));
        });

        // Show/hide bulk delete button based on checkbox selection
        userCheckboxes.change(function() {
            bulkDeleteButton.toggle(userCheckboxes.is(':checked'));
        });

        // Bulk delete action
        bulkDeleteButton.on('click', function() {
            const selectedIds = userCheckboxes.filter(':checked').map(function() {
                return this.value;
            }).get();

            if (selectedIds.length === 0) {
                Swal.fire('Por favor, selecciona al menos un usuario para eliminar.');
                return;
            }

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send a request to delete the selected users
                    fetch("{{ url('admin/user/bulk_delete') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ ids: selectedIds })
                    }).then(response => response.json())
                      .then(data => {
                          if (data.success) {
                              Swal.fire('Eliminado!', 'Los usuarios han sido eliminados.', 'success');
                              setTimeout(() => location.reload(), 1500);
                          } else {
                              Swal.fire('Error!', 'Ocurrió un error al eliminar los usuarios.', 'error');
                          }
                      });
                }
            });
        });

        // Individual delete button handling
        $('.delete-btn').on('click', function() {
            const userId = $(this).data('id');

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch("{{ url('admin/user/delete_user') }}/" + userId, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(response => response.json())
                      .then(data => {
                          if (data.success) {
                              Swal.fire('Eliminado!', 'El usuario ha sido eliminado.', 'success');
                              setTimeout(() => location.reload(), 1500);
                          } else {
                              Swal.fire('Error!', 'Ocurrió un error al eliminar el usuario.', 'error');
                          }
                      });
                }
            });
        });
    });
</script>

@endsection
