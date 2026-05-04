{{--
    Componente: Noticias y Eventos
    Descripción: Grid de últimas noticias
    Variables: $settings (collection de settings con key => value)
--}}

@php
$s = $settings ?? collect([]);
@endphp

<section class="py-5 bg-surface-container-lowest">
    <div class="container py-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5 gap-3">
            <div>
                <span class="text-secondary-uim fw-bold tracking-widest small text-uppercase mb-3 d-block">{{ $s['noticias_etiqueta'] ?? 'Actualidad' }}</span>
                <h2 class="font-headline display-6 text-primary-uim fw-bold mb-0">{{ $s['noticias_titulo'] ?? 'Últimas Noticias y Eventos' }}</h2>
            </div>
            <a class="text-primary-uim fw-bold text-decoration-none d-flex align-items-center gap-2 group-arrow-hover"
                href="#">
                {{ $s['noticias_link'] ?? 'Ver todas las noticias' }}
                <i class="bi bi-arrow-right icon-transition"></i>
            </a>
        </div>

        <div class="row g-3 g-md-4">
            <!-- News Item 1 -->
            <div class="col-6 col-md-6 col-lg-4">
                <article class="bg-surface-container-lowest rounded-4 overflow-hidden shadow-sm h-100 d-flex flex-column card-hover-premium group-arrow-hover">
                    <div class="overflow-hidden" style="height: 120px;" md-height="220px">
                        <img alt="{{ $s['noticia1_titulo'] ?? 'Noticia 1' }}" class="w-100 h-100 object-fit-cover"
                            src="{{ !empty($s['noticia1_imagen']) ? Storage::url($s['noticia1_imagen']) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuBMq2I7N3vkdWCx4paQkSh_AXABg-2ONJzp2pQgHO4Pq_ckLBHhDWCnr-eUqQvb0mkxU38OR-1H7Krp6n0KBfBLdA-trJW0Z8xbdqH6018H-pZTLbztsOYzpnDMuFbYWf3x20u0XHp29lZvI-WL3nl8o9XMATf2HKOGs2drHAvfX_yAETWCz5EshBsxMuCnfFKup6JAGJA28-Kb-eZxZAjf15eSrn36oA-ho33qZjb1uJV5EXKwCsMbBT5PaKAc58jTFqjJEy-kpg' }}" />
                    </div>
                    <div class="p-2 p-md-4 d-flex flex-column flex-grow-1">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="bg-blue-50-uim text-primary-uim fw-bold text-uppercase tracking-widest px-2 py-1 rounded-pill d-none d-sm-inline-block"
                                style="font-size: 0.6rem;">{{ $s['noticia1_categoria'] ?? 'Seminario' }}</span>
                            <span class="text-outline-uim font-label" style="font-size: 0.65rem;">{{ $s['noticia1_fecha'] ?? 'Oct 24' }}</span>
                        </div>
                        <h3 class="font-headline fs-6 fw-bold text-primary-uim mb-2" style="font-size: 0.85rem !important;">{{ $s['noticia1_titulo'] ?? 'Nuevas perspectivas en la investigación 2024' }}</h3>
                        <p class="text-on-surface-variant small mb-3 line-clamp-2 d-none d-sm-block">{{ $s['noticia1_resumen'] ?? 'Se invita a la comunidad académica a participar en el ciclo de conferencias...' }}</p>
                        <a class="mt-auto text-secondary-uim fw-bold text-uppercase tracking-widest text-decoration-none d-flex align-items-center gap-1"
                            href="{{ $s['noticia1_link'] ?? '#' }}" style="font-size: 0.7rem;">
                            <span class="d-none d-sm-inline">Leer</span>
                            <i class="bi bi-chevron-right icon-transition fs-6"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- News Item 2 -->
            <div class="col-6 col-md-6 col-lg-4">
                <article class="bg-surface-container-lowest rounded-4 overflow-hidden shadow-sm h-100 d-flex flex-column card-hover-premium group-arrow-hover">
                    <div class="overflow-hidden" style="height: 120px;" md-height="220px">
                        <img alt="{{ $s['noticia2_titulo'] ?? 'Noticia 2' }}" class="w-100 h-100 object-fit-cover"
                            src="{{ !empty($s['noticia2_imagen']) ? Storage::url($s['noticia2_imagen']) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuBHjKt7oFAI9ORQdzBv6W8DR3odBagHGWikgR7MNz17MIQZ9CUdlYCGnqEb69hZS_oHc3mOfNuBQ0LaBJaBXCeF7Ef8pyeBxe9i6KjxrnOhRcIrRZEiZxMLNLCP2NWFeTCPG9iPbhOM7p_Bkry6TmU9-FqcHwxVD68Cwyfg3TzJrDvXrbIEM24_3VxUu8GWpTLOedBCu1P_30pQ9PpLA_fBR0DXuTIwtrypc1zmVuIwY5PmqaR-o8-Fs1fD8vBs-M8ahkTqt4Ujkg' }}" />
                    </div>
                    <div class="p-2 p-md-4 d-flex flex-column flex-grow-1">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="bg-amber-50-uim text-secondary-uim fw-bold text-uppercase tracking-widest px-2 py-1 rounded-pill d-none d-sm-inline-block"
                                style="font-size: 0.6rem;">{{ $s['noticia2_categoria'] ?? 'Publicación' }}</span>
                            <span class="text-outline-uim font-label" style="font-size: 0.65rem;">{{ $s['noticia2_fecha'] ?? 'Oct 12' }}</span>
                        </div>
                        <h3 class="font-headline fs-6 fw-bold text-primary-uim mb-2" style="font-size: 0.85rem !important;">{{ $s['noticia2_titulo'] ?? 'Presentación Revista FIGURAS: Invierno' }}</h3>
                        <p class="text-on-surface-variant small mb-3 line-clamp-2 d-none d-sm-block">{{ $s['noticia2_resumen'] ?? 'Explora los artículos más recientes sobre humanidades digitales...' }}</p>
                        <a class="mt-auto text-secondary-uim fw-bold text-uppercase tracking-widest text-decoration-none d-flex align-items-center gap-1"
                            href="{{ $s['noticia2_link'] ?? '#' }}" style="font-size: 0.7rem;">
                            <span class="d-none d-sm-inline">Leer</span>
                            <i class="bi bi-chevron-right icon-transition fs-6"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- News Item 3 -->
            <div class="col-6 col-md-6 col-lg-4">
                <article class="bg-surface-container-lowest rounded-4 overflow-hidden shadow-sm h-100 d-flex flex-column card-hover-premium group-arrow-hover">
                    <div class="overflow-hidden" style="height: 120px;" md-height="220px">
                        <img alt="{{ $s['noticia3_titulo'] ?? 'Noticia 3' }}" class="w-100 h-100 object-fit-cover"
                            src="{{ !empty($s['noticia3_imagen']) ? Storage::url($s['noticia3_imagen']) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuAvy5x0C_1PEYcY8DG_3U1ya56lDXE32_WpGDrmXJcdCVGNxCtFJEKJd-T3-oqyC-74ebHkEuoRD6UIkbZ-PsTCFtXihCi3IU_RDUbTqcqBnXaeWvX4g5oy53iSveMTYrMBtYQXUplz9QCLY4asIByZ8Jn6GVBlJ_7LTlSMhd3pb9VDJCmfwlsH8H26AsaJPDxQUuEEelGAhrIqMIP2Zk6i4LniZDVfVk9gk9kBLCauMBw0P_tH4DZLp4hkcb2Oiuku71WvHsTLbA' }}" />
                    </div>
                    <div class="p-2 p-md-4 d-flex flex-column flex-grow-1">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="bg-blue-50-uim text-primary-uim fw-bold text-uppercase tracking-widest px-2 py-1 rounded-pill d-none d-sm-inline-block"
                                style="font-size: 0.6rem;">{{ $s['noticia3_categoria'] ?? 'Vinculación' }}</span>
                            <span class="text-outline-uim font-label" style="font-size: 0.65rem;">{{ $s['noticia3_fecha'] ?? 'Sep 28' }}</span>
                        </div>
                        <h3 class="font-headline fs-6 fw-bold text-primary-uim mb-2" style="font-size: 0.85rem !important;">{{ $s['noticia3_titulo'] ?? 'Alianza con institutos internacionales' }}</h3>
                        <p class="text-on-surface-variant small mb-3 line-clamp-2 d-none d-sm-block">{{ $s['noticia3_resumen'] ?? 'UIMA firma convenio de colaboración con universidades europeas...' }}</p>
                        <a class="mt-auto text-secondary-uim fw-bold text-uppercase tracking-widest text-decoration-none d-flex align-items-center gap-1"
                            href="{{ $s['noticia3_link'] ?? '#' }}" style="font-size: 0.7rem;">
                            <span class="d-none d-sm-inline">Leer</span>
                            <i class="bi bi-chevron-right icon-transition fs-6"></i>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
