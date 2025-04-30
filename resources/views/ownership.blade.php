@extends('master')
@section('title')
    {{ __('Propiedad Compartida en Cabañas') }}
@endsection
@section('content')
<style>
    .uniform-img {
        width: 100%; /* Full width */
        height: auto; /* Auto height to maintain aspect ratio */
        object-fit: cover; /* Prevents distortion */
        border-radius: 10px;
    }

    /* Responsive adjustments for smaller screens */
    @media (max-width: 768px) {
        .uniform-img {
            height: 350px; /* Reduced height for tablets */
        }
    }

    @media (max-width: 576px) {
        .uniform-img {
            height: 250px; /* Further reduced height for mobile devices */
        }
    }
</style>
<div class="page_content_wrap" style="padding-top: 0 !important; padding-bottom: 0 !important;">
    <div class="content_wrap">
        <div class="content">
            <!-- Header Section -->
            <section class="text-center py-4">
                <div class="container">
                    <h1 class="display-4 mb-4">CABAÑAS IMAGEN GENERAL</h1>
                    <img src="{{ asset('General.jpg') }}" alt="Cabañas" class="img-fluid uniform-img shadow mb-4">
                </div>
            </section>
            <!-- Tipología de Cabañas -->
            <section class="bg-light py-5">
                <div class="container">
                    <h2 class="text-center mb-4">CABAÑA JUNIOR “Especialmente para parejas”</h2>
                    <div class="row g-4 justify-content-center text-center">
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('Junior.jpg') }}" class="img-fluid uniform-img shadow">
                        </div><br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('Junior - Sala B.JPG') }}" class="img-fluid uniform-img shadow">
                        </div><br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('Junior - Sala A.JPG') }}" class="img-fluid uniform-img shadow">
                        </div><br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('Junior - Dormitorio.JPG') }}" class="img-fluid uniform-img shadow">
                        </div><br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('Junior - Baño.JPG') }}" class="img-fluid uniform-img shadow">
                        </div><br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('JUNIOR 2.jpg') }}" class="img-fluid uniform-img shadow">
                        </div><br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('JUNIOR 1.jpg') }}" class="img-fluid uniform-img shadow">
                        </div><br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('Screenshot (310).png') }}" class="img-fluid uniform-img shadow">
                        </div>
                    </div>
                    <h3 class="text-center mt-4">CARACTERISTICAS DE CABAÑA JUNIOR </h3>
                    <ul class="list-group list-group-flush shadow-sm">
                        <li class="list-group-item">45 m2</li>
                        <li class="list-group-item">Sala de Estar</li>
                        <li class="list-group-item">Baño</li>
                        <li class="list-group-item">1 dormitorio con vestidor </li>
                        <li class="list-group-item">Minibar</li>
                        <li class="list-group-item">Jacuzzi</li>
                    </ul>
                </div>
            </section>
            <!-- Cabaña Royal Suite -->
            <section class="py-5">
                <div class="container">
                    <h2 class="text-center mb-4">CABAÑA ROYAL SUITE PARA FAMILIAS DE 4 PERSONAS</h2>
                    <div class="row g-4 text-center">
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('Fachada Royal.jpg') }}" class="img-fluid uniform-img shadow">
                        </div><br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('Royal 1.jpg') }}" class="img-fluid uniform-img shadow">
                        </div><br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('Royal 2.jpg') }}" class="img-fluid uniform-img shadow">
                        </div><br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('Royal - Area Social.JPG') }}" class="img-fluid uniform-img shadow">
                        </div><br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('Royal - Cocina.JPG') }}" class="img-fluid uniform-img shadow">
                        </div><br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('Royal - Dormitorio.JPG') }}" class="img-fluid uniform-img shadow">
                        </div><br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('Royal - Sala Comedor.JPG') }}" class="img-fluid uniform-img shadow">
                        </div><br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('Royal - Sala.JPG') }}" class="img-fluid uniform-img shadow">
                        </div>
                    </div>
                    <h3 class="text-center mt-4">CARACTERISTICAS DE CABAÑA ROYAL</h3>
                    <ul class="list-group list-group-flush shadow-sm">
                        <li class="list-group-item">4 Personas</li>
                        <li class="list-group-item">65 m²</li>
                        <li class="list-group-item">Sala - Comedor</li>
                        <li class="list-group-item">Cocina estilo americano</li>
                        <li class="list-group-item">Habitación tipo suite con cama King</li>
                        <li class="list-group-item">Jacuzzi</li>
                        <li class="list-group-item">Churrasqueras</li>
                    </ul>
                </div>
            </section>
            <!-- Cabaña Presidencial -->
            <section class="bg-light py-5">
                <div class="container">
                    <h2 class="text-center mb-4">CABAÑA PRESIDENCIAL PARA FAMILIAS NUMEROSAS DE 6 PERSONAS</h2>

                    <div class="row g-4 justify-content-center text-center">
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('6 Presidencial - Área Social .JPG') }}" class="img-fluid uniform-img shadow">
                        </div>
                        <br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('5 Presidencial - Dormitorio Hijos.JPG') }}" class="img-fluid uniform-img shadow">
                        </div><br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('4 Presidencial - Dormitorio Principal .JPG') }}" class="img-fluid uniform-img shadow">
                        </div><br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('3 Presidencial - Cocina.JPG') }}" class="img-fluid uniform-img shadow">
                        </div><br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('2 Presidencial - Sala TV.JPG') }}" class="img-fluid uniform-img shadow">
                        </div>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('1 Presidencial - Sala.JPG') }}" class="img-fluid uniform-img shadow">
                        </div><br>

                        <div class="col-md-6 col-12">
                            <img src="{{ asset('Screenshot (311).png') }}" class="img-fluid uniform-img shadow">
                        </div>
                    </div>
                    <h3 class="text-center mt-4">CARACTERISTICAS DE CABAÑA PRESIDENCIAL</h3>
                    <ul class="list-group list-group-flush shadow-sm">
                        <li class="list-group-item">85 m²</li>
                        <li class="list-group-item">Sala Comedor</li>
                        <li class="list-group-item">Cocina estilo americana</li>

                        <li class="list-group-item">Habitación con Walking Closet y baño privado</li>
                        <li class="list-group-item">Baño de visitas</li>
                        <li class="list-group-item">Churrasqueras</li>
                        <li class="list-group-item">Jacuzzi tipo piscina</li>
                    </ul>
                </div>
            </section>
            <!-- Flexibility Section -->
            <section class="py-5">
                <div class="container text-center">
                    <h2 class="mb-4">Flexibilidad</h2>
                    <p class="lead">Elija sus 7 días en temporada alta y 7 días en temporada baja para adaptar su estancia a sus necesidades.</p>
                </div>
            </section>
            <!-- Club Access Section -->
            <section class="bg-light py-5">
                <div class="container">
                    <h2 class="text-center mb-4">Acceso Ilimitado al Club</h2>
                    <div class="row g-4 text-center">
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('werrt.jpg') }}" class="img-fluid uniform-img shadow">
                            <h4 class="mt-2">Parque Acuático</h4>
                            <p>Disfrute de emocionantes piscinas y áreas de recreación acuática.</p>
                        </div><br>
                        <div class="col-md-6 col-12">
                            <img src="{{ asset('WhatsApp Image 2025-02-04 at 19.33.58.jpeg') }}" class="img-fluid uniform-img shadow">
                            <h4 class="mt-2">Instalaciones</h4>
                            <p>Acceso a canchas deportivas, fútbol sala, toboganes acuáticos, áreas de juego para niños, y mucho más.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- All Year Section -->
            <section class="py-5">
                <div class="container text-center">
                    <h2 class="mb-4">Todo el Año</h2>
                    <p class="lead">Disfrute de nuestras instalaciones durante todo el año, sin restricciones.</p>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
