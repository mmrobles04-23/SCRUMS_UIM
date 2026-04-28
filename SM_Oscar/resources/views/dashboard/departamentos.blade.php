{{--
    Componente: Departamentos
    Descripción: Grid de 7 áreas de investigación
--}}

<section id="uim-departamentos" class="py-5 bg-surface-uim">
    <div class="container py-5">
        <div class="text-center mb-5 pb-3">
            <span class="text-secondary-uim fw-bold tracking-widest small text-uppercase mb-3 d-block">Estructura Académica</span>
            <h2 class="font-headline display-6 text-primary-uim fw-bold mb-3">Nuestros Departamentos</h2>
            <p class="text-on-surface-variant mx-auto fs-5" style="max-width: 750px;">
                Contamos con siete áreas especializadas de investigación que impulsan el desarrollo de la UNAM, vinculando de forma multidisciplinaria la ciencia, tecnología, humanidades y las problemáticas sociales.
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            @php
                $departamentos = [
                    ['nombre' => 'Matemáticas y Actuaría', 'icono' => 'bi-calculator-fill', 'desc' => 'Modelos matemáticos, probabilidad y análisis de riesgo.'],
                    ['nombre' => 'Ciencias Socioeconómicas', 'icono' => 'bi-graph-up-arrow', 'desc' => 'Investigación en impacto económico local y finanzas públicas.'],
                    ['nombre' => 'Derecho y Ciencias Jurídicas', 'icono' => 'bi-bank2', 'desc' => 'Legislación, derechos humanos y políticas constitucionales.'],
                    ['nombre' => 'Diseño y Edificación', 'icono' => 'bi-buildings-fill', 'desc' => 'Urbanismo sustentable e innovación en la arquitectura.'],
                    ['nombre' => 'Ciencias Políticas', 'icono' => 'bi-globe-americas', 'desc' => 'Sistemas políticos, administración y procesos electorales.'],
                    ['nombre' => 'Humanidades', 'icono' => 'bi-journal-bookmark-fill', 'desc' => 'Filosofía, pensamiento crítico, historia y artes visuales.'],
                    ['nombre' => 'Enseñanza de Idiomas', 'icono' => 'bi-translate', 'desc' => 'Lingüística aplicada, traducción y metodologías de enseñanza.'],
                ];
            @endphp

            @foreach($departamentos as $index => $depto)
                <div class="col-6 col-lg-3">
                    <div class="bg-surface-container-lowest p-3 p-md-4 rounded-4 border border-primary border-opacity-10 h-100 card-hover-premium d-flex flex-column group-arrow-hover position-relative overflow-hidden">
                        <!-- Línea decorativa lateral -->
                        <div class="position-absolute top-0 bottom-0 start-0 bg-secondary-uim" style="width: 4px; opacity: 0.9;"></div>

                        <div class="d-flex align-items-center mb-3 ps-2">
                            <div class="bg-white shadow-sm text-primary-uim rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="bi {{ $depto['icono'] }} fs-5"></i>
                            </div>
                            <div class="text-primary-uim opacity-25 fw-bold fs-5 ms-auto font-headline">0{{ $index + 1 }}</div>
                        </div>

                        <div class="ps-2 flex-grow-1 d-flex flex-column">
                            <h3 class="font-headline fs-6 fw-bold text-primary-uim mb-2">{{ $depto['nombre'] }}</h3>
                            <p class="small text-on-surface-variant mb-3 d-none d-sm-block">{{ $depto['desc'] }}</p>

                            <a href="#" class="mt-auto text-decoration-none text-secondary-uim fw-bold small text-uppercase tracking-widest d-inline-flex align-items-center gap-1">
                                <span class="d-none d-sm-inline">Ver área</span> <i class="bi bi-arrow-right icon-transition"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<br>
