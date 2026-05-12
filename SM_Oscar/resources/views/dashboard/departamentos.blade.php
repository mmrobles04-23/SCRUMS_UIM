{{--
    Componente: Departamentos
    Descripción: Grid de áreas de investigación
    Variables: $settings (collection), $departamentosLista (collection de Departamento)
--}}

@php
$s = $settings ?? collect([]);
@endphp

<section id="uim-departamentos" class="py-5 bg-surface-uim">
    <div class="container py-5">
        <div class="text-center mb-5 pb-3">
            <span class="text-secondary-uim fw-bold tracking-widest small text-uppercase mb-3 d-block">{{ $s['dept_etiqueta'] ?? 'Estructura Académica' }}</span>
            <h2 class="font-headline display-6 text-primary-uim fw-bold mb-3">{{ $s['dept_titulo'] ?? 'Nuestros Departamentos' }}</h2>
            <p class="text-on-surface-variant mx-auto fs-5" style="max-width: 750px;">
                {{ $s['dept_descripcion'] ?? 'Contamos con áreas especializadas de investigación que impulsan el desarrollo de la UNAM.' }}
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse($departamentosLista ?? [] as $index => $depto)
                <div class="col-6 col-lg-3">
                    <div class="bg-surface-container-lowest p-3 p-md-4 rounded-4 border border-primary border-opacity-10 h-100 card-hover-premium d-flex flex-column group-arrow-hover position-relative overflow-hidden">
                        <!-- Línea decorativa lateral con color del departamento -->
                        <div class="position-absolute top-0 bottom-0 start-0" style="width: 4px; opacity: 0.9; background-color: {{ $depto->color ?? 'var(--unam-azul)' }};"></div>

                        <div class="d-flex align-items-center mb-3 ps-2">
                            <div class="bg-white shadow-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; color: {{ $depto->color ?? 'var(--unam-azul)' }};">
                                <i class="bi bi-building fs-5"></i>
                            </div>
                            <div class="text-primary-uim opacity-25 fw-bold fs-5 ms-auto font-headline">0{{ $index + 1 }}</div>
                        </div>

                        <div class="ps-2 flex-grow-1 d-flex flex-column">
                            <h3 class="font-headline fs-6 fw-bold text-primary-uim mb-2">{{ $depto->siglas }} - {{ $depto->nombre }}</h3>
                            <p class="small text-on-surface-variant mb-3 d-none d-sm-block">{{ \Illuminate\Support\Str::limit($depto->descripcion, 100) }}</p>

                            <a href="{{ route('departamento.show', ['siglas' => $depto->siglas]) }}" class="mt-auto text-decoration-none text-secondary-uim fw-bold small text-uppercase tracking-widest d-inline-flex align-items-center gap-1">
                                <span class="d-none d-sm-inline">Ver área</span> <i class="bi bi-arrow-right icon-transition"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-on-surface-variant">No hay departamentos registrados.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
<br>
