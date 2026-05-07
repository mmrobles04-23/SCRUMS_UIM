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

<section id="uim-congresos" class="py-3 bg-surface-uim">
    <div class="container py-2">
        {{-- Badge superior --}}
        <div class="text-center mb-3">
            <span class="badge px-4 py-2 fs-6" style="background-color: {{ $urgente ? '#dc3545' : 'var(--unam-dorado, #b38c00)' }}; color: white;">
                <i class="bi bi-megaphone-fill me-2"></i>
                {{ $urgente ? '¡ÚLTIMOS DÍAS!' : 'PRÓXIMO CONGRESO' }}
            </span>
        </div>

        {{-- Tarjeta principal destacada --}}
        <div class="card border-0 shadow overflow-hidden" style="background: white; border-radius: 12px; max-width: 900px; margin: 0 auto;">
            <div class="row g-0">
                {{-- Imagen lateral --}}
                <div class="col-md-3 position-relative">
                    <img src="{{ $congreso->urlPortada() }}" 
                         class="w-100 h-100 object-fit-cover" 
                         style="min-height: 180px; max-height: 220px;" 
                         alt="{{ $congreso->titulo }}">
                    {{-- Overlay con countdown --}}
                    <div class="position-absolute bottom-0 start-0 end-0 p-2" 
                         style="background: linear-gradient(transparent, rgba(30,60,112,0.9));">
                        <div class="text-center text-white">
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <i class="bi bi-clock-history"></i>
                                <div class="bg-danger text-white rounded-2 px-2 py-1 fw-bold" 
                                     style="min-width: 35px; font-size: 0.9rem;">{{ $diasRestantes }}</div>
                                <small>día{{ $diasRestantes !== 1 ? 's' : '' }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Contenido --}}
                <div class="col-md-8">
                    <div class="card-body p-3 d-flex flex-column h-100">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            {{-- Encabezado con icono --}}
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge px-2 py-1" 
                                      style="background-color: var(--unam-azul, #1E3C70); color: white; font-size: 0.75rem;">
                                    <i class="bi bi-calendar-event me-1"></i>Congreso
                                </span>
                                @if($urgente)
                                    <span class="badge bg-danger px-2 py-1" style="font-size: 0.75rem;">
                                        <i class="bi bi-exclamation-triangle-fill me-1"></i>Urgente
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Título --}}
                        <h2 class="font-headline fs-4 fw-bold mb-2" style="color: var(--unam-azul, #1E3C70); line-height: 1.3;">
                            {{ $congreso->titulo }}
                        </h2>

                        {{-- Detalles en línea compactos --}}
                        <div class="d-flex flex-wrap gap-2 mb-2 small">
                            <span class="d-inline-flex align-items-center gap-1" style="color: var(--unam-azul, #1E3C70);">
                                <i class="bi bi-calendar3" style="color: var(--unam-dorado, #b38c00);"></i>
                                <span class="fw-bold">{{ $congreso->fecha_inicio?->format('d M') }} — {{ $congreso->fecha_fin?->format('d M Y') }}</span>
                            </span>
                            
                            @if($congreso->sede)
                            <span class="text-muted">|</span>
                            <span class="d-inline-flex align-items-center gap-1" style="color: var(--unam-azul, #1E3C70);">
                                <i class="bi bi-geo-alt-fill" style="color: var(--unam-dorado, #b38c00);"></i>
                                {{ $congreso->sede }}
                            </span>
                            @endif

                            @if($congreso->cupo)
                            <span class="text-muted">|</span>
                            <span class="d-inline-flex align-items-center gap-1" style="color: var(--unam-azul, #1E3C70);">
                                <i class="bi bi-people-fill" style="color: var(--fesa-verde, #0b791d);"></i>
                                {{ $congreso->cupo }} cupo
                            </span>
                            @endif
                        </div>

                        {{-- Resumen corto --}}
                        @if($congreso->resumen)
                            <p class="mb-2" style="color: #495057; font-size: 0.9rem; line-height: 1.4;">
                                {{ \Illuminate\Support\Str::limit($congreso->resumen, 120) }}
                            </p>
                        @endif

                        {{-- Barra de progreso compacta --}}
                        <div class="mb-2">
                            <div class="progress" style="height: 4px; background-color: #e9ecef;">
                                <div class="progress-bar {{ $urgente ? 'bg-danger' : '' }}" 
                                     role="progressbar" 
                                     style="width: {{ min(100, max(0, (30 - $diasRestantes) / 30 * 100)) }}%; {{ !$urgente ? 'background-color: var(--unam-azul, #1E3C70);' : '' }}"
                                     aria-valuenow="{{ min(100, max(0, (30 - $diasRestantes) / 30 * 100)) }}" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <small class="fw-bold" style="color: var(--unam-azul, #1E3C70); font-size: 0.75rem;">Inscripciones abiertas</small>
                                <small class="text-danger fw-bold" style="font-size: 0.75rem;">Cierra pronto</small>
                            </div>
                        </div>

                        {{-- Botones de acción --}}
                        <div class="d-flex flex-wrap gap-2 mt-auto">
                            <a href="{{ route('congresos.show', $congreso) }}"
                               class="btn px-3 py-1 fw-bold d-flex align-items-center gap-1"
                               style="background-color: var(--unam-azul, #1E3C70); color: white; border-radius: 20px; font-size: 0.85rem;">
                                <i class="bi bi-info-circle-fill"></i>
                                Ver detalles
                            </a>
                            
                            @if($congreso->enlace_inscripcion)
                                <a href="{{ $congreso->enlace_inscripcion }}"
                                   class="btn px-3 py-1 fw-bold text-white d-flex align-items-center gap-1"
                                   style="background-color: var(--unam-dorado, #b38c00); border-radius: 20px; font-size: 0.85rem;"
                                   target="_blank" rel="noopener noreferrer">
                                    <i class="bi bi-pencil-square"></i>
                                    ¡Inscríbete!
                                </a>
                            @else
                                <button type="button"
                                        class="btn px-3 py-1 fw-bold text-white opacity-75"
                                        style="background-color: var(--unam-dorado, #b38c00); border-radius: 20px; font-size: 0.85rem;"
                                        disabled>
                                    <i class="bi bi-clock"></i>
                                    Próximamente
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Link a ver todos --}}
        <div class="text-center mt-2">
            <a href="{{ route('congresos.index') }}" 
               class="text-primary-uim text-decoration-none d-inline-flex align-items-center gap-1 fw-bold hover-opacity"
               style="font-size: 0.9rem;">
                Ver todos los congresos 
                <i class="bi bi-arrow-right-circle"></i>
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
