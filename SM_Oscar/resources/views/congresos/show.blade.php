@extends('layouts.app')

@section('title', $congreso->titulo.' — Congresos UIM')

@section('content')
    {{-- NOTA: una sola plantilla para todos los congresos; el contenido viene del modelo Congreso (ruta por slug). --}}
    <div class="container py-4 py-lg-5">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ \Illuminate\Support\Str::limit($congreso->titulo, 48) }}</li>
            </ol>
        </nav>

        <div class="card border-0 shadow uim-page-shell overflow-hidden">
            <div class="row g-0">
                <div class="col-lg-5">
                    <img src="{{ $congreso->urlPortada() }}" class="img-fluid w-100 h-100 object-fit-cover" style="min-height: 220px;" alt="Portada: {{ $congreso->titulo }}">
                </div>
                <div class="col-lg-7">
                    <div class="card-body p-4 p-lg-5">
                        <h1 class="h3 text-warning fw-bold mb-3">{{ $congreso->titulo }}</h1>

                        <ul class="list-unstyled small text-body-secondary mb-4">
                            @if($congreso->fecha_inicio)
                                <li class="mb-1"><i class="bi bi-calendar-event me-2 text-warning"></i>
                                    {{ $congreso->fecha_inicio->format('d/m/Y') }}
                                    @if($congreso->fecha_fin)
                                        — {{ $congreso->fecha_fin->format('d/m/Y') }}
                                    @endif
                                </li>
                            @endif
                            @if($congreso->sede)
                                <li class="mb-1"><i class="bi bi-geo-alt me-2 text-warning"></i>{{ $congreso->sede }}</li>
                            @endif
                        </ul>

                        <div class="d-flex flex-column flex-sm-row flex-wrap gap-2 mb-4">
                            @if($congreso->enlace_inscripcion)
                                <a href="{{ $congreso->enlace_inscripcion }}" class="btn btn-warning" target="_blank" rel="noopener noreferrer">
                                    Inscribirme al congreso
                                </a>
                            @endif
                            @if($congreso->enlace_programa)
                                <a href="{{ $congreso->enlace_programa }}" class="btn btn-outline-secondary" target="_blank" rel="noopener noreferrer">Programa / convocatoria</a>
                            @endif
                            @if($congreso->enlace_sitio_web)
                                <a href="{{ $congreso->enlace_sitio_web }}" class="btn btn-outline-secondary" target="_blank" rel="noopener noreferrer">Sitio del congreso</a>
                            @endif
                        </div>

                        @if($congreso->resumen)
                            <p class="lead fs-6 text-body mb-3">{{ $congreso->resumen }}</p>
                        @endif

                        @if($congreso->descripcion)
                            <div class="text-body small congreso-descripcion">
                                {!! nl2br(e($congreso->descripcion)) !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
