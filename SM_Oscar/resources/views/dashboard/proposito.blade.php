{{--
Componente: Proposito / ¿Qué es la UIMA?
Descripción: Sección institucional con estadísticas y galería de imágenes
Variables: $settings (collection de settings con key => value)
--}}

@php
    $s = $settings ?? collect([]);
@endphp

<section id="uim-proposito" class="py-3 py-md-5 bg-surface-container-lowest mt-0">
    <div class="container-fluid">

        <div class="row align-items-center column-gap-4 row-gap-5 gx-0">
            <div class="col-md-1"></div>
            <div class="col-lg-5 order-2 order-lg-1 px-4 px-md-0">
                <span
                    class="text-secondary-uim fw-bold tracking-widest small text-uppercase mb-2 mb-md-3 d-block">{{ $s['proposito_etiqueta'] ?? 'Institucional' }}</span>
                <h2 class="font-headline display-5 display-md-4 text-primary-uim fw-bold mb-3 mb-md-4">
                    {{ $s['proposito_titulo'] ?? '¿Qué es la UIMA?' }}
                </h2>
                <div class="text-on-surface-variant fs-5">
                    <p class="mb-4">
                        {{ $s['proposito_parrafo1'] ?? 'La Unidad de Investigación Multidisciplinaria Aplicada (UIMA) de la FES Acatlán es un espacio dedicado a la generación de conocimiento fronterizo que responde a las necesidades actuales de la sociedad mexicana.' }}
                    </p>
                    <p>
                        {{ $s['proposito_parrafo2'] ?? 'Nuestra misión es articular los esfuerzos de académicos, estudiantes e investigadores en proyectos que trasciendan las fronteras de las disciplinas tradicionales, integrando tecnología, ciencias sociales y humanidades.' }}
                    </p>
                </div>

                <div class="d-flex align-items-center justify-content-around gap-2 gap-md-4 mt-4 mt-md-5 flex-wrap">
                    <div class="text-center flex-shrink-0">
                        <div class="fs-3 fs-md-1 fw-bold text-primary-uim font-headline">
                            {{ $s['stat1_numero'] ?? '25+' }}
                        </div>
                        <div class="small small-md text-uppercase tracking-widest text-outline-uim">
                            {{ $s['stat1_label'] ?? 'Proyectos Activos' }}
                        </div>
                    </div>
                    <div class="vr bg-secondary opacity-25 d-none d-md-flex" style="width: 1px; height: 3rem;"></div>
                    <div class="text-center flex-shrink-0">
                        <div class="fs-3 fs-md-1 fw-bold text-primary-uim font-headline">
                            {{ $s['stat2_numero'] ?? '150' }}
                        </div>
                        <div class="small small-md text-uppercase tracking-widest text-outline-uim">
                            {{ $s['stat2_label'] ?? 'Investigadores' }}
                        </div>
                    </div>
                    <div class="vr bg-secondary opacity-25 d-none d-md-flex" style="width: 1px; height: 3rem;"></div>
                    <div class="text-center flex-shrink-0">
                        <div class="fs-3 fs-md-1 fw-bold text-primary-uim font-headline">{{ $s['stat3_numero'] ?? '7' }}
                        </div>
                        <div class="small small-md text-uppercase tracking-widest text-outline-uim">
                            {{ $s['stat3_label'] ?? 'Departamentos' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 offset-lg-1 order-1 order-lg-2 d-none d-lg-block">
                <div class="row g-3">
                    <div class="col-6 d-flex flex-column gap-3" style="transform: translateY(2rem);">
                        @if(!empty($s['proposito_imagen']))
                            <img alt="UIMA" class="rounded-4 shadow object-fit-cover w-100 d-none d-md-block"
                                style="height: 300px; width: 100%;" src="{{ Storage::url($s['proposito_imagen']) }}" />
                        @else
                            <img alt="Library and Research"
                                class="rounded-4 shadow object-fit-cover w-100 d-none d-md-block" style="height: 250px;"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCR86r0zmj2m_u6RFBgfJAY5P4qSfFSA8wHgXNKX46wUEr3z3CNNPR4972wbEABSl_L-uj753cKQxcXg5cmPht-FcWUfzm_NnBvOD9FDvUgZjOhJRkrXPwHYdgPGXgq7Jl4vmEaTCACEQ2dI2OZtsZ9D84Me9A5JsvZFGCCRulo6RQXtDiTdhPKV1guU912gmVbrjuK0QGtOv7HpQROvXc39bx74SWiBEF7xGHBO_PmFkWRW3i2uR_CvC6jHlivtupCjC1oeBFpCA" />
                        @endif
                    </div>
                    {{-- Columna derecha: Dos imágenes --}}
                    <div class="col-6 d-flex flex-column gap-3 gap-md-4">
                        <img alt="Investigación" class="rounded-4 shadow-lg object-fit-cover w-100"
                            style="height: 220px; border: 4px solid white;"
                            src="{{ !empty($s['proposito_imagen2']) ? asset($s['proposito_imagen2']) : 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&q=80&w=800' }}" />

                        <img alt="Tecnología" class="rounded-4 shadow-lg object-fit-cover w-100"
                            style="height: 200px; border: 4px solid white;"
                            src="{{ !empty($s['proposito_imagen3']) ? asset($s['proposito_imagen3']) : 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&q=80&w=800' }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>