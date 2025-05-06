@extends('master')

@section('title')
{{ $property->name }}
@endsection

@section('content')
@push('styles')
<!-- Airbnb-like Flatpickr and Fonts -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Circular,-apple-system,BlinkMacSystemFont,Roboto,Helvetica Neue,sans-serif&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

<style>
    :root {
        --airbnb-pink: #FF385C;
        --airbnb-dark: #222222;
        --airbnb-light-gray: #f7f7f7;
        --airbnb-gray: #717171;
        --airbnb-border: #dddddd;
        --airbnb-star: #FF385C;
        --airbnb-success: #008A05;
        --gradient-start: #ffffff;
        --gradient-end: #f9f9f9;
        --shadow-sm: 0 1px 2px rgba(0,0,0,0.08);
        --shadow-md: 0 4px 12px rgba(0,0,0,0.12);
        --shadow-lg: 0 8px 24px rgba(0,0,0,0.16);
        --transition: all 0.2s ease-out;
    }

    body {
        font-family: 'Circular', -apple-system, BlinkMacSystemFont, 'Helvetica Neue', sans-serif;
        color: var(--airbnb-dark);
        line-height: 1.5;
        -webkit-font-smoothing: antialiased;
    }

    .container {
        max-width: 1120px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* Header Section */
    .property-header {
        margin-bottom: 32px;
    }

    .property-title {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 8px;
        line-height: 1.2;
    }

    .property-subtitle {
        color: var(--airbnb-gray);
        font-size: 16px;
        margin-bottom: 20px;
    }

    .property-meta {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 24px;
        font-size: 14px;
    }

    .property-actions {
        display: flex;
        gap: 16px;
    }

    .property-actions button {
        background: none;
        border: none;
        padding: 8px 12px;
        font-size: 14px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: var(--transition);
        border-radius: 8px;
    }

    .property-actions button:hover {
        background-color: rgba(0,0,0,0.05);
    }

    .property-actions button i {
        font-size: 16px;
    }

    .save-button.active i {
        color: var(--airbnb-pink);
        font-weight: 900;
    }

    /* Gallery Section */
    .property-gallery {
        display: grid;
        grid-template-columns: 60% 20% 20%;
        grid-template-rows: 50% 50%;
        gap: 8px;
        height: 550px;
        margin-bottom: 48px;
        border-radius: 12px;
        overflow: hidden;
        position: relative;
    }

    .gallery-main {
        grid-column: 1 / 2;
        grid-row: 1 / 3;
        position: relative;
    }

    .gallery-secondary {
        position: relative;
        overflow: hidden;
    }

    .gallery-secondary:nth-child(2) {
        grid-column: 2 / 3;
        grid-row: 1 / 2;
    }

    .gallery-secondary:nth-child(3) {
        grid-column: 3 / 4;
        grid-row: 1 / 2;
    }

    .gallery-secondary:nth-child(4) {
        grid-column: 2 / 3;
        grid-row: 2 / 3;
    }

    .gallery-secondary:nth-child(5) {
        grid-column: 3 / 4;
        grid-row: 2 / 3;
    }

    .property-gallery img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .gallery-main:hover img,
    .gallery-secondary:hover img {
        transform: scale(1.03);
    }

    .show-all-photos {
        position: absolute;
        bottom: 24px;
        right: 24px;
        background: white;
        color: var(--airbnb-dark);
        padding: 10px 16px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        box-shadow: var(--shadow-md);
        transition: var(--transition);
        z-index: 2;
    }

    .show-all-photos:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .gallery-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 80px;
        background: linear-gradient(to top, rgba(0,0,0,0.5), transparent);
        z-index: 1;
    }

    /* Image Preview Section */
    .image-preview {
        margin-bottom: 32px;
    }

    .image-preview img {
        margin-right: 8px;
        margin-bottom: 8px;
    }

    /* Main Content */
    .property-content {
        display: flex;
        gap: 48px;
        position: relative;
    }

    .property-main {
        flex: 2;
        min-width: 0;
    }

    .property-sidebar {
        flex: 1;
        position: relative;
        min-width: 0;
    }

    .section-title {
        font-size: 26px;
        font-weight: 700;
        margin: 48px 0 24px;
        line-height: 1.2;
    }

    .property-description {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 24px;
        color: var(--airbnb-dark);
    }

    .read-more {
        color: var(--airbnb-dark);
        font-weight: 600;
        text-decoration: underline;
        cursor: pointer;
        background: none;
        border: none;
        padding: 0;
        font-size: 16px;
        transition: color 0.2s ease;
    }

    .read-more:hover {
        color: var(--airbnb-pink);
    }

    /* Highlights Section */
    .property-highlights {
        display: flex;
        gap: 24px;
        padding: 24px 0;
        border-bottom: 1px solid var(--airbnb-border);
    }

    .highlight-item {
        display: flex;
        gap: 16px;
        flex: 1;
    }

    .highlight-icon {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--airbnb-pink);
        font-size: 20px;
    }

    .highlight-content h3 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .highlight-content p {
        font-size: 14px;
        color: var(--airbnb-gray);
        margin: 0;
    }

    /* Sleeping Arrangements */
    .sleeping-arrangements {
        position: relative;
        padding-bottom: 24px;
        border-bottom: 1px solid var(--airbnb-border);
    }

    .bedroom-slider {
        display: flex;
        gap: 16px;
        overflow-x: auto;
        padding-bottom: 16px;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
    }

    .bedroom-slider::-webkit-scrollbar {
        display: none;
    }

    .bedroom-card {
        min-width: 280px;
        background: white;
        border: 1px solid var(--airbnb-border);
        border-radius: 12px;
        padding: 16px;
        scroll-snap-align: start;
        transition: var(--transition);
    }

    .bedroom-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-4px);
    }

    .bedroom-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 12px;
    }

    .bedroom-title {
        font-weight: 600;
        margin-bottom: 4px;
        font-size: 16px;
    }

    .bedroom-desc {
        color: var(--airbnb-gray);
        font-size: 14px;
    }

    .pagination-dots {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin-top: 16px;
    }

    .dot {
        width: 8px;
        height: 8px;
        background: #ccc;
        border-radius: 50%;
        cursor: pointer;
        transition: var(--transition);
    }

    .dot.active {
        background: var(--airbnb-dark);
        transform: scale(1.2);
    }

    .dot:hover {
        background: var(--airbnb-pink);
    }

    /* Amenities Section */
    .amenities-section {
        padding-bottom: 24px;
        border-bottom: 1px solid var(--airbnb-border);
    }

    .amenities-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 24px;
    }

    .amenity-item {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 16px;
        transition: var(--transition);
        padding: 8px;
        border-radius: 8px;
    }

    .amenity-item:hover {
        background-color: rgba(0,0,0,0.03);
    }

    .amenity-icon {
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--airbnb-dark);
    }

    .show-all-amenities {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 16px;
        background: white;
        color: var(--airbnb-dark);
        border: 1px solid var(--airbnb-dark);
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
    }

    .show-all-amenities:hover {
        background: var(--airbnb-light-gray);
        border-color: var(--airbnb-gray);
    }

    /* Things to Know */
    .things-section {
        padding-bottom: 24px;
        border-bottom: 1px solid var(--airbnb-border);
    }

    .things-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 32px;
        margin-bottom: 32px;
    }

    .things-category {
        font-size: 16px;
    }

    .things-title {
        font-weight: 700;
        margin-bottom: 20px;
        font-size: 18px;
    }

    .things-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .things-list li {
        margin-bottom: 16px;
        font-size: 16px;
        line-height: 1.5;
        position: relative;
        padding-left: 24px;
    }

    .things-list li:before {
        content: "•";
        position: absolute;
        left: 0;
        color: var(--airbnb-gray);
    }

    /* Booking Widget */
    .booking-widget {
        position: sticky;
        top: 24px;
        border-radius: 12px;
        padding: 24px;
        background: white;
        border: 1px solid var(--airbnb-border);
        box-shadow: var(--shadow-md);
        transition: var(--transition);
    }

    .booking-widget:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
    }

    .booking-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 24px;
    }

    .booking-price {
        font-size: 22px;
        font-weight: 700;
    }

    .booking-price span {
        font-size: 16px;
        font-weight: 400;
        color: var(--airbnb-gray);
    }

    .booking-dates {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 16px;
    }

    .booking-date-field {
        position: relative;
        border: 1px solid var(--airbnb-dark);
        border-radius: 8px;
        padding: 12px;
        font-size: 14px;
        cursor: pointer;
        transition: border-color 0.2s ease;
    }

    .booking-date-field:hover {
        border-color: var(--airbnb-pink);
    }

    .booking-date-field label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 10px;
        font-weight: 700;
        color: var(--airbnb-dark);
        text-transform: uppercase;
        margin-bottom: 4px;
    }

    .booking-date-field label span.emoji {
        font-size: 16px;
    }

    .booking-date-field input {
        border: none;
        font-size: 14px;
        color: var(--airbnb-dark);
        font-weight: 500;
        width: 100%;
        outline: none;
        background: transparent;
    }

    .booking-date-field input::placeholder {
        color: var(--airbnb-gray);
        font-weight: 400;
    }

    .booking-guests {
        position: relative;
        margin-bottom: 16px;
    }

    .guest-input {
        border: 1px solid var(--airbnb-dark);
        border-radius: 8px;
        padding: 12px;
        font-size: 14px;
        background: white;
        display: flex;
        flex-direction: column;
        transition: var(--transition);
    }

    .guest-input:hover {
        border-color: var(--airbnb-pink);
    }

    .guest-input label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 10px;
        font-weight: 700;
        color: var(--airbnb-dark);
        text-transform: uppercase;
        margin-bottom: 4px;
    }

    .guest-input label span.emoji {
        font-size: 16px;
    }

    .guest-input input {
        border: none;
        font-size: 14px;
        color: var(--airbnb-dark);
        font-weight: 500;
        width: 100%;
        outline: none;
    }

    .guest-input input::placeholder {
        color: var(--airbnb-gray);
        font-weight: 400;
    }

    .booking-button {
        width: 100%;
        padding: 16px;
        background: var(--airbnb-pink);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 16px;
        cursor: pointer;
        text-align: center;
        transition: var(--transition);
        margin-top: 16px;
    }

    .booking-button:hover {
        background: #e63946;
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .booking-note {
        text-align: center;
        color: var(--airbnb-gray);
        font-size: 14px;
        margin-top: 16px;
        font-weight: 400;
    }

    .price-breakdown {
        margin-top: 24px;
        padding-top: 24px;
        border-top: 1px solid var(--airbnb-border);
    }

    .price-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 16px;
        font-size: 16px;
        color: var(--airbnb-dark);
    }

    .price-row .price-detail {
        text-decoration: underline;
        cursor: pointer;
    }

    .price-total {
        font-weight: 700;
        margin-top: 16px;
        padding-top: 16px;
        border-top: 1px solid var(--airbnb-border);
        font-size: 18px;
    }

    .extend-trip {
        display: block;
        text-align: center;
        color: var(--airbnb-pink);
        font-size: 16px;
        font-weight: 600;
        margin: 24px 0;
        text-decoration: underline;
        transition: var(--transition);
    }

    .extend-trip:hover {
        color: #e63946;
    }

    .report-listing {
        display: block;
        text-align: center;
        color: var(--airbnb-gray);
        font-size: 14px;
        font-weight: 400;
        margin-top: 16px;
        transition: var(--transition);
    }

    .report-listing:hover {
        color: var(--airbnb-dark);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .property-gallery {
            height: 450px;
        }

        .things-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .property-content {
            flex-direction: column;
        }

        .property-gallery {
            height: auto;
            grid-template-columns: 1fr;
            grid-template-rows: auto;
        }

        .gallery-main, .gallery-secondary {
            grid-column: auto;
            grid-row: auto;
            height: 300px;
        }

        .property-highlights {
            flex-direction: column;
            gap: 16px;
        }

        .amenities-grid {
            grid-template-columns: 1fr;
        }

        .things-grid {
            grid-template-columns: 1fr;
        }

        .booking-widget {
            position: static;
            margin-top: 32px;
        }
    }

    @media (max-width: 480px) {
        .property-title {
            font-size: 24px;
        }

        .section-title {
            font-size: 22px;
        }
    }

    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .fade-in {
        animation: fadeIn 0.5s ease;
    }

    /* Floating Action Button */
    .fab {
        position: fixed;
        bottom: 24px;
        right: 24px;
        width: 56px;
        height: 56px;
        background: var(--airbnb-pink);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        box-shadow: var(--shadow-lg);
        cursor: pointer;
        z-index: 1000;
        transition: var(--transition);
        border: none;
    }

    .fab:hover {
        transform: scale(1.1);
        background: #e63946;
    }

    /* Tooltip */
    .tooltip {
        position: absolute;
        background: var(--airbnb-dark);
        color: white;
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 14px;
        pointer-events: none;
        z-index: 1000;
        opacity: 0;
        transition: opacity 0.2s ease;
        white-space: nowrap;
    }

    .tooltip:after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: var(--airbnb-dark) transparent transparent transparent;
    }
