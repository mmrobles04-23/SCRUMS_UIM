{{--
    Componente: Congresos
    Descripción: Lista dinámica de congresos activos
    Variables esperadas: $congresos (collection)
--}}

<section id="uim-congresos" class="py-5 bg-surface-uim">
    <div class="container py-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 gap-3">
            <div>
                <h2 class="font-headline display-6 text-primary-uim fw-bold mb-2">Congresos</h2>
                <p class="text-on-surface-variant fs-5">Encuentros académicos de la UIM; detalle e inscripción por
                    evento.</p>
            </div>
        </div>

        @php
            $listaCongresos = $congresos ?? collect([]);
        @endphp

        @forelse($listaCongresos as $congreso)
            <div class="card bg-surface-container-lowest border-0 shadow-sm rounded-4 mb-4 overflow-hidden card-hover-premium group-arrow-hover">
                <div class="row g-0 align-items-stretch">
                    <div class="col-md-4 col-lg-3">
                        <img src="{{ $congreso->urlPortada() }}" class="img-fluid w-100 h-100 object-fit-cover"
                            style="min-height: 200px;" alt="{{ $congreso->titulo }}">
                    </div>
                    <div class="col-md-8 col-lg-9">
                        <div class="card-body p-4 p-md-5 d-flex flex-column h-100">
                            <h3 class="font-headline fs-4 text-primary-uim fw-bold mb-3">{{ $congreso->titulo }}</h3>
                            <div class="d-flex flex-wrap gap-3 small text-outline-uim font-label mb-3">
                                @if($congreso->fecha_inicio)
                                    <span><i class="bi bi-calendar-event me-2 text-secondary-uim"></i>{{ $congreso->fecha_inicio->format('d/m/Y') }}
                                        @if($congreso->fecha_fin) — {{ $congreso->fecha_fin->format('d/m/Y') }}
                                        @endif</span>
                                @endif
                                @if($congreso->sede)
                                    <span><i class="bi bi-geo-alt me-2 text-secondary-uim"></i>{{ $congreso->sede }}</span>
                                @endif
                            </div>
                            @if($congreso->resumen)
                                <p class="text-on-surface-variant small mb-4">
                                    {{ \Illuminate\Support\Str::limit($congreso->resumen, 220) }}</p>
                            @endif
                            <div class="d-flex flex-column flex-sm-row flex-wrap gap-3 mt-auto">
                                <a href="{{ route('congresos.show', $congreso) }}"
                                    class="btn btn-outline-secondary btn-sm px-4 py-2 fw-bold rounded-pill">Ver
                                    congreso</a>
                                @if($congreso->enlace_inscripcion)
                                    <a href="{{ $congreso->enlace_inscripcion }}"
                                        class="btn btn-warning btn-sm px-4 py-2 fw-bold text-white rounded-pill d-flex align-items-center gap-2"
                                        style="background-color: var(--dorado); border-color: var(--dorado);"
                                        target="_blank" rel="noopener noreferrer">Inscribirme <i
                                            class="bi bi-arrow-right icon-transition"></i></a>
                                @else
                                    <button type="button"
                                        class="btn btn-warning btn-sm px-4 py-2 fw-bold text-white rounded-pill opacity-50"
                                        style="background-color: var(--dorado); border-color: var(--dorado);" disabled
                                        title="El administrador aún no ha configurado el enlace de inscripción">Inscribirme</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-surface-uim p-4 rounded-4 text-center border shadow-sm">
                <p class="text-on-surface-variant mb-0"><i class="bi bi-info-circle me-2 text-primary-uim"></i>No hay
                    congresos publicados por el momento.</p>
            </div>
        @endforelse
    </div>
</section>
<br>
