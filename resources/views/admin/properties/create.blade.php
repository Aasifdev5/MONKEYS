@extends('layout.master')

@section('title')
    {{ __('Añadir Nueva Propiedad') }}
@endsection

@section('main_content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h3>Añadir Nueva Propiedad</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Propiedades</li>
                    <li class="breadcrumb-item active">Añadir Nueva Propiedad</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h4 class="m-b-0">Formulario de Nueva Propiedad</h4>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card mb-3">
                            <div class="card-header">
                                <h5>Detalles de la Propiedad</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="description">Descripción</label>
                                    <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="thumbnail">Imagen Principal</label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control" onchange="previewThumbnail(event)">
                                    <div id="thumbnail-preview" class="mt-3">
                                        <img id="thumbnail-img" src="#" alt="Vista Previa de la Imagen Principal" class="img-fluid" style="max-width: 300px; display: none;">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="price">Precio</label>
                                    <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="max_people">Máximo de Personas</label>
                                    <input type="number" name="max_people" id="max_people" class="form-control" value="{{ old('max_people') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="equipment_rate">Equipamiento  Rate</label>
                                    <input type="number" name="equipment_rate" id="equipment_rate" class="form-control" value="{{ old('equipment_rate') }}">
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                <h5>Habitaciones</h5>
                            </div>
                            <div class="card-body">
                                <div id="bedrooms-wrapper">
                                    @if(old('bedrooms'))
                                        @foreach(old('bedrooms') as $i => $bedroom)
                                            <div class="card p-3 mb-2">
                                                <input type="text" name="bedrooms[{{ $i }}][title]" class="form-control mb-1" placeholder="Título de la Habitación" value="{{ $bedroom['title'] }}">
                                                <textarea name="bedrooms[{{ $i }}][description]" class="form-control mb-1" placeholder="Descripción">{{ $bedroom['description'] }}</textarea>
                                                <input type="file" name="bedrooms[{{ $i }}][image]" class="form-control mb-1">
                                                <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">Eliminar</button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-secondary" onclick="addBedroom()">Añadir Habitación</button>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                <h5>Comodidades</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @php
                                        $staticAmenities = [
                                            'entertainment' => ['label' => 'Entretenimiento de alta gama', 'icon' => 'fas fa-film'],
                                            'group_spaces' => ['label' => 'Espacios para compartir en grupo', 'icon' => 'fas fa-users'],
                                            'fully_equipped' => ['label' => 'Habitaciones totalmente equipadas', 'icon' => 'fas fa-hot-tub'],
                                            'bed' => ['label' => 'Cama', 'icon' => 'fas fa-bed'],
                                            'tv' => ['label' => 'Televisor', 'icon' => 'fas fa-tv'],
                                            'wifi' => ['label' => 'WiFi', 'icon' => 'fas fa-wifi'],
                                            'private_bathroom' => ['label' => 'Baño privado', 'icon' => 'fas fa-bath'],
                                            'fridge' => ['label' => 'Refrigerador', 'icon' => 'fas fa-snowflake'],
                                            'ac' => ['label' => 'Aire acondicionado', 'icon' => 'fas fa-snowflake'],
                                            'kitchen' => ['label' => 'Cocina', 'icon' => 'fas fa-utensils'],
                                            'microwave' => ['label' => 'Microondas', 'icon' => 'fas fa-utensils'],
                                            'chairs' => ['label' => 'Sillas adicionales', 'icon' => 'fas fa-chair'],
                                            'tables' => ['label' => 'Mesas (central o comedor)', 'icon' => 'fas fa-table'],
                                            'hot_shower' => ['label' => 'Ducha caliente', 'icon' => 'fas fa-shower'],
                                            'pool' => ['label' => 'Mesa de billar', 'icon' => 'fas fa-trophy'],
                                            'jacuzzi' => ['label' => 'Jacuzzi', 'icon' => 'fas fa-hot-tub'],
                                            'bar' => ['label' => 'Área de bar/bebidas', 'icon' => 'fas fa-glass-martini-alt'],
                                            'remotes' => ['label' => 'Controles remotos para TV/PS', 'icon' => 'fas fa-gamepad'],
                                            'playstation' => ['label' => 'PlayStation', 'icon' => 'fas fa-gamepad'],
                                            'alexa' => ['label' => 'Servicio Alexa', 'icon' => 'fas fa-robot'],
                                            'living' => ['label' => 'Sala de estar', 'icon' => 'fas fa-couch'],
                                            'sound_room' => ['label' => 'Sala de sonido', 'icon' => 'fas fa-microphone-alt'],
                                            'heating' => ['label' => 'Calefacción', 'icon' => 'fas fa-temperature-high'],
                                            'hammocks' => ['label' => 'Hamacas', 'icon' => 'fas fa-leaf'],
                                            'wardrobe' => ['label' => 'Armario', 'icon' => 'fas fa-tshirt'],
                                            'sound_system' => ['label' => 'Sistema de sonido', 'icon' => 'fas fa-volume-up'],
                                        ];
                                    @endphp
                                    @foreach ($staticAmenities as $value => $amenity)
                                        <div class="col-md-4 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="amenities[]" id="amenity-{{ $value }}" value="{{ $value }}"
                                                    @if(old('amenities') && in_array($value, old('amenities'))) checked @endif>
                                                <label class="form-check-label" for="amenity-{{ $value }}">
                                                    <i class="{{ $amenity['icon'] }}"></i> {{ $amenity['label'] }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                <h5>Imágenes de la Galería</h5>
                            </div>
                            <div class="card-body">
                                <input type="file" name="property_images[]" class="form-control" multiple onchange="previewGalleryImages(event)">
                                <div id="gallery-preview" class="mt-3"></div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Guardar Propiedad</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewThumbnail(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function(e) {
        const thumbnailImg = document.getElementById('thumbnail-img');
        thumbnailImg.src = e.target.result;
        thumbnailImg.style.display = 'block';
    };
    if (file) {
        reader.readAsDataURL(file);
    }
}

function previewGalleryImages(event) {
    const galleryPreview = document.getElementById('gallery-preview');
    galleryPreview.innerHTML = '';
    const files = event.target.files;
    for (const file of files) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imgElement = document.createElement('img');
            imgElement.src = e.target.result;
            imgElement.classList.add('img-thumbnail', 'm-1');
            imgElement.style.maxWidth = '150px';
            galleryPreview.appendChild(imgElement);
        };
        if (file) {
            reader.readAsDataURL(file);
        }
    }
}

function addBedroom() {
    const index = document.querySelectorAll('#bedrooms-wrapper .card').length;
    const html = `
        <div class="card p-3 mb-2">
            <input type="text" name="bedrooms[${index}][title]" class="form-control mb-1" placeholder="Título de la Habitación">
            <textarea name="bedrooms[${index}][description]" class="form-control mb-1" placeholder="Descripción"></textarea>
            <input type="file" name="bedrooms[${index}][image]" class="form-control mb-1">
            <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">Eliminar</button>
        </div>`;
    document.getElementById('bedrooms-wrapper').insertAdjacentHTML('beforeend', html);
}
</script>
@endsection

@section('scripts')
<!-- No additional scripts required for this form -->
@endsection
