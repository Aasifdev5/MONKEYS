@extends('master')
@section('title')
{{ __(' SEGUNDA FASE') }}
@endsection
@section('content')
<div class="page_content_wrap" style="padding-top: 0 !important; padding-bottom: 0 !important;">
    <div class="content_wrap">
        <h2>SEGUNDA FASE</h2>
        
        <div class="fase_images">
            <div class="fase_item">
                <img src="{{asset('WhatsApp Image 2025-02-11 at 14.41.38.jpeg')}}" alt="Voleibol Playa">
                <p>Voleibol Playa</p>
            </div>
            <div class="fase_item">
                <img src="{{asset('WhatsApp Image 2025-02-11 at 14.42.01.jpeg')}}" alt="Tirolesa Acuática">
                <p>Tirolesa Acuática</p>
            </div>
            <div class="fase_item">
                <img src="{{asset('WhatsApp Image 2025-02-11 at 14.42.32.jpeg')}}" alt="Río Lento">
                <p>Río Lento</p>
            </div>
            <div class="fase_item">
                <img src="{{asset('WhatsApp Image 2025-02-11 at 14.42.58.jpeg')}}" alt="Playa Artificial">
                <p>Playa Artificial</p>
            </div>
        </div>
    </div>
</div>
@endsection