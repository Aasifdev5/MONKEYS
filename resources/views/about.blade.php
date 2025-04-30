@extends('master')
@section('title')
{{ __('Sobre nosotros') }}
@endsection
@section('content')
<div class="page_content_wrap" style="padding-top: 0 !important; padding-bottom: 0 !important;">
    <div class="content_wrap">
        <div class="content">
            <div class="container my-5">
                <!-- Title Section -->
                <section class="text-center">
                    <h1 class="display-4 fw-bold mb-4">NOSOTROS</h1>
                </section>

                <!-- Misión Section -->
                <section class="mb-5">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="h3 text-primary fw-semibold">MISIÓN</h2>
                            <p class="text-muted">
                                Proporcionar experiencias inolvidables de recreación y bienestar familiar a través de un parque acuático innovador y accesible, comprometido con la calidad, la seguridad y la sostenibilidad. En el parque acuático <strong>La Joya</strong>, buscamos ser un lugar donde la naturaleza, la diversión y la comunidad de miembros convergen, ofreciendo un espacio único que promueve la unión familiar, el descanso y el entretenimiento en un entorno natural lleno de atracciones.
                            </p>
                        </div>
                        <div class="col-md-6 text-center">
                            <img src="{{ asset('WhatsApp Image 2025-02-04 at 19.33.58.jpeg') }}" alt="Misión" class="img-fluid " style="max-height: 300px;">
                        </div>
                    </div>
                </section>

                <!-- Visión Section -->
                <section class="mb-5">
                    <div class="row align-items-center">
                        <div class="col-md-6 order-md-2">
                            <h2 class="h3 text-primary fw-semibold">VISIÓN</h2>
                            <p class="text-muted">
                                Ser el parque acuático líder en Santa Cruz, reconocido por su excelencia en servicio al cliente, innovación en atracciones y compromiso con el medio ambiente. Aspiramos a convertirnos en un destino turístico esencial, expandiendo nuestras instalaciones y experiencias para satisfacer las expectativas de nuestros miembros, invitados y visitantes y ser un pilar en el desarrollo turístico y económico de nuestra región.
                            </p>
                        </div>
                        <div class="col-md-6 order-md-1 text-center">
                            <img src="{{ asset('345.jpg') }}" alt="Visión" class="img-fluid " style="max-height: 300px;">
                        </div>
                    </div>
                </section>

                <!-- Valores Section -->
                <section class="mb-5">
                    <h2 class="h3 text-primary fw-semibold">VALORES QUE SOSTIENEN NUESTRA MISIÓN Y VISIÓN</h2>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Innovación:</strong> Siempre a la vanguardia en atracciones y servicios para superar las expectativas de nuestros miembros y clientes.
                        </li>
                        <li class="list-group-item">
                            <strong>Calidad:</strong> Ofrecer instalaciones seguras, limpias y de primer nivel, garantizando la mejor experiencia posible.
                        </li>
                        <li class="list-group-item">
                            <strong>Inclusión:</strong> Crear un espacio accesible y acogedor para personas de todas las edades y necesidades.
                        </li>
                        <li class="list-group-item">
                            <strong>Sostenibilidad:</strong> Fomentar prácticas responsables con el medio ambiente para preservar nuestro entorno natural.
                        </li>
                        <li class="list-group-item">
                            <strong>Compromiso:</strong> Trabajar con pasión y dedicación para construir relaciones duraderas con nuestros miembros, clientes y aliados estratégicos.
                        </li>
                        <li class="list-group-item">
                            <strong>Trabajo en Equipo:</strong> Promover una cultura de colaboración entre nuestros empleados, proveedores y miembros de nuestra comunidad.
                        </li>
                    </ul>
                </section>

                <!-- Estrategias Comerciales Section -->
                <section>
                    <h2 class="h3 text-primary fw-semibold">ESTRATEGIAS COMERCIALES</h2>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Fidelización:</strong> Ofrecer promociones exclusivas para miembros y beneficios adicionales para clientes frecuentes.
                        </li>
                        <li class="list-group-item">
                            <strong>Expansión de Experiencias:</strong> Incorporar nuevas atracciones y servicios en cada fase de desarrollo del parque.
                        </li>
                        <li class="list-group-item">
                            <strong>Marketing Estratégico:</strong> Diseñar campañas publicitarias dirigidas que resalten nuestros valores diferenciales como la calidad, accesibilidad y enfoque familiar.
                        </li>
                        <li class="list-group-item">
                            <strong>Alianzas Estratégicas:</strong> Crear sinergias con empresas locales, instituciones educativas y operadores turísticos.
                        </li>
                        <li class="list-group-item">
                            <strong>Atención Personalizada:</strong> Brindar un servicio al miembro o cliente excepcional que fomente la lealtad y la fidelización.
                        </li>
                        <li class="list-group-item">
                            <strong>Sostenibilidad Comercial:</strong> Mantener precios accesibles con opciones de financiamiento para que todos los miembros puedan disfrutar del parque.
                        </li>
                    </ul>
                </section>
            </div>
        </div><!-- </.content> -->
    </div><!-- </.content_wrap> -->
</div>
@endsection