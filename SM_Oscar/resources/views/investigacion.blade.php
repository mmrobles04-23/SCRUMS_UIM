
@extends('layouts.app')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/investigacion.css'])
@endpush

@push('scripts')
    @vite(['resources/js/investigacion.js'])
@endpush

@section('content')
    <div class="investigacion-page">
        <div class="site-wrapper">
            <section class="seminarios-section">
                <div class="section-title">
                    <i class="fas fa-chalkboard"></i>
                    <span>SEMINARIOS DE INVESTIGACIÓN</span>
                </div>

                <div class="filter-toolbar">
                    <div class="filter-group">
                        <button class="filter-btn active" data-filter="todos"><i class="fas fa-layer-group"></i> Todos</button>
                        <button class="filter-btn" data-filter="anual"><i class="far fa-calendar-alt"></i> Anuales</button>
                        <button class="filter-btn" data-filter="permanente"><i class="fas fa-sync-alt"></i> Permanentes</button>
                        <button class="filter-btn" data-filter="especial"><i class="fas fa-star"></i> Otros</button>
                    </div>
                    <div class="search-wrapper">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInput" placeholder="Buscar seminario...">
                        <button id="searchBtn">Ir</button>
                    </div>
                </div>

                <div class="uim-info-line">
                    <i class="fas fa-chevron-circle-right"></i> Todos los seminarios activos
                </div>

                <div class="cards-grid" id="cardsContainer"></div>
            </section>
        </div>
    </div>
@endsection