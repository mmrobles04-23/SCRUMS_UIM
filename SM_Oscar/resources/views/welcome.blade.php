@extends('layouts.app')

@section('title', 'Inicio — UIM FES Acatlán')

@push('styles')
    <style>
        .hero-section {
            height: 85vh;
            min-height: 650px;
        }
    </style>
@endpush

@section('content')
    {{--
        Referencia: menú Investigación del portal FES Acatlán (Propósito, Seminarios, Departamentos, FIGURAS).
        Guía para actualizar textos, imágenes y enlaces cuando la UNAM entregue material: docs/GUIA_CONTENIDO_UIM.md
        URLs centralizadas: config/uim.php + variables .env (prefijo UIM_).
    --}}

    <div class="font-body bg-surface-container-lowest" style="color: #141d23;">
        
        {{-- Hero: Carrusel principal --}}
        @include('dashboard.hero')
        
        {{-- Proposito: ¿Qué es la UIMA? --}}
        @include('dashboard.proposito')
        
        {{-- Departamentos: 7 áreas de investigación --}}
        @include('dashboard.departamentos')
        
        {{-- Congresos: Lista dinámica de congresos activos --}}
        @include('dashboard.congresos')
        
        {{-- Noticias: Últimas noticias y eventos --}}
        @include('dashboard.noticias')
        
    </div>

    {{-- Modal Emergente de Congreso --}}
    @if($congresos->count() > 0)
        @php $congresoModal = $congresos->first(); @endphp
        <div id="congresoModal" class="congreso-modal">
            <div class="congreso-modal-backdrop" onclick="cerrarModalCongreso()"></div>
            <div class="congreso-modal-content">
                <button class="congreso-modal-close" onclick="cerrarModalCongreso()" aria-label="Cerrar">
                    <i class="bi bi-x-lg"></i>
                </button>
                
                <div class="congreso-modal-header">
                    <span class="congreso-modal-badge">
                        <i class="bi bi-people-fill me-2"></i>Próximo Congreso
                    </span>
                </div>
                
                <div class="congreso-modal-body">
                    <div class="congreso-modal-image">
                        <img src="{{ $congresoModal->urlPortada() }}" alt="{{ $congresoModal->titulo }}">
                    </div>
                    <div class="congreso-modal-info">
                        <h2 class="congreso-modal-title">{{ $congresoModal->titulo }}</h2>
                        
                        @if($congresoModal->fecha_inicio)
                            <div class="congreso-modal-fecha">
                                <i class="bi bi-calendar-event"></i>
                                <span>
                                    {{ $congresoModal->fecha_inicio->format('d M Y') }}
                                    @if($congresoModal->fecha_fin)
                                        — {{ $congresoModal->fecha_fin->format('d M Y') }}
                                    @endif
                                </span>
                            </div>
                        @endif
                        
                        @if($congresoModal->sede)
                            <div class="congreso-modal-sede">
                                <i class="bi bi-geo-alt"></i>
                                <span>{{ $congresoModal->sede }}</span>
                            </div>
                        @endif
                        
                        @if($congresoModal->resumen)
                            <p class="congreso-modal-resumen">{{ Str::limit($congresoModal->resumen, 120) }}</p>
                        @endif
                    </div>
                </div>
                
                <div class="congreso-modal-footer">
                    <a href="{{ route('congresos.show', $congresoModal) }}" class="congreso-modal-btn">
                        Ver detalles <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    @if($congresoModal->enlace_inscripcion)
                        <a href="{{ $congresoModal->enlace_inscripcion }}" target="_blank" rel="noopener noreferrer" class="congreso-modal-btn congreso-modal-btn-primary">
                            <i class="bi bi-pencil-square me-2"></i>Inscribirme
                        </a>
                    @endif
                </div>
                
                <div class="congreso-modal-timer">
                    <div class="congreso-modal-progress"></div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modal = document.getElementById('congresoModal');

                // Mostrar modal con animación
                setTimeout(() => {
                    modal.classList.add('active');
                }, 500);
            });

            function cerrarModalCongreso() {
                const modal = document.getElementById('congresoModal');
                if (modal) {
                    modal.classList.remove('active');
                    setTimeout(() => {
                        modal.style.display = 'none';
                    }, 300);
                }
            }
        </script>
    @endif
@endsection