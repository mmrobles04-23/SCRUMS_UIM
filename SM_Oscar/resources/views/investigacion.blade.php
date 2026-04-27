@extends('layouts.app')

@section('title', 'Investigación — UIM FES Acatlán')

@push('styles')
    @vite(['resources/css/investigacion.css'])
@endpush

@push('scripts')
    @vite(['resources/js/investigacion.js'])
@endpush

@section('content')
    {{-- NOTA: Vista homologada con el sistema de diseño UIMA usando variables CSS y Bootstrap Icons --}}
    <div class="font-body bg-surface-container-lowest py-5">
        <div class="container-fluid">
            
            {{-- Título de sección --}}
            <div class="text-center mb-5">
                <span class="text-secondary-uim fw-bold tracking-widest small text-uppercase mb-3 d-block">Formación Académica</span>
                <h1 class="font-headline display-6 text-primary-uim fw-bold mb-3">
                    <i class="bi bi-journal-text me-3"></i>Seminarios de Investigación
                </h1>
                <p class="text-on-surface-variant mx-auto fs-5 d-none d-md-block" style="max-width: 700px;">
                    Espacios de diálogo y aprendizaje para fortalecer la investigación multidisciplinaria en la FES Acatlán.
                </p>
            </div>

            {{-- Toolbar de filtros - Versión móvil: sticky con menú hamburguesa --}}
            <div class="filter-toolbar" id="filterToolbar">
                {{-- Vista desktop: filtros en línea --}}
                <div class="filter-group d-none d-md-flex">
                    <button class="filter-btn active" data-filter="todos">
                        <i class="bi bi-layers me-2"></i>Todos
                    </button>
                    <button class="filter-btn" data-filter="anual">
                        <i class="bi bi-calendar-event me-2"></i>Anuales
                    </button>
                    <button class="filter-btn" data-filter="permanente">
                        <i class="bi bi-arrow-repeat me-2"></i>Permanentes
                    </button>
                    <button class="filter-btn" data-filter="especial">
                        <i class="bi bi-star me-2"></i>Especiales
                    </button>
                </div>
                
                {{-- Vista móvil: botón hamburguesa + dropdown --}}
                <div class="d-md-none position-relative">
                    <button class="filter-menu-toggle" id="filterMenuToggle" aria-label="Filtrar seminarios">
                        <i class="bi bi-funnel"></i>
                        <span class="filter-active-label">Todos</span>
                    </button>
                    <div class="filter-dropdown" id="filterDropdown">
                        <button class="filter-dropdown-item active" data-filter="todos">
                            <i class="bi bi-layers"></i>Todos
                        </button>
                        <button class="filter-dropdown-item" data-filter="anual">
                            <i class="bi bi-calendar-event"></i>Anuales
                        </button>
                        <button class="filter-dropdown-item" data-filter="permanente">
                            <i class="bi bi-arrow-repeat"></i>Permanentes
                        </button>
                        <button class="filter-dropdown-item" data-filter="especial">
                            <i class="bi bi-star"></i>Especiales
                        </button>
                    </div>
                </div>
                
                <div class="search-wrapper">
                    <i class="bi bi-search"></i>
                    <input type="text" id="searchInput" placeholder="Buscar seminario...">
                    <button id="searchBtn" class="d-none d-sm-block">Buscar</button>
                </div>
            </div>

            {{-- Indicador de seminarios --}}
            <div class="d-flex align-items-center gap-2 mb-4 text-primary-uim fw-semibold">
                <i class="bi bi-chevron-right-circle-fill text-secondary-uim"></i>
                <span>Todos los seminarios activos</span>
            </div>

            {{-- Grid de cards --}}
            <div class="cards-grid" id="cardsContainer"></div>
            
        </div>
    </div>

    {{-- Modal de Inscripción --}}
    <div class="modal-overlay" id="inscripcionModal">
        <div class="modal-content" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
            <div class="modal-header">
                <h2 id="modalTitle">
                    <i class="bi bi-pencil-square me-2"></i>Inscripción al Seminario
                </h2>
                <button class="modal-close" id="modalClose" aria-label="Cerrar">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <form id="formInscripcion" class="modal-form" novalidate>
                <div class="form-group">
                    <label for="inputNombre">Nombre completo</label>
                    <input type="text" id="inputNombre" placeholder="Tu nombre completo" required>
                </div>
                <div class="form-group">
                    <label for="inputCorreo">Correo electrónico</label>
                    <input type="email" id="inputCorreo" placeholder="tu@correo.com" required>
                </div>
                <div class="form-group">
                    <label for="modalSeminario">Seminario</label>
                    <select id="modalSeminario" required></select>
                </div>
                <div class="form-group">
                    <label for="inputMotivo">Motivo de inscripción</label>
                    <textarea id="inputMotivo" rows="4" placeholder="¿Por qué deseas inscribirte a este seminario?" required></textarea>
                </div>
                <button type="submit" class="btn-submit">
                    <i class="bi bi-send me-2"></i>Enviar inscripción
                </button>
            </form>
        </div>
    </div>

    {{-- Modal de Detalles del Seminario (para "Ver más") --}}
    <div class="modal-overlay" id="detailModal">
        <div class="modal-content modal-content-detail" role="dialog" aria-modal="true" aria-labelledby="detailModalTitle">
            <div class="modal-header">
                <h2 id="detailModalTitle">
                    <i class="bi bi-info-circle me-2"></i>Detalles del Seminario
                </h2>
                <button class="modal-close" id="detailModalClose" aria-label="Cerrar">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="modal-body-detail" id="detailModalBody">
                {{-- Contenido dinámico --}}
            </div>
            <div class="modal-footer-detail">
                <button class="btn-submit" id="btnInscribirFromDetail">
                    <i class="bi bi-pencil me-2"></i>Inscribirme ahora
                </button>
            </div>
        </div>
    </div>
@endsection