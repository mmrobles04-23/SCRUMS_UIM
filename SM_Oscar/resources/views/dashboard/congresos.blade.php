{{--
    Componente: Congreso Destacado
    Descripción: Muestra el congreso más próximo a vencer con diseño llamativo
    Variables esperadas: $congresoDestacado (model), $settings (collection)
--}}

@php
$s = $settings ?? collect([]);
$congreso = $congresoDestacado ?? null;
@endphp

@if($congreso)
@php
    $diasRestantes = now()->diffInDays($congreso->fecha_fin, false);
    $diasRestantes = max(0, (int) $diasRestantes);
    $urgente = $diasRestantes <= 7;
@endphp

<section id="uim-congresos" class="py-5 bg-surface-uim">
    <div class="container py-4">
        {{-- Badge superior --}}
        <div class="text-center mb-4">
            <span class="badge px-4 py-2 fs-6" style="background-color: {{ $urgente ? '#dc3545' : 'var(--unam-dorado, #b38c00)' }}; color: white;">
                <i class="bi bi-megaphone-fill me-2"></i>
                {{ $urgente ? '¡ÚLTIMOS DÍAS!' : 'PRÓXIMO CONGRESO' }}
            </span>
        </div>

        {{-- Tarjeta principal destacada --}}
        <div class="card border-0 shadow-lg overflow-hidden" style="background: white; border-radius: 20px;">
            <div class="row g-0">
                {{-- Imagen lateral --}}
                <div class="col-lg-5 position-relative">
                    <img src="{{ $congreso->urlPortada() }}" 
                         class="w-100 h-100 object-fit-cover" 
                         style="min-height: 350px;" 
                         alt="{{ $congreso->titulo }}">
                    {{-- Overlay con countdown --}}
                    <div class="position-absolute bottom-0 start-0 end-0 p-4" 
                         style="background: linear-gradient(transparent, rgba(30,60,112,0.9));">
                        <div class="text-center text-white">
                            <p class="mb-2 fs-5 fw-bold">
                                <i class="bi bi-clock-history me-2"></i>Quedan
                            </p>
                            <div class="d-flex justify-content-center gap-3">
                                <div class="text-center">
                                    <div class="bg-white text-dark rounded-3 px-3 py-2 fw-bold fs-4" 
                                         style="min-width: 60px;">{{ $diasRestantes }}</div>
                                    <small class="text-white">día{{ $diasRestantes !== 1 ? 's' : '' }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Contenido --}}
                <div class="col-lg-7">
                    <div class="card-body p-5 d-flex flex-column h-100">
                        {{-- Encabezado con icono --}}
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <span class="badge px-3 py-2" 
                                  style="background-color: var(--unam-azul, #1E3C70); color: white;">
                                <i class="bi bi-calendar-event me-1"></i>Congreso
                            </span>
                            @if($urgente)
                                <span class="badge bg-danger px-3 py-2">
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i>Urgente
                                </span>
                            @endif
                        </div>

                        {{-- Título --}}
                        <h2 class="font-headline display-5 fw-bold mb-4" style="color: var(--unam-azul, #1E3C70);">
                            {{ $congreso->titulo }}
                        </h2>

                        {{-- Detalles --}}
                        <div class="d-flex flex-wrap gap-4 mb-4">
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                     style="width: 40px; height: 40px; background-color: var(--unam-azul, #1E3C70);">
                                    <i class="bi bi-calendar3 text-white"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Fechas</small>
                                    <span class="fw-bold" style="color: var(--unam-azul, #1E3C70);">
                                        {{ $congreso->fecha_inicio?->format('d M') }} — {{ $congreso->fecha_fin?->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                            
                            @if($congreso->sede)
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                     style="width: 40px; height: 40px; background-color: var(--unam-dorado, #b38c00);">
                                    <i class="bi bi-geo-alt-fill text-white"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Sede</small>
                                    <span class="fw-bold" style="color: var(--unam-azul, #1E3C70);">{{ $congreso->sede }}</span>
                                </div>
                            </div>
                            @endif

                            @if($congreso->cupo)
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                     style="width: 40px; height: 40px; background-color: var(--fesa-verde, #0b791d);">
                                    <i class="bi bi-people-fill text-white"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Cupo</small>
                                    <span class="fw-bold" style="color: var(--unam-azul, #1E3C70);">{{ $congreso->cupo }} personas</span>
                                </div>
                            </div>
                            @endif
                        </div>

                        {{-- Resumen --}}
                        @if($congreso->resumen)
                            <p class="fs-5 mb-4" style="color: #495057; line-height: 1.6;">
                                {{ $congreso->resumen }}
                            </p>
                        @endif

                        {{-- Barra de progreso --}}
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <small class="fw-bold" style="color: var(--unam-azul, #1E3C70);">Progreso de inscripción</small>
                                <small class="text-danger fw-bold">Cierra pronto</small>
                            </div>
                            <div class="progress" style="height: 10px; background-color: #e9ecef;">
                                <div class="progress-bar {{ $urgente ? 'bg-danger' : '' }}" 
                                     role="progressbar" 
                                     style="width: {{ min(100, max(0, (30 - $diasRestantes) / 30 * 100)) }}%; {{ !$urgente ? 'background-color: var(--unam-azul, #1E3C70);' : '' }}"
                                     aria-valuenow="{{ min(100, max(0, (30 - $diasRestantes) / 30 * 100)) }}" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                </div>
                            </div>
                        </div>

                        {{-- Botones de acción --}}
                        <div class="d-flex flex-wrap gap-3 mt-auto">
                            <a href="{{ route('congresos.show', $congreso) }}"
                               class="btn btn-lg px-5 py-3 fw-bold d-flex align-items-center gap-2"
                               style="background-color: var(--unam-azul, #1E3C70); color: white; border-radius: 50px;">
                                <i class="bi bi-info-circle-fill"></i>
                                Ver detalles completos
                            </a>
                            
                            @if($congreso->enlace_inscripcion)
                                <a href="{{ $congreso->enlace_inscripcion }}"
                                   class="btn btn-lg px-5 py-3 fw-bold text-white d-flex align-items-center gap-2"
                                   style="background-color: var(--unam-dorado, #b38c00); border-radius: 50px;"
                                   target="_blank" rel="noopener noreferrer">
                                    <i class="bi bi-pencil-square"></i>
                                    ¡Inscríbete ahora!
                                </a>
                            @else
                                <button type="button"
                                        class="btn btn-lg px-5 py-3 fw-bold text-white opacity-75"
                                        style="background-color: var(--unam-dorado, #b38c00); border-radius: 50px;"
                                        disabled>
                                    <i class="bi bi-clock"></i>
                                    Inscripciones próximamente
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Link a ver todos --}}
        <div class="text-center mt-4">
            <a href="{{ route('congresos.index') }}" 
               class="text-primary-uim text-decoration-none d-inline-flex align-items-center gap-2 fw-bold fs-5 hover-opacity">
                Ver todos los congresos 
                <i class="bi bi-arrow-right-circle fs-4"></i>
            </a>
        </div>
    </div>
</section>

<style>
.hover-opacity:hover {
    opacity: 0.8;
}
</style>
@endif
