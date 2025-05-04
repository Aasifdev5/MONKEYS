    @extends('layout.master')
    @section('title')
        {{ __('Edit Property') }}
    @endsection

    @section('main_content')
    <div class="container">
        <h2>Edit Property</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
            @csrf


            {{-- Property Details --}}
            <div class="card mb-3">
                <div class="card-header"><h5>Property Details</h5></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $property->name) }}">
                    </div>

                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description', $property->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Current Thumbnail</label><br>
                        <img src="{{ asset( $property->thumbnail) }}" width="150" class="mb-2">
                        <input type="file" name="thumbnail" id="thumbnail" class="form-control" onchange="previewThumbnail(event)">
                        <img id="thumbnail-img" src="#" alt="Preview" class="img-fluid mt-2" style="max-width: 300px; display: none;">
                    </div>

                    <div class="mb-3">
                        <label for="price">Price</label>
                        <input type="number" step="0.01" name="price" id="price" class="form-control"
                            value="{{ old('price', $property->price) }}">
                    </div>

                    <div class="mb-3">
                        <label for="max_people">Max People</label>
                        <input type="number" name="max_people" id="max_people" class="form-control"
                            value="{{ old('max_people', $property->max_people) }}">
                    </div>
                </div>
            </div>

            {{-- Bedrooms --}}
            <div class="card mb-3">
                <div class="card-header"><h5>Bedrooms</h5></div>
                <div class="card-body" id="bedrooms-wrapper">
                    @php
                        $bedrooms = old('bedrooms', $property->bedrooms ?? []);
                    @endphp
                    @foreach ($bedrooms as $i => $bedroom)
                        <div class="card p-3 mb-2">
                            <input type="text" name="bedrooms[{{ $i }}][title]" class="form-control mb-1"
                                value="{{ $bedroom['title'] ?? '' }}" placeholder="Title">
                            <textarea name="bedrooms[{{ $i }}][description]" class="form-control mb-1" placeholder="Description">{{ $bedroom['description'] ?? '' }}</textarea>
                            <input type="file" name="bedrooms[{{ $i }}][image]" class="form-control mb-1">
                            @if(isset($bedroom['image']) && !old('bedrooms')) {{-- Only show image if not using old inputs --}}
                                <img src="{{ asset( $bedroom['image']) }}" width="120">
                            @endif
                            <button type="button" class="btn btn-danger mt-2" onclick="this.parentElement.remove()">Remove</button>
                        </div>
                    @endforeach
                    <button type="button" class="btn btn-secondary mt-2" onclick="addBedroom()">Add Bedroom</button>
                </div>
            </div>

            {{-- Amenities --}}
            <div class="card mb-3">
                <div class="card-header"><h5>Amenities</h5></div>
                <div class="card-body" id="amenities-wrapper">
                    @php
                        $amenities = old('amenities', $property->amenities ?? []);
                    @endphp
                    @foreach ($amenities as $i => $amenity)
                        <div class="card p-3 mb-2">
                            <input type="text" name="amenities[{{ $i }}][title]" class="form-control mb-1"
                                value="{{ $amenity['title'] ?? '' }}" placeholder="Title">
                            <input type="file" name="amenities[{{ $i }}][image]" class="form-control mb-1">
                            @if(isset($amenity['image']) && !old('amenities'))
                                <img src="{{ asset( $amenity['image']) }}" width="120">
                            @endif
                            <button type="button" class="btn btn-danger mt-2" onclick="this.parentElement.remove()">Remove</button>
                        </div>
                    @endforeach
                    <button type="button" class="btn btn-secondary mt-2" onclick="addAmenity()">Add Amenity</button>
                </div>
            </div>

            {{-- Gallery --}}
            <div class="card mb-3">
                <div class="card-header"><h5>Gallery Images</h5></div>
                <div class="card-body">
                    <input type="file" name="property_images[]" class="form-control" multiple onchange="previewGalleryImages(event)">
                    <div id="gallery-preview" class="mt-2">
                        @foreach ($property->property_images ?? [] as $img)
                            <img src="{{ asset( $img) }}" width="100" class="me-2 mb-2 img-thumbnail">
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn btn-primary">Update Property</button>
        </form>
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
        if (file) reader.readAsDataURL(file);
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
            if (file) reader.readAsDataURL(file);
        }
    }

    function addBedroom() {
        const index = document.querySelectorAll('#bedrooms-wrapper .card').length;
        const html = `
            <div class="card p-3 mb-2">
                <input type="text" name="bedrooms[${index}][title]" class="form-control mb-1" placeholder="Bedroom Title">
                <textarea name="bedrooms[${index}][description]" class="form-control mb-1" placeholder="Description"></textarea>
                <input type="file" name="bedrooms[${index}][image]" class="form-control mb-1">
                <button type="button" class="btn btn-danger mt-2" onclick="this.parentElement.remove()">Remove</button>
            </div>`;
        document.getElementById('bedrooms-wrapper').insertAdjacentHTML('beforeend', html);
    }

    function addAmenity() {
        const index = document.querySelectorAll('#amenities-wrapper .card').length;
        const html = `
            <div class="card p-3 mb-2">
                <input type="text" name="amenities[${index}][title]" class="form-control mb-1" placeholder="Amenity Title">
                <input type="file" name="amenities[${index}][image]" class="form-control mb-1">
                <button type="button" class="btn btn-danger mt-2" onclick="this.parentElement.remove()">Remove</button>
            </div>`;
        document.getElementById('amenities-wrapper').insertAdjacentHTML('beforeend', html);
    }
    </script>
    @endsection
