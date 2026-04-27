@extends('layouts.app')

@section('title', $congreso->titulo.' — Congresos UIM')

@push('styles')
    @vite(['resources/css/congresos.css'])
@endpush

@section('content')
    <div class="congresos-wrapper">
        <section class="congresos-section">
            {{-- Breadcrumb --}}
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb small mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('congresos.index') }}">Congresos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($congreso->titulo, 40) }}</li>
                </ol>
            </nav>

            {{-- Tarjeta principal --}}
            <div class="card border-0 shadow overflow-hidden" style="border-radius: 20px;">
                <div class="row g-0">
                    {{-- Imagen --}}
                    <div class="col-lg-5">
                        <div class="position-relative h-100" style="min-height: 300px;">
                            <img src="{{ $congreso->urlPortada() }}" 
                                 class="img-fluid w-100 h-100 object-fit-cover" 
                                 alt="Portada: {{ $congreso->titulo }}">
                            @if($congreso->fecha_inicio && $congreso->fecha_inicio->isFuture())
                                <span class="congreso-badge proximo" style="position: absolute; top: 1rem; left: 1rem;">Próximo</span>
                            @elseif($congreso->fecha_inicio && $congreso->fecha_inicio->isToday())
                                <span class="congreso-badge hoy" style="position: absolute; top: 1rem; left: 1rem;">Hoy</span>
                            @endif
                        </div>
                    </div>

                    {{-- Contenido --}}
                    <div class="col-lg-7">
                        <div class="card-body p-4 p-lg-5">
                            {{-- Título --}}
                            <h1 class="congreso-title" style="font-size: 1.75rem; margin-bottom: 1.25rem;">
                                {{ $congreso->titulo }}
                            </h1>

                            {{-- Info --}}
                            <ul class="list-unstyled mb-4">
                                @if($congreso->fecha_inicio)
                                    <li class="mb-2 d-flex align-items-center gap-2">
                                        <i class="bi bi-calendar-event" style="color: var(--unam-dorado, #b38c00);"></i>
                                        <span style="color: var(--unam-azul, #1E3C70); font-weight: 600;">
                                            {{ $congreso->fecha_inicio->format('d M Y') }}
                                            @if($congreso->fecha_fin)
                                                — {{ $congreso->fecha_fin->format('d M Y') }}
                                            @endif
                                        </span>
                                    </li>
                                @endif
                                @if($congreso->sede)
                                    <li class="mb-2 d-flex align-items-center gap-2">
                                        <i class="bi bi-geo-alt" style="color: var(--unam-dorado, #b38c00);"></i>
                                        <span style="color: #6a6a6a;">{{ $congreso->sede }}</span>
                                    </li>
                                @endif
                            </ul>

                            {{-- Botones de acción --}}
                            <div class="d-flex flex-column flex-sm-row flex-wrap gap-2 mb-4">
                                @if($congreso->enlace_inscripcion)
                                    <a href="{{ $congreso->enlace_inscripcion }}" 
                                       class="btn" 
                                       style="background: var(--unam-dorado, #b38c00); color: #ffffff; font-weight: 600; border-radius: 8px; padding: 0.6rem 1.5rem;"
                                       target="_blank" 
                                       rel="noopener noreferrer">
                                        <i class="bi bi-pencil-square me-2"></i>Inscribirme al congreso
                                    </a>
                                @endif
                                @if($congreso->enlace_programa)
                                    <a href="{{ $congreso->enlace_programa }}" 
                                       class="btn btn-outline-secondary"
                                       style="border-radius: 8px; padding: 0.6rem 1.5rem;"
                                       target="_blank" 
                                       rel="noopener noreferrer">
                                        <i class="bi bi-file-text me-2"></i>Programa / convocatoria
                                    </a>
                                @endif
                                @if($congreso->enlace_sitio_web)
                                    <a href="{{ $congreso->enlace_sitio_web }}" 
                                       class="btn btn-outline-secondary"
                                       style="border-radius: 8px; padding: 0.6rem 1.5rem;"
                                       target="_blank" 
                                       rel="noopener noreferrer">
                                        <i class="bi bi-globe me-2"></i>Sitio del congreso
                                    </a>
                                @endif
                            </div>

                            {{-- Resumen --}}
                            @if($congreso->resumen)
                                <div class="mb-4 p-3" style="background: #f8f9fa; border-radius: 12px; border-left: 4px solid var(--unam-dorado, #b38c00);">
                                    <p class="mb-0" style="color: #222222; font-size: 1rem; line-height: 1.6;">{{ $congreso->resumen }}</p>
                                </div>
                            @endif

                            {{-- Descripción completa --}}
                            @if($congreso->descripcion)
                                <div class="congreso-descripcion" style="color: #222222; line-height: 1.8;">
                                    {!! nl2br(e($congreso->descripcion)) !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Botón volver --}}
            <div class="mt-4 text-center">
                <a href="{{ route('congresos.index') }}" class="congreso-link" style="display: inline-flex;">
                    <i class="bi bi-arrow-left me-2"></i> Volver a congresos
                </a>
            </div>
        </section>
    </div>
@endsection