</style>
@endpush

<div class="container">
    <!-- Property Header -->
    <div class="property-header">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <h1 class="property-title">{{ $property->name }}</h1>
                <p class="property-subtitle">
                    {{ $property->max_people }} huéspedes ·
                    {{ count($property->bedrooms) }} habitación{{ count($property->bedrooms) > 1 ? 'es' : '' }} ·
                    {{ $property->description }}
                </p>
            </div>
            <div class="property-actions">
                <button class="tooltip-trigger" data-tooltip="Compartir este anuncio">
                    <i class="fas fa-share-alt"></i> Compartir
                    <div class="tooltip">Compartir este anuncio</div>
                </button>
                <button class="save-button tooltip-trigger {{ $property->favorite ? 'active' : '' }}" data-tooltip="Guardar en tu lista de deseos" data-room-id="{{ $property->id }}">
                    <i class="fa{{ $property->favorite ? 's' : 'r' }} fa-heart"></i> Guardar
                    <div class="tooltip">Guardar en tu lista de deseos</div>
                </button>
            </div>
        </div>
        <div class="property-meta">
            @if($property->rating)
                <span><i class="fas fa-star" style="color: var(--airbnb-star);"></i> {{ number_format($property->rating, 2) }}</span>
            @endif
        </div>
    </div>

    <!-- Property Gallery -->
    <div class="property-gallery">
        <div class="gallery-main">
            <a href="{{ $property->thumbnail ?? 'https://via.placeholder.com/600' }}" data-lightbox="property-gallery" data-title="{{ $property->name }}">
                <img src="{{ $property->thumbnail ?? 'https://via.placeholder.com/600' }}" alt="Imagen principal de {{ $property->name }}">
            </a>
            <div class="gallery-overlay"></div>
        </div>
        @foreach(array_slice($property->property_images, 0, 4) as $index => $image)
            <div class="gallery-secondary">
                <a href="{{ $image }}" data-lightbox="property-gallery" data-title="{{ $property->name }} - Imagen {{ $index + 1 }}">
                    <img src="{{ $image }}" alt="{{ $property->name }} - Imagen {{ $index + 1 }}">
                </a>
            </div>
        @endforeach
        <button class="show-all-photos" id="show-all-photos">
            <i class="fas fa-camera"></i> Mostrar todas las fotos
        </button>
    </div>
    @if (session('fail'))
    <div class="alert alert-danger">
        {{ session('fail') }}
    </div>
