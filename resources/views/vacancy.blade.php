@extends('master')
@section('title')
{{ __('Smart Vacation by Vacancy Rewards') }}
@endsection
@section('content')
<div class="page_content_wrap" style="padding-top: 0 !important; padding-bottom: 0 !important;">
    <div class="content_wrap">
        <div class="content">
            <!-- Header Section -->
            <section class="elementor-section elementor-top-section elementor-section-stretched elementor-section-full_width elementor-section-height-default" style="padding: 20px 0;">
                <div class="container text-center">
                    <h1 class="display-4 mb-4">Smart Vacation by Vacancy Rewards</h1>
                    <p class="lead">¡Bienvenidos a la presentación Smart Vacations! Como Propietario de una Cabaña Compartida o Membresía Vitalicia, disfrute de experiencias de viaje únicas, personalizadas y sin complicaciones.</p>
                </div>
            </section>

            <!-- About Smart Vacations -->
            <section class="elementor-section elementor-top-section elementor-section-stretched elementor-section-full_width elementor-section-height-default" style="background-color: #f8f9fa; padding: 40px 0;">
                <div class="container">
                    <!-- Image Before Section -->
                    <div class="text-center mb-4">
                        <img src="{{ asset('WhatsApp Image 2024-01-25 at 9.50.14 AM (1).jpeg') }}" alt="About Smart Vacations" class="img-fluid " style="max-width: 100%; height: auto;">
                    </div>
                    <h2 class="text-center mb-4">Acerca de Smart Vacations by Vacancy Rewards</h2>
                    <p class="text-center lead">Smart Vacations es una agencia de viajes virtual que ofrece una amplia gama de servicios para hacer que tu experiencia de viaje sea inolvidable.</p>
                    <ul class="list-unstyled text-center mt-4">
                        <li>🌍 Encuentra hoteles de lujo con ofertas increíbles y paquetes exclusivos.</li>
                        <li>✈️ Planifica tu viaje desde la reserva de vuelos hasta actividades personalizadas.</li>
                        <li>🛎️ Disfruta de una experiencia de viaje sin complicaciones con servicios personalizados.</li>
                    </ul>
                </div>
            </section>

            <!-- Personalized Travel Experience -->
            <section class="elementor-section elementor-top-section elementor-section-stretched elementor-section-full_width elementor-section-height-default" style="padding: 40px 0;">
                <div class="container text-center">
                    <h2 class="mb-4">Experiencia de Viaje Personalizada y Sin Complicaciones</h2>
                    <p class="lead">Smart Vacations se encarga de cada detalle, asegurando que los Propietarios de Cabañas Compartidas disfruten al máximo.</p>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h4 class="mb-2">Opciones Personalizadas</h4>
                            <p>Elige el destino, hospedaje, actividades y presupuesto que más se adapten a ti.</p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-2">Servicio al Cliente</h4>
                            <p>Asistencia personalizada de expertos para que tu viaje sea perfecto.</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="mb-2">Tecnología de Punta</h4>
                        <p>Nuestra plataforma te permite reservar online con facilidad y seguridad.</p>
                    </div>
                </div>
            </section>

            <!-- Benefits Section -->
            <section class="elementor-section elementor-top-section elementor-section-stretched elementor-section-full_width elementor-section-height-default" style="background-color: #f8f9fa; padding: 40px 0;">
                <div class="container">
                    <!-- Image Before Section -->
                    <div class="text-center mb-4">
                        <img src="{{ asset('jkljllhkkhlk.jpg') }}" alt="Benefits of Shared Property" class="img-fluid " style="max-width: 100%; height: auto;">
                    </div>
                    <h2 class="text-center mb-4">Beneficios de tener una Propiedad Compartida de por Vida</h2>
                    <ul class="list-unstyled text-center mt-4">
                        <li>💰 <strong>Descuentos:</strong> Obtén descuentos en hoteles, vuelos y alquiler de autos.</li>
                        <li>🔑 <strong>Acceso Exclusivo:</strong> Disfruta de experiencias y destinos especiales para socios.</li>
                        <li>🎁 <strong>Semana Gratuita de Alojamiento:</strong> Una semana gratis al año para 6 personas en América, Europa o Asia (solo impuestos: $399 USD).</li>
                    </ul>
                </div>
            </section>

            <!-- Travel Packages -->
            <section class="elementor-section elementor-top-section elementor-section-stretched elementor-section-full_width elementor-section-height-default" style="padding: 40px 0;">
                <div class="container">
                    <h2 class="text-center mb-4">Paquetes de Viaje Completos</h2>
                    <div class="row text-center">
                        <div class="col-md-3">
                            <h4 class="mb-2">Hospedaje</h4>
                            <p>Hoteles de 5 estrellas con comodidades de lujo.</p>
                        </div>
                        <div class="col-md-3">
                            <h4 class="mb-2">Vuelos</h4>
                            <p>Vuelos directos o con escalas a tu destino ideal.</p>
                        </div>
                        <div class="col-md-3">
                            <h4 class="mb-2">Alquiler de Autos</h4>
                            <p>Explora tu destino con libertad y comodidad.</p>
                        </div>
                        <div class="col-md-3">
                            <h4 class="mb-2">Cruceros</h4>
                            <p>Viaja en cruceros hacia destinos inolvidables.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Destinations Section -->
            <section class="elementor-section elementor-top-section elementor-section-stretched elementor-section-full_width elementor-section-height-default" style="background-color: #f8f9fa; padding: 40px 0;">
                <div class="container">
                    <!-- Image Before Section -->
                    <div class="text-center mb-4">
                        <img src="{{ asset('zzzz.jpg') }}" alt="Exclusive Destinations" class="img-fluid " style="max-width: 100%; height: auto;">
                    </div>
                    <h2 class="text-center mb-4">Destinos y Actividades Exclusivas para Socios</h2>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h4 class="mb-2">Europa</h4>
                            <p>Visita ciudades como París y Venecia, llenas de romance y cultura.</p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="mb-2">Asia</h4>
                            <p>Explora templos y mercados en Japón y Tailandia.</p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="mb-2">América</h4>
                            <p>Recorre el Caribe, la selva amazónica o disfruta de la vida nocturna.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Conclusion Section -->
            <section class="elementor-section elementor-top-section elementor-section-stretched elementor-section-full_width elementor-section-height-default" style="padding: 40px 0;">
                <div class="container text-center">
                    <h2 class="mb-4">Conclusión y Siguientes Pasos</h2>
                    <p class="lead">Hazte Propietario de una Cabaña Compartida o adquiere una Membresía Vitalicia para disfrutar de Smart Vacations.</p>
                    <p>📍 Visítanos en nuestras oficinas de Cabañas La Joya Resort para más información.</p>
                    <p>📞 Contáctanos: <a href="https://wa.me/74000355">wa.me/74000355</a></p>
                    <p>✈️ Comienza a planificar tu próximo viaje hoy mismo.</p>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
