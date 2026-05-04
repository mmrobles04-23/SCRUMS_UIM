{{--
    Componente: Hero Section (Carrusel Principal)
    Descripción: Carrusel de imágenes destacadas de la UIMA
    Variables: $settings (collection de settings con key => value)
--}}

@php
$s = $settings ?? collect([]);
@endphp

{{-- NOTA (Bootstrap): componente Carousel (data-bs-ride, controles, captions). --}}
{{-- NOTA (Estilo propio / app.css): .bloque-carrucel, #carousel, .slide-title, overlay ::before. --}}
<section class="bloque-carrucel d-flex align-items-center mb-0" aria-label="Carrusel principal UIM">
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-label="Diapositiva 1"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Diapositiva 2"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Diapositiva 3"></button>
        </div>

        <div class="carousel-inner">

            <div class="carousel-item active" data-bs-interval="5000">
                <img src="{{ !empty($s['hero_slide1_imagen']) ? Storage::url($s['hero_slide1_imagen']) : asset('dashboard/img1.jpg') }}" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption">
                    <h2 class="slide-title">{{ $s['hero_slide1_titulo'] ?? 'Unidad de Investigación Multidisciplinaria' }}</h2>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="5000">
                <img src="{{ !empty($s['hero_slide2_imagen']) ? Storage::url($s['hero_slide2_imagen']) : asset('dashboard/img2.jpg') }}" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption">
                    <h2 class="slide-title">{{ $s['hero_slide2_titulo'] ?? 'FES Acatlán — UNAM' }}</h2>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="5000">
                <img src="{{ !empty($s['hero_slide3_imagen']) ? Storage::url($s['hero_slide3_imagen']) : asset('dashboard/img3.jpg') }}" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption">
                    <h2 class="slide-title">{{ $s['hero_slide3_titulo'] ?? 'Docencia, investigación y cultura' }}</h2>
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
