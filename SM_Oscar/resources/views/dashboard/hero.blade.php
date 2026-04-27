{{--
    Componente: Hero Section (Carrusel Principal)
    Descripción: Carrusel de imágenes destacadas de la UIMA
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