@endif
    <div class="property-content">
        <div class="property-main">
            <!-- Property Highlights -->


            <hr>

            <!-- About Section -->
            <h2 class="section-title">Acerca de este lugar</h2>
            <p class="property-description">
                {{ $property->description ?: 'No hay descripción disponible.' }}
            </p>
            <button class="read-more">Mostrar más</button>

            <hr>

            <!-- Sleeping Arrangements -->
            <h2 class="section-title">Dónde dormirás</h2>
            <div class="sleeping-arrangements">
                <div class="bedroom-slider">
                    @foreach($property->bedrooms as $bedroom)
                        <div class="bedroom-card">
                            <img src="{{ $bedroom['image'] ?? 'https://via.placeholder.com/280' }}" alt="{{ $bedroom['title'] }}">
                            <h3 class="bedroom-title">{{ $bedroom['title'] }}</h3>
                            <p class="bedroom-desc">{{ $bedroom['description'] }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="pagination-dots">
                    @foreach($property->bedrooms as $index => $bedroom)
                        <span class="dot {{ $index == 0 ? 'active' : '' }}"></span>
                    @endforeach
                </div>
            </div>

            <hr>

            <!-- Amenities -->
            <div class="amenities-section">
                <h2 class="section-title">Qué ofrece este lugar</h2>
                <div class="amenities-grid">
                    @php
                        $staticAmenities = [
                            'entertainment' => ['label' => 'Entretenimiento de alta gama', 'icon' => 'fas fa-film'],
                            'group_spaces' => ['label' => 'Espacios para compartir en grupo', 'icon' => 'fas fa-users'],
                            'fully_equipped' => ['label' => 'Habitaciones totalmente equipadas', 'icon' => 'fas fa-star'],
                            'bed' => ['label' => 'Cama', 'icon' => 'fas fa-bed'],
                            'tv' => ['label' => 'Televisor', 'icon' => 'fas fa-tv'],
                            'wifi' => ['label' => 'WiFi', 'icon' => 'fas fa-wifi'],
                            'private_bathroom' => ['label' => 'Baño privado', 'icon' => 'fas fa-bath'],
                            'fridge' => ['label' => 'Refrigerador', 'icon' => 'fas fa-door-closed'],
                            'ac' => ['label' => 'Aire acondicionado', 'icon' => 'fas fa-snowflake'],
                            'kitchen' => ['label' => 'Cocina', 'icon' => 'fas fa-utensils'],
                            'microwave' => ['label' => 'Microondas', 'icon' => 'fas fa-wave-square'],
                            'chairs' => ['label' => 'Sillas adicionales', 'icon' => 'fas fa-chair'],
                            'tables' => ['label' => 'Mesas (central o comedor)', 'icon' => 'fas fa-table'],
                            'hot_shower' => ['label' => 'Ducha caliente', 'icon' => 'fas fa-shower'],
                            'pool' => ['label' => 'Mesa de billar', 'icon' => 'fas fa-circle'],
                            'jacuzzi' => ['label' => 'Jacuzzi', 'icon' => 'fas fa-star'],
                            'bar' => ['label' => 'Área de bar/bebidas', 'icon' => 'fas fa-glass-martini'],
                            'remotes' => ['label' => 'Controles remotos para TV/PS', 'icon' => 'fas fa-gamepad'],
                            'playstation' => ['label' => 'PlayStation', 'icon' => 'fas fa-gamepad'],
                            'alexa' => ['label' => 'Servicio Alexa', 'icon' => 'fas fa-robot'],
                            'living' => ['label' => 'Sala de estar', 'icon' => 'fas fa-couch'],
                            'sound_room' => ['label' => 'Sala de sonido', 'icon' => 'fas fa-microphone-alt'],
                            'heating' => ['label' => 'Calefacción', 'icon' => 'fas fa-temperature-high'],
                            'hammocks' => ['label' => 'Hamacas', 'icon' => 'fas fa-umbrella-beach'],
                            'wardrobe' => ['label' => 'Armario', 'icon' => 'fas fa-tshirt'],
                            'sound_system' => ['label' => 'Sistema de sonido', 'icon' => 'fas fa-volume-up'],
                        ];
                    @endphp
                    @foreach(array_slice($property->amenities, 0, 10) as $amenity)
                        @if(isset($staticAmenities[$amenity]))
                            <div class="amenity-item">
                                <div class="amenity-icon">
                                    <i class="{{ $staticAmenities[$amenity]['icon'] }}"></i>
                                </div>
                                <div>{{ $staticAmenities[$amenity]['label'] }}</div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <button class="show-all-amenities">
                    <i class="fas fa-plus"></i> Mostrar todas las {{ count($property->amenities) }} comodidades
                </button>
            </div>

            <hr>

            <!-- Things to Know -->
            <div class="things-section">
                <h2 class="section-title">Cosas que debes saber</h2>
                <div class="things-grid">
                    <div class="things-category">
                        <h3 class="things-title">Reglas de la casa</h3>
                        <ul class="things-list">
                            <li>Check-in después de las 2:00 PM</li>
                            <li>Checkout antes de las 11:00 AM</li>
                            <li>No fumar</li>
                            <li>Máximo {{ $property->max_people }} huéspedes</li>
                            <li>Se permiten mascotas</li>
                        </ul>
                    </div>
                    <div class="things-category">
                        <h3 class="things-title">Seguridad y propiedad</h3>
                        <ul class="things-list">
                            <li>Sin alarma de monóxido de carbono</li>
                            <li>Sin alarma de humo</li>
                            <li>Piscina/jacuzzi sin puerta ni cerradura</li>
                            <li>Cámara de seguridad en la propiedad</li>
                            <li>Hay que subir escaleras</li>
                        </ul>
                    </div>
                    <div class="things-category">
                        <h3 class="things-title">Política de cancelación</h3>
                        <p>Cancelación gratuita durante 48 horas. Después de eso, cancela antes del 10 de mayo y obtén un reembolso del 50%, menos la primera noche y la tarifa de servicio.</p>
                        <button class="read-more">Mostrar más</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="property-sidebar">
            <!-- Booking Widget -->
            <div class="booking-widget">
                <div class="booking-header">
                    <div class="booking-price">Bs{{ number_format($property->price, 2) }} <span>/ hora</span></div>
                </div>

                <div class="booking-dates">
                    <div class="booking-date-field">
                        <label><span class="emoji">📅</span> Fecha</label>
                        <input type="text" id="date-picker" name="date" placeholder="Añadir fecha">
                    </div>
                    <div class="booking-date-field">
                        <label><span class="emoji">⏰</span> Hora de entrada</label>
                        <input type="text" id="check-in-hour-picker" name="check_in_hour" placeholder="Añadir hora">
                    </div>
                    <div class="booking-date-field">
                        <label><span class="emoji">⏰</span> Hora de salida</label>
                        <input type="text" id="check-out-hour-picker" name="check_out_hour" placeholder="Añadir hora">
                    </div>
                </div>

                <div class="booking-guests">
                    <div class="guest-input">
                        <label><span class="emoji">👥</span> Número de personas</label>
                        <input type="number" id="guest-count" name="people" min="1" max="{{ $property->max_people }}" value="1" placeholder="1">
                    </div>
                </div>

                <div class="booking-section">
                    @if(!empty($user_session))
                        <a href="{{ route('booking.form', ['room' => $property->id])}}" id="reserve-button" class="btn btn-sm booking-button" data-room-id="{{ $property->id }}" data-room-name="{{ $property->name }}" data-room-price="{{ $property->price }}">Reservar</a>
                    @else
                        <a href="{{ url('Userlogin')}}" class="btn btn-sm booking-button">Reservar</a>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>

<!-- Floating Action Button -->
<button class="fab" id="fab-reserve">
    <i class="fas fa-calendar-check"></i>
</button>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    // Initialize Flatpickr for date and time pickers
    flatpickr("#date-picker", {
        dateFormat: "Y-m-d",
        minDate: "today",
        allowInput: true,
        onClose: function(selectedDates, dateStr, instance) {
            if (selectedDates.length > 0) {
                instance.input.value = dateStr;
            }
        }
    });

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

    flatpickr("#check-out-hour-picker", {
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

    // Update people value on input change
    $("#guest-count").on("input", function() {
        let value = parseInt($(this).val());
        if (value < 1) {
            $(this).val(1);
        } else if (value > {{ $property->max_people }}) {
            $(this).val({{ $property->max_people }});
        }
    });

    // Handle reserve button click to pass chosen values
    $("#reserve-button").click(function(e) {
        e.preventDefault();
        const roomId = $(this).data('room-id');
        const roomName = encodeURIComponent($(this).data('room-name'));
        const roomPrice = $(this).data('room-price');
        const date = $("#date-picker").val();
        const checkInHour = $("#check-in-hour-picker").val();
        const checkOutHour = $("#check-out-hour-picker").val();
        const guestCount = $("#guest-count").val();

        // Validate inputs
        if (!date || !checkInHour || !checkOutHour || !guestCount) {
            alert('Por favor, completa todos los campos (fecha, hora de entrada, hora de salida y número de personas).');
            return;
        }

        // Construct URL with query parameters
        const url = `{{ route('booking.form', ['room' => ':roomId']) }}`
            .replace(':roomId', roomId) +
            `?date=${encodeURIComponent(date)}` +
            `&check_in_hour=${encodeURIComponent(checkInHour)}` +
            `&check_out_hour=${encodeURIComponent(checkOutHour)}` +
            `&people=${encodeURIComponent(guestCount)}` +
            `&room_name=${roomName}` +
            `&room_price=${encodeURIComponent(roomPrice)}`;

        // Redirect to booking form
        window.location.href = url;
    });

    // Bedroom slider pagination
    $('.dot').click(function() {
        const index = $(this).index();
        $(this).addClass('active').siblings().removeClass('active');
        $('.bedroom-slider').animate({
            scrollLeft: $('.bedroom-card').eq(index).position().left + $('.bedroom-slider').scrollLeft()
        }, 300);
    });

    // Update dots based on scroll position
    $('.bedroom-slider').on('scroll', function() {
        const scrollPosition = $(this).scrollLeft();
        const cardWidth = $('.bedroom-card').outerWidth();
        const currentIndex = Math.round(scrollPosition / cardWidth);
        $('.dot').eq(currentIndex).addClass('active').siblings().removeClass('active');
    });

    // Toggle "Show more" sections
    $('.read-more').click(function() {
        const section = $(this).prev();
        if (section.hasClass('collapsed')) {
            section.removeClass('collapsed');
            $(this).text('Mostrar menos');
        } else {
            section.addClass('collapsed');
            $(this).text('Mostrar más');
        }
    });

    // Save button toggle with AJAX
    $('.save-button').click(function() {
        const $button = $(this);
        const roomId = $button.data('room-id');
        const isActive = !$button.hasClass('active');

        // Update UI
        $button.toggleClass('active');
        $button.find('i').toggleClass('far fas');

        // Show feedback
        const tooltip = $button.find('.tooltip');
        tooltip.text(isActive ? 'Guardado en la lista de deseos' : 'Eliminado de la lista de deseos');
        tooltip.css('opacity', 1);

        setTimeout(() => {
            tooltip.css('opacity', 0);
        }, 2000);

        // Send AJAX request to update favorite status
        $.ajax({
            url: '/rooms/' + roomId + '/favorite',
            method: 'POST',
            data: {
                favorite: isActive,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log('Favorite updated:', response);
            },
            error: function(xhr) {
                console.error('Error updating favorite:', xhr);
                // Revert UI change on error
                $button.toggleClass('active');
                $button.find('i').toggleClass('far fas');
                tooltip.text('Error al actualizar');
                tooltip.css('opacity', 1);
                setTimeout(() => {
                    tooltip.css('opacity', 0);
                }, 2000);
            }
        });
    });

    // Show all photos lightbox
    $('#show-all-photos').click(function() {
        $('[data-lightbox="property-gallery"]').first().trigger('click');
    });

    // Tooltip functionality
    $('.tooltip-trigger').hover(function() {
        const tooltip = $(this).find('.tooltip');
        tooltip.css({
            'opacity': 1,
            'top': -tooltip.outerHeight() - 10,
            'left': '50%',
            'transform': 'translateX(-50%)'
        });
    }, function() {
        $(this).find('.tooltip').css('opacity', 0);
    });

    // Floating action button
    $('#fab-reserve').click(function() {
        $('html, body').animate({
            scrollTop: $(".booking-widget").offset().top - 20
        }, 500);
    });

    // Show/hide FAB based on scroll position
    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            $('#fab-reserve').addClass('fade-in');
        } else {
            $('#fab-reserve').removeClass('fade-in');
        }
    });
});
</script>
@endpush
@endsection
