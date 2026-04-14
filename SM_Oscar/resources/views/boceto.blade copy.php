@extends('layouts.app')

@push('styles')
<style>
    .hero-section {
        height: 85vh;
        min-height: 650px;
    }
</style>
@endpush

@section('content')
<div class="font-body bg-surface-uim" style="color: #141d23;">

    <!-- Hero Section -->
    <section
        class="position-relative w-100 overflow-hidden d-flex align-items-center justify-content-center hero-section">
        <div class="position-absolute top-0 bottom-0 start-0 end-0 z-0">
            <img alt="FES Acatlán Main Building" class="w-100 h-100 object-fit-cover"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBYkgGfMIhX3mFtsg05eWCSW7chi1T7-VtMUzOPLYx46P3PaOzJXbQ1LgShaW2c2OjgRxHL6H5-AgbRs1JFCnInMR-XRppfv2sncH_aWwhR4b1RyT-wdnYjYt3LZ_Z2u2DI2zVrVy213-0XizSvqqC7hwtbdZImwIn32r5xKYdZnZNwrDAlSri1t75JeE_XDpgpwRGVl2JJn16U8KN3WxiAnqlGaBmqbo3aSZLJrAQDQBFLW_l31Pi7KBHqxcm6JAZP2AGuflR6PA" />
            <div class="position-absolute top-0 bottom-0 start-0 end-0 hero-gradient"></div>
        </div>

        <div class="position-relative z-1 text-center px-3" style="max-width: 900px;">
            <h1 class="font-headline display-3 display-md-1 text-white fw-bold mb-4 tracking-tight"
                style="opacity: 0.9;">FES ACATLÁN — UNAM</h1>
            <p class="fs-5 fs-md-4 text-blue-100-uim fw-light mx-auto mb-5">
                Unidad de Investigación Multidisciplinaria Aplicada. El epicentro del conocimiento y la innovación
                académica.
            </p>
            <div class="d-flex flex-column flex-md-row gap-3 justify-content-center">
                <button
                    class="btn btn-light btn-lg px-4 py-3 fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2 text-primary-uim">
                    Explorar Investigación
                    <i class="bi bi-arrow-right"></i>
                </button>
                <button class="btn btn-outline-light btn-lg px-4 py-3 fw-bold" style="backdrop-filter: blur(10px);">
                    Conoce la UIMA
                </button>
            </div>
        </div>

        <div class="position-absolute bottom-0 start-50 translate-middle-x d-flex gap-2 mb-4">
            <div class="bg-white rounded-pill" style="width: 3rem; height: 4px;"></div>
            <div class="bg-white rounded-pill opacity-25" style="width: 3rem; height: 4px;"></div>
            <div class="bg-white rounded-pill opacity-25" style="width: 3rem; height: 4px;"></div>
        </div>
    </section>

    <!-- What is UIMA? -->
    <section class="py-5 bg-surface-uim">
        <div class="container py-4">
            <div class="row align-items-center column-gap-4 row-gap-5">
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

                <div class="col-lg-6 offset-lg-1 order-1 order-lg-2">
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

    <!-- Pillars Section -->
    <section class="py-5 bg-surface-container-low">
        <div class="container py-4">
            <div class="text-center mb-5 pb-3">
                <h2 class="font-headline display-6 text-primary-uim fw-bold mb-3">Pilares de Investigación</h2>
                <p class="text-on-surface-variant mx-auto fs-5" style="max-width: 700px;">Nuestra estructura se
                    fundamenta en cuatro ejes estratégicos que guían la curiosidad intelectual y la aplicación práctica.
                </p>
            </div>

            <div class="row g-4">
                <!-- Social Sciences -->
                <div class="col-md-6 col-lg-3">
                    <div
                        class="bg-surface-container-lowest p-4 rounded-4 shadow-sm border-0 h-100 card-hover-premium group-hover-icon">
                        <div class="bg-blue-50-uim card-pilar-icon">
                            <i class="bi bi-people-fill fs-2 text-primary-uim"></i>
                        </div>
                        <h3 class="font-headline fs-4 fw-bold text-primary-uim mb-3">Ciencias Sociales</h3>
                        <p class="small text-on-surface-variant mb-0">Análisis de estructuras sociales, dinámicas
                            urbanas y comportamiento humano en el contexto contemporáneo.</p>
                    </div>
                </div>

                <!-- Technology -->
                <div class="col-md-6 col-lg-3">
                    <div
                        class="bg-surface-container-lowest p-4 rounded-4 shadow-sm border-0 h-100 card-hover-premium group-hover-icon">
                        <div class="bg-amber-50-uim card-pilar-icon">
                            <i class="bi bi-lightbulb-fill fs-2 text-secondary-uim"></i>
                        </div>
                        <h3 class="font-headline fs-4 fw-bold text-primary-uim mb-3">Tecnología e Innovación</h3>
                        <p class="small text-on-surface-variant mb-0">Desarrollo de soluciones digitales, inteligencia
                            artificial y procesos tecnológicos aplicados.</p>
                    </div>
                </div>

                <!-- Humanities -->
                <div class="col-md-6 col-lg-3">
                    <div
                        class="bg-surface-container-lowest p-4 rounded-4 shadow-sm border-0 h-100 card-hover-premium group-hover-icon">
                        <div class="bg-blue-50-uim card-pilar-icon">
                            <i class="bi bi-journal-text fs-2 text-primary-uim"></i>
                        </div>
                        <h3 class="font-headline fs-4 fw-bold text-primary-uim mb-3">Humanidades</h3>
                        <p class="small text-on-surface-variant mb-0">Estudio crítico del arte, la literatura, la
                            historia y el pensamiento ético de nuestra cultura.</p>
                    </div>
                </div>

                <!-- Law -->
                <div class="col-md-6 col-lg-3">
                    <div
                        class="bg-surface-container-lowest p-4 rounded-4 shadow-sm border-0 h-100 card-hover-premium group-hover-icon">
                        <div class="bg-amber-50-uim card-pilar-icon">
                            <i class="bi bi-bank fs-2 text-secondary-uim"></i>
                        </div>
                        <h3 class="font-headline fs-4 fw-bold text-primary-uim mb-3">Derecho y Justicia</h3>
                        <p class="small text-on-surface-variant mb-0">Investigación jurídica sobre derechos humanos,
                            legalidad y el fortalecimiento del estado de derecho.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Strategic Access -->
    <section class="py-5 bg-surface-uim">
        <div class="container py-4">
            <div class="row g-0 rounded-4 shadow-lg overflow-hidden group-hover-scale group-hover-opacity">
                <!-- Col 1 -->
                <div class="col-lg-4">
                    <a href="#"
                        class="text-decoration-none d-block position-relative group-hover-scale group-hover-opacity"
                        style="height: 320px;">
                        <img alt="Convocatorias"
                            class="position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100 object-fit-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAT7oZg8QOpNrneUIoh8P3fpRWCQd49Z0226_IY5ZeChGShfAGh4LtELKlXUVE8VBEuYa5ZuQLUOkaPD4sARkmEfWnXroO_Wb_7IJBE0s9qoqdbIjbqLMVm9guFRuA8R04A_1NkSVJw4ueS8J96wj-mKT2U8YN6SES0J6F1-r8Kx4RBpRAv5R8KHPY7QE_kJPf2z8_w8z0Y5BGVMdm7vse96lBM1zubzcwru0feO04H0UrxlrFRjV0biUa0UpFxAhqsONV_o60JjQ" />
                        <div class="position-absolute top-0 bottom-0 start-0 end-0 bg-gradient-primary-card"></div>
                        <div class="position-absolute bottom-0 start-0 end-0 p-4 p-md-5 z-1">
                            <h4 class="font-headline fs-3 text-white fw-bold mb-2">Convocatorias</h4>
                            <p class="text-blue-100-uim small mb-0 hover-target">Oportunidades de investigación y becas
                                activas.</p>
                        </div>
                    </a>
                </div>

                <!-- Col 2 -->
                <div class="col-lg-4 border-start border-end border-white border-opacity-10">
                    <a href="#"
                        class="text-decoration-none d-block position-relative group-hover-scale group-hover-opacity"
                        style="height: 320px;">
                        <img alt="Repositorio"
                            class="position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100 object-fit-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7If9ncJIYShn5zmtN6YVlJIcplAnn7Z2bg9ZUutPYhkV2xjsi8eYLAcnpTXYJkdbFZZ8G92beItRe9VilFncyhbWNKK6qKASHKYKv60u1TuWRn1fFLXprk2yIzoTf_iBGjq0J84pIPhe48hHPE3Yt9KTJLhNg8dZtuBYFVDDIy9CoLJb57G-PwpwXCgZfe6-8YT3y0KCZQkWztJJqUGgXnvFVuo0Bywu-XNtgeyZFzsNLbtKU4qGKduLUDieX00bQAFE8im1Fvw" />
                        <div class="position-absolute top-0 bottom-0 start-0 end-0 bg-gradient-secondary-card"></div>
                        <div class="position-absolute bottom-0 start-0 end-0 p-4 p-md-5 z-1">
                            <h4 class="font-headline fs-3 text-white fw-bold mb-2">Repositorio Digital</h4>
                            <p class="text-white-50 small mb-0 hover-target">Consulta de tesis, artículos y libros
                                publicados.</p>
                        </div>
                    </a>
                </div>

                <!-- Col 3 -->
                <div class="col-lg-4">
                    <a href="#"
                        class="text-decoration-none d-block position-relative group-hover-scale group-hover-opacity"
                        style="height: 320px;">
                        <img alt="Vinculación"
                            class="position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100 object-fit-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDxxMcO0645ppTiApTcFcX1EXEWM6aZbowCvKIETHgqBLSpcVTHgAChohVXd0rbE6zgBtOqfvylw7LliOToj9qsjliK3-M0Yo62aTE8iWaneOlAeEyutqNaqEzbuSzKtXc6L5KNXAFaoVbHzfo-94bRHDAILb82PYhXFAdOxJVmt9edpwRbobBGeCNim06oaNx0_Mg9a1kz9rcetrtnnNLUOIgunWprIlDZYLDYLlhSH-mR88t6_k0zTLdKwf3frYp4cAqokpHTuA" />
                        <div class="position-absolute top-0 bottom-0 start-0 end-0 bg-gradient-primary-card"></div>
                        <div class="position-absolute bottom-0 start-0 end-0 p-4 p-md-5 z-1">
                            <h4 class="font-headline fs-3 text-white fw-bold mb-2">Vinculación</h4>
                            <p class="text-blue-100-uim small mb-0 hover-target">Alianzas con el sector público, privado
                                y social.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- News & Events -->
    <section class="py-5 bg-surface-uim">
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