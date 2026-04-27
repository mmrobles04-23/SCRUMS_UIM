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
    <div class="font-body bg-surface-container-lowest" style="color: #141d23;">

        <!-- Hero Section -->
    {{--
        Referencia: menú Investigación del portal FES Acatlán (Propósito, Seminarios, Departamentos, FIGURAS).
        Guía para actualizar textos, imágenes y enlaces cuando la UNAM entregue material: docs/GUIA_CONTENIDO_UIM.md
        URLs centralizadas: config/uim.php + variables .env (prefijo UIM_).
    --}}
    {{-- NOTA (Bootstrap): componente Carousel (data-bs-ride, controles, captions). --}}
    {{-- NOTA (Estilo propio / app.css): .bloque-carrucel, #carousel, .slide-title, overlay ::before. --}}
<section class="bg-secondary-subtle bloque-carrucel d-flex align-items-center shadow-sm" aria-label="Carrusel principal UIM">
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-label="Diapositiva 1"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Diapositiva 2"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Diapositiva 3"></button>
        </div>

        <div class="carousel-inner">

            <div class="carousel-item active" data-bs-interval="5000">
                <img src="{{ asset('dashboard/img1.jpg') }}" class="d-block w-100" alt="Campus y actividades de la FES Acatlán — UNAM">
                <div class="carousel-caption">
                    <h2 class="slide-title">Unidad de Investigación Multidisciplinaria</h2>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="5000">
                <img src="{{ asset('dashboard/img2.jpg') }}" class="d-block w-100" alt="Investigación en la FES Acatlán">
                <div class="carousel-caption">
                    <h2 class="slide-title">FES Acatlán — UNAM</h2>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="5000">
                <img src="{{ asset('dashboard/img3.jpg') }}" class="d-block w-100" alt="Difusión y formación en investigación">
                <div class="carousel-caption">
                    <h2 class="slide-title">Docencia, investigación y cultura</h2>
                </div>
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>
</section>

        <!-- What is UIMA? -->
        <section id="uim-proposito" class="py-5 bg-surface-container-lowest">
            <div class="container-fluid">

                <div class="row align-items-center column-gap-4 row-gap-5">
                                    <div class="col-md-1"></div>
                    <div class="col-lg-5 order-2 order-lg-1">
                        <span
                            class="text-secondary-uim fw-bold tracking-widest small text-uppercase mb-3 d-block">Institucional</span>
                        <h2 class="font-headline display-5 text-primary-uim fw-bold mb-4">¿Qué es la UIMA?</h2>
                        <div class="text-on-surface-variant fs-5">
                            <p class="mb-4">
                                La Unidad de Investigación Multidisciplinaria Aplicada (UIMA) de la FES Acatlán es un
                                espacio dedicado a la generación de conocimiento fronterizo que responde a las necesidades
                                actuales de la sociedad mexicana.
                            </p>
                            <p>
                                Nuestra misión es articular los esfuerzos de académicos, estudiantes e investigadores en
                                proyectos que trasciendan las fronteras de las disciplinas tradicionales, integrando
                                tecnología, ciencias sociales y humanidades.
                            </p>
                        </div>

                        <div class="d-flex align-items-center gap-4 mt-5">
                            <div class="text-center">
                                <div class="fs-1 fw-bold text-primary-uim font-headline">25+</div>
                                <div class="small text-uppercase tracking-widest text-outline-uim">Proyectos Activos</div>
                            </div>
                            <div class="vr bg-secondary opacity-25" style="width: 1px; height: 3rem;"></div>
                            <div class="text-center">
                                <div class="fs-1 fw-bold text-primary-uim font-headline">150</div>
                                <div class="small text-uppercase tracking-widest text-outline-uim">Investigadores</div>
                            </div>
                            <div class="vr bg-secondary opacity-25" style="width: 1px; height: 3rem;"></div>
                            <div class="text-center">
                                <div class="fs-1 fw-bold text-primary-uim font-headline">12</div>
                                <div class="small text-uppercase tracking-widest text-outline-uim">Departamentos</div>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-4 offset-lg-1 order-1 order-lg-2">
                        <div class="row g-3">
                            <div class="col-6 d-flex flex-column gap-3" style="transform: translateY(2rem);">
                                <img alt="Library and Research" class="rounded-4 shadow object-fit-cover w-100"
                                    style="height: 250px;"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCR86r0zmj2m_u6RFBgfJAY5P4qSfFSA8wHgXNKX46wUEr3z3CNNPR4972wbEABSl_L-uj753cKQxcXg5cmPht-FcWUfzm_NnBvOD9FDvUgZjOhJRkrXPwHYdgPGXgq7Jl4vmEaTCACEQ2dI2OZtsZ9D84Me9A5JsvZFGCCRulo6RQXtDiTdhPKV1guU912gmVbrjuK0QGtOv7HpQROvXc39bx74SWiBEF7xGHBO_PmFkWRW3i2uR_CvC6jHlivtupCjC1oeBFpCA" />
                                <img alt="Academic Collaboration" class="rounded-4 shadow object-fit-cover w-100"
                                    style="height: 180px;"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAwIW4LphxZIufQdSQ53ZKsw249BjqhHPP_0Ri2m2p69gL1R_T82p0kwMYw-n2oiAUz5C-TENWuaRJ52DPEdNV-IdaGrGNuoZ2z3YpibuZQuBjb7j8JebeKUmI50AyAS6cBHzFPIBmO5d2QH70N_ePPhn0R2iPkJiyS3Kw4MhsgGQyDgbZrEGeMG2GmfnmsRRfCKIFeLelIq47RLdX5tORkZYwDZPFlhOPlvmE0a8eNluH8f6L9UrWnweBaQI5F1XerBbZ6QmiG5Q" />
                            </div>
                            <div class="col-6 d-flex flex-column gap-3">
                                <img alt="Technology Lab" class="rounded-4 shadow object-fit-cover w-100"
                                    style="height: 180px;"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCh6P81rJCBqaS5_WTAVtBT5j44K9a2HW1El0DeFAg-kCwthVcf6vcKFEycv0fHBG_oUsumUQAyWBhXmVUlv0WRWdXTWLSzILjqeIQv7S63xrOD7FSwM-R8vFB-83pYwSmkqQPZ2l3ahcmEAS-HKz7shxtAa0LfvslovEDvk_VVWBEA0kd0bnZukutOxi3-6Z0_AiYWlyZVojvQyQTbDSjbKGeEBipwJsLkpIuvqa4z8DhS0vZ5DRGv49LkkEkvZr7SPwYhyIt7bQ" />
                                <img alt="Writing and Humanities" class="rounded-4 shadow object-fit-cover w-100"
                                    style="height: 250px;"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBIzNEv78eOYnVR7KRLCF96onbQ4PZveaWh4u_Up9sxGWkk_fc7HronCTU8vxVEFUHgedOr8HSQ5iHZAqFnA3f71YMlAKoVQ3BkTKSCTSm3M-9CKZTjtMtdHHp2RmleamftChUEEhaRGAD-LlczgVfKnx8xsH4O2QSA3J5pmb2ir6U0F0eF68PbIvqAlvyjPVDR8JBWPNoOKiufDghP27vgqHKExL2y5xPMSwB6RJzALz1fXoTL4eRNzH3SRUxxrPqJXH6KzTqCCA" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Departamentos Section (7 Áreas) -->
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
                        // Definición de las 7 áreas a modo de boceto/borrador
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
                        <div class="col-sm-6 col-lg-3">
                            <div class="bg-surface-container-lowest p-4 rounded-4 border border-primary border-opacity-10 h-100 card-hover-premium d-flex flex-column group-arrow-hover position-relative overflow-hidden">
                                <!-- Línea decorativa lateral -->
                                <div class="position-absolute top-0 bottom-0 start-0 bg-secondary-uim" style="width: 4px; opacity: 0.9;"></div>
                                
                                <div class="d-flex align-items-center mb-4 ps-2">
                                    <div class="bg-white shadow-sm text-primary-uim rounded-circle d-flex align-items-center justify-content-center" style="width: 52px; height: 52px;">
                                        <i class="bi {{ $depto['icono'] }} fs-4"></i>
                                    </div>
                                    <div class="text-primary-uim opacity-25 fw-bold fs-3 ms-auto font-headline">0{{ $index + 1 }}</div>
                                </div>
                                
                                <div class="ps-2 flex-grow-1 d-flex flex-column">
                                    <h3 class="font-headline fs-5 fw-bold text-primary-uim mb-2">{{ $depto['nombre'] }}</h3>
                                    <p class="small text-on-surface-variant mb-4">{{ $depto['desc'] }}</p>
                                    
                                    <a href="#" class="mt-auto text-decoration-none text-secondary-uim fw-bold small text-uppercase tracking-widest d-inline-flex align-items-center gap-2">
                                        Ver área <i class="bi bi-arrow-right icon-transition"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
<br>
        <!-- Congresos Dinámicos -->
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
                    // Previene error si se visita /boceto sin las variables del HomeController
                    $listaCongresos = $congresos ?? collect([]);
                @endphp

                @forelse($listaCongresos as $congreso)
                    <div
                        class="card bg-surface-container-lowest border-0 shadow-sm rounded-4 mb-4 overflow-hidden card-hover-premium group-arrow-hover">
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
                                            <span><i
                                                    class="bi bi-calendar-event me-2 text-secondary-uim"></i>{{ $congreso->fecha_inicio->format('d/m/Y') }}
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
        <!-- News & Events -->
        <section class="py-5 bg-surface-container-lowest">
            <div class="container py-4">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5 gap-3">
                    <div>
                        <span
                            class="text-secondary-uim fw-bold tracking-widest small text-uppercase mb-3 d-block">Actualidad</span>
                        <h2 class="font-headline display-6 text-primary-uim fw-bold mb-0">Últimas Noticias y Eventos</h2>
                    </div>
                    <a class="text-primary-uim fw-bold text-decoration-none d-flex align-items-center gap-2 group-arrow-hover"
                        href="#">
                        Ver todas las noticias
                        <i class="bi bi-arrow-right icon-transition"></i>
                    </a>
                </div>

                <div class="row g-4">
                    <!-- News Item 1 -->
                    <div class="col-md-6 col-lg-4">
                        <article
                            class="bg-surface-container-lowest rounded-4 overflow-hidden shadow-sm h-100 d-flex flex-column card-hover-premium group-arrow-hover">
                            <div class="overflow-hidden" style="height: 220px;">
                                <img alt="Conference" class="w-100 h-100 object-fit-cover"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBMq2I7N3vkdWCx4paQkSh_AXABg-2ONJzp2pQgHO4Pq_ckLBHhDWCnr-eUqQvb0mkxU38OR-1H7Krp6n0KBfBLdA-trJW0Z8xbdqH6018H-pZTLbztsOYzpnDMuFbYWf3x20u0XHp29lZvI-WL3nl8o9XMATf2HKOGs2drHAvfX_yAETWCz5EshBsxMuCnfFKup6JAGJA28-Kb-eZxZAjf15eSrn36oA-ho33qZjb1uJV5EXKwCsMbBT5PaKAc58jTFqjJEy-kpg" />
                            </div>
                            <div class="p-4 d-flex flex-column flex-grow-1">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <span
                                        class="bg-blue-50-uim text-primary-uim fw-bold text-uppercase tracking-widest px-3 py-1 rounded-pill"
                                        style="font-size: 0.65rem;">Seminario</span>
                                    <span class="text-outline-uim font-label" style="font-size: 0.75rem;">Oct 24,
                                        2024</span>
                                </div>
                                <h3 class="font-headline fs-5 fw-bold text-primary-uim mb-3">Nuevas perspectivas en la
                                    investigación multidisciplinaria 2024</h3>
                                <p class="text-on-surface-variant small mb-4 line-clamp-3">Se invita a la comunidad
                                    académica a participar en el ciclo de conferencias sobre innovación social y tecnología
                                    aplicada...</p>
                                <a class="mt-auto text-secondary-uim fw-bold text-uppercase tracking-widest text-decoration-none d-flex align-items-center gap-2"
                                    href="#" style="font-size: 0.75rem;">
                                    Leer Más
                                    <i class="bi bi-chevron-right icon-transition fs-6"></i>
                                </a>
                            </div>
                        </article>
                    </div>

                    <!-- News Item 2 -->
                    <div class="col-md-6 col-lg-4">
                        <article
                            class="bg-surface-container-lowest rounded-4 overflow-hidden shadow-sm h-100 d-flex flex-column card-hover-premium group-arrow-hover">
                            <div class="overflow-hidden" style="height: 220px;">
                                <img alt="Book presentation" class="w-100 h-100 object-fit-cover"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBHjKt7oFAI9ORQdzBv6W8DR3odBagHGWikgR7MNz17MIQZ9CUdlYCGnqEb69hZS_oHc3mOfNuBQ0LaBJaBXCeF7Ef8pyeBxe9i6KjxrnOhRcIrRZEiZxMLNLCP2NWFeTCPG9iPbhOM7p_Bkry6TmU9-FqcHwxVD68Cwyfg3TzJrDvXrbIEM24_3VxUu8GWpTLOedBCu1P_30pQ9PpLA_fBR0DXuTIwtrypc1zmVuIwY5PmqaR-o8-Fs1fD8vBs-M8ahkTqt4Ujkg" />
                            </div>
                            <div class="p-4 d-flex flex-column flex-grow-1">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <span
                                        class="bg-amber-50-uim text-secondary-uim fw-bold text-uppercase tracking-widest px-3 py-1 rounded-pill"
                                        style="font-size: 0.65rem;">Publicación</span>
                                    <span class="text-outline-uim font-label" style="font-size: 0.75rem;">Oct 12,
                                        2024</span>
                                </div>
                                <h3 class="font-headline fs-5 fw-bold text-primary-uim mb-3">Presentación de la Revista
                                    FIGURAS: Volumen de Invierno</h3>
                                <p class="text-on-surface-variant small mb-4 line-clamp-3">Explora los artículos más
                                    recientes sobre humanidades digitales y justicia social en nuestra edición trimestral.
                                </p>
                                <a class="mt-auto text-secondary-uim fw-bold text-uppercase tracking-widest text-decoration-none d-flex align-items-center gap-2"
                                    href="#" style="font-size: 0.75rem;">
                                    Leer Más
                                    <i class="bi bi-chevron-right icon-transition fs-6"></i>
                                </a>
                            </div>
                        </article>
                    </div>

                    <!-- News Item 3 -->
                    <div class="col-md-6 col-lg-4">
                        <article
                            class="bg-surface-container-lowest rounded-4 overflow-hidden shadow-sm h-100 d-flex flex-column card-hover-premium group-arrow-hover">
                            <div class="overflow-hidden" style="height: 220px;">
                                <img alt="Research Lab News" class="w-100 h-100 object-fit-cover"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAvy5x0C_1PEYcY8DG_3U1ya56lDXE32_WpGDrmXJcdCVGNxCtFJEKJd-T3-oqyC-74ebHkEuoRD6UIkbZ-PsTCFtXihCi3IU_RDUbTqcqBnXaeWvX4g5oy53iSveMTYrMBtYQXUplz9QCLY4asIByZ8Jn6GVBlJ_7LTlSMhd3pb9VDJCmfwlsH8H26AsaJPDxQUuEEelGAhrIqMIP2Zk6i4LniZDVfVk9gk9kBLCauMBw0P_tH4DZLp4hkcb2Oiuku71WvHsTLbA" />
                            </div>
                            <div class="p-4 d-flex flex-column flex-grow-1">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <span
                                        class="bg-blue-50-uim text-primary-uim fw-bold text-uppercase tracking-widest px-3 py-1 rounded-pill"
                                        style="font-size: 0.65rem;">Vinculación</span>
                                    <span class="text-outline-uim font-label" style="font-size: 0.75rem;">Sep 28,
                                        2024</span>
                                </div>
                                <h3 class="font-headline fs-5 fw-bold text-primary-uim mb-3">Alianza con institutos
                                    internacionales de tecnología</h3>
                                <p class="text-on-surface-variant small mb-4 line-clamp-3">UIMA firma convenio de
                                    colaboración con universidades europeas para el intercambio de investigadores y
                                    patentes...</p>
                                <a class="mt-auto text-secondary-uim fw-bold text-uppercase tracking-widest text-decoration-none d-flex align-items-center gap-2"
                                    href="#" style="font-size: 0.75rem;">
                                    Leer Más
                                    <i class="bi bi-chevron-right icon-transition fs-6"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    

    </div>
@endsection