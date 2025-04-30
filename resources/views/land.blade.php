@extends('master')

@section('title')
    {{ __('Venta de Terrenos') }}
@endsection

@section('content')
<div class="page_content_wrap" style="padding-top: 0 !important; padding-bottom: 0 !important;">
    <div class="content_wrap">
        <div class="container py-5">
            <div class="text-center mb-4">
                <h1 class="fw-bold">Venta de Terrenos</h1>
                
                <p class="lead">Terrenos de 348 m² para quienes desean vivir o invertir en nuestro <strong>Resort</strong>.</p>
            </div>

            <div class="row justify-content-center">
    <!-- Imagen 1 -->
    <div class="col-md-4">
        <div class="card shadow-lg">
            <img src="{{ asset('Vista Junior 27-01-25 (1).jpg') }}" class="card-img-top" alt="Plano de construcción 1">
            <div class="card-body text-center">
                <h5 class="card-title">Plano de Construcción 1</h5>
            </div>
        </div>
    </div>

    <!-- Imagen 2 -->
    <div class="col-md-4">
        <div class="card shadow-lg">
            <img src="{{ asset('IMG-20230524-WA0004.jpg') }}" class="card-img-top" alt="Plano de construcción 2">
            <div class="card-body text-center">
                <h5 class="card-title">Plano de Construcción 2</h5>
            </div>
        </div>
    </div>

    <!-- Imagen 3 -->
    <div class="col-md-4">
        <div class="card shadow-lg">
            <img src="{{ asset('IMG-20230604-WA0007 (1).jpg') }}" class="card-img-top" alt="Plano de construcción 3">
            <div class="card-body text-center">
                <h5 class="card-title">Plano de Construcción 3</h5>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-lg">
            <img src="{{ asset('IMG-20230604-WA0007.jpg') }}" class="card-img-top" alt="Plano de construcción 3">
            <div class="card-body text-center">
                
            </div>
        </div>
    </div>
</div>


           
        </div>
    </div>
</div>
@endsection
