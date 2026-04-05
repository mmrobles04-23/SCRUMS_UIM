@extends('layouts.app')

@section('title', 'Inicio — UIM FES Acatlán')

@section('content')
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

    {{-- NOTA (Bootstrap): container-fluid, gutters g-4, px responsive; orden en móvil: contenido principal primero. --}}
<div class="container-fluid px-3 px-lg-4 py-4">
<div class="row g-4 align-items-start">
    <div class="col-12 col-md-2 order-2 order-md-1">
         {{-- NOTA (Bootstrap): nav + nav-link; NOTA (app.css): .sidebar, .sidebar-link. --}}
         {{-- NOTA (contenido): ítems alineados al menú “Investigación” del portal oficial de la FES Acatlán. --}}
         <aside class="bg-unam text-white sidebar sidebar-compact py-3 px-0 shadow-lg" aria-label="Navegación investigación UIM">

            <h5 class="text-center border-bottom pb-2 px-2 small text-uppercase text-white-50">Investigación</h5>

            <div class="mt-3 px-2">
                <ul class="nav flex-column mt-2">
                    <li class="nav-item">
                        <a class="nav-link text-white sidebar-link py-2" href="{{ url('/') }}#uim-proposito">Propósito</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white sidebar-link py-2" href="{{ url('/investigacion') }}">Seminarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white sidebar-link py-2" href="{{ url('/departamento') }}">Departamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white sidebar-link py-2" href="{{ config('uim.urls.revista_figuras') }}" target="_blank" rel="noopener noreferrer">Revista FIGURAS</a>
                    </li>
                </ul>
            </div>

        </aside>



    </div>
        {{-- NOTA (Bootstrap): orden order-1 en móvil para mostrar el bloque principal arriba. --}}
        <div class="col-12 col-md-8 order-1 order-md-2">
                            <div class="bloque-principal1 p-3 p-md-4 text-body-secondary">
                        <div class="row">

                            <div class="col-md-8">

                                {{-- NOTA: id para ancla desde el menú lateral (#uim-proposito), patrón típico en sitios institucionales. --}}
                                {{-- NOTA (Bootstrap): text-warning = acento dorado del tema; lead = párrafo de entrada. --}}
                                <h3 id="uim-proposito" class="text-warning fw-bold mb-2">
                                    UIM — Propósito de la investigación
                                </h3>
                                <p class="lead fs-6 text-body-secondary mb-3">
                                    La <strong class="text-body">Unidad de Investigación Multidisciplinaria (UIM)</strong> de la
                                    <strong class="text-body">FES Acatlán — UNAM</strong> articula esfuerzos de generación de conocimiento
                                    en coherencia con las líneas de la Universidad y del portal de la Facultad.
                                </p>

                                <p class="text-body">
                                    La Facultad de Estudios Superiores Acatlán, como entidad académica de la Universidad
                                    Nacional Autónoma de México, desarrolla actividades de investigación orientadas al
                                    fortalecimiento de la vida académica, promoviendo la generación de conocimiento y su
                                    integración con las funciones sustantivas de la Universidad.
                                </p>

                                <h5 class="text-warning mt-4">Objetivo</h5>

                                <p class="text-body">
                                    Vincular la investigación con la atención y solución de problemáticas nacionales,
                                    fomentando su integración con la docencia y la difusión de la cultura. Asimismo,
                                    impulsar la formación y consolidación de profesores de carrera dedicados a la
                                    investigación, fortaleciendo la relación entre la generación de conocimiento y el
                                    proceso educativo.
                                </p>

                                <h5 class="text-warning mt-4">Funciones</h5>

                                <ul>
                                    <li>
                                        Desarrollar investigación interdisciplinaria, multidisciplinaria y
                                        especializada, enfocada prioritariamente en el apoyo a la docencia y en la
                                        atención de problemáticas nacionales.
                                    </li>
                                    <li>
                                        Generar y aportar conocimiento científico en las áreas sociales, humanísticas y
                                        de las ciencias exactas.
                                    </li>
                                    <li>
                                        Brindar apoyo a las actividades de docencia e investigación tanto en la
                                        Universidad Nacional Autónoma de México como en otras instituciones de carácter
                                        nacional.
                                    </li>
                                </ul>

                            </div>

                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                <img src="{{ asset('dashboard/investigacion.jpg') }}" class="img-fluid rounded shadow"
                                    alt="Investigación UIM">
                            </div>

                        </div>

                    </div>
    </div>
        <div class="col-12 col-md-2 order-3 uim-carousel-side">
           {{-- NOTA (app.css): .uim-carousel-side reduce ancho de flechas del carousel lateral. --}}
           {{-- NOTA (contenido): tres tarjetas por slide, sin duplicar “Investigación”; enlaces coherentes con el menú del portal FES. --}}
           <div id="tarjetasCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="d-flex flex-column gap-3">
                                    <div class="bloque-sec p-3 rounded expandable">
                                        <h6 class="mb-2">Propósito</h6>
                                        <p class="resumen mb-0">
                                            Marco general de la investigación en la FES Acatlán y el vínculo con la docencia y la cultura.
                                        </p>
                                        <div class="extra">
                                            <p class="small mb-0 mt-2">
                                                Consulta el texto completo en el bloque principal o desde el menú lateral.
                                            </p>
                                        </div>
                                        <div class="d-flex flex-wrap gap-2 mt-2">
                                            <button type="button" class="btn btn-light btn-sm btn-toggle">Ver más</button>
                                            <a href="{{ url('/') }}#uim-proposito" class="btn btn-warning btn-sm">Ir al propósito</a>
                                        </div>
                                    </div>

                                    <div class="bloque-sec p-3 rounded expandable">
                                        <h6 class="mb-2">Seminarios de investigación</h6>
                                        <p class="resumen mb-0">
                                            Espacios académicos para el diálogo y la formación en investigación en la UIM.
                                        </p>
                                        <div class="extra">
                                            <p class="small mb-0 mt-2">
                                                Listado y filtros en la sección Seminarios (vista propia del proyecto Laravel).
                                            </p>
                                        </div>
                                        <div class="d-flex flex-wrap gap-2 mt-2">
                                            <button type="button" class="btn btn-light btn-sm btn-toggle">Ver más</button>
                                            <a href="{{ url('/investigacion') }}" class="btn btn-warning btn-sm">Ir a seminarios</a>
                                        </div>
                                    </div>

                                    <div class="bloque-sec p-3 rounded expandable">
                                        <h6 class="mb-2">Departamentos</h6>
                                        <p class="resumen mb-0">
                                            Líneas de trabajo por áreas del conocimiento al interior de la Facultad.
                                        </p>
                                        <div class="extra">
                                            <p class="small mb-0 mt-2">
                                                Ejemplos de ámbitos: ciencias sociales, humanidades, exactas y disciplinas afines.
                                            </p>
                                        </div>
                                        <div class="d-flex flex-wrap gap-2 mt-2">
                                            <button type="button" class="btn btn-light btn-sm btn-toggle">Ver más</button>
                                            <a href="{{ url('/departamento') }}" class="btn btn-warning btn-sm">Ir a departamentos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="d-flex flex-column gap-3">
                                    <div class="bloque-sec p-3 rounded expandable">
                                        <h6 class="mb-2">Revista FIGURAS</h6>
                                        <p class="resumen mb-0">
                                            Revista académica de investigación editada en la FES Acatlán — UNAM.
                                        </p>
                                        <div class="extra">
                                            <p class="small mb-0 mt-2">
                                                Publicación cuatrimestral; difusión de artículos y ensayos en varias áreas del conocimiento.
                                            </p>
                                        </div>
                                        <div class="d-flex flex-wrap gap-2 mt-2">
                                            <button type="button" class="btn btn-light btn-sm btn-toggle">Ver más</button>
                                            <a href="{{ config('uim.urls.revista_figuras') }}" class="btn btn-warning btn-sm" target="_blank" rel="noopener noreferrer">Abrir revista</a>
                                        </div>
                                    </div>

                                    <div class="bloque-sec p-3 rounded expandable">
                                        <h6 class="mb-2">Sitio institucional UIM</h6>
                                        <p class="resumen mb-0">
                                            Información oficial de la Unidad en el portal de la FES Acatlán.
                                        </p>
                                        <div class="extra">
                                            <p class="small mb-0 mt-2">
                                                Útil para contrastar este demo Laravel con las páginas administradas por la Facultad.
                                            </p>
                                        </div>
                                        <div class="d-flex flex-wrap gap-2 mt-2">
                                            <button type="button" class="btn btn-light btn-sm btn-toggle">Ver más</button>
                                            <a href="{{ config('uim.urls.uim_oficial') }}" class="btn btn-warning btn-sm" target="_blank" rel="noopener noreferrer">Portal FES (UIM)</a>
                                        </div>
                                    </div>

                                    <div class="bloque-sec p-3 rounded expandable">
                                        <h6 class="mb-2">Facultad de Estudios Superiores Acatlán</h6>
                                        <p class="resumen mb-0">
                                            Portal general: trámites, cultura, deportes, posgrado e investigación.
                                        </p>
                                        <div class="extra">
                                            <p class="small mb-0 mt-2">
                                                Referencia: menú <em>Investigación</em> en el sitio oficial.
                                            </p>
                                        </div>
                                        <div class="d-flex flex-wrap gap-2 mt-2">
                                            <button type="button" class="btn btn-light btn-sm btn-toggle">Ver más</button>
                                            <a href="{{ config('uim.urls.portal_fes') }}" class="btn btn-warning btn-sm" target="_blank" rel="noopener noreferrer">Portal FES Acatlán</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Controles del carrusel -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#tarjetasCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#tarjetasCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>

                    {{-- NOTA (Bootstrap): btn + w-100. Enlaces a recursos reales (portal FES y revista oficial). --}}
                    <div class="d-flex flex-column gap-2 mt-3">
                        <a href="{{ config('uim.urls.uim_oficial') }}" class="btn btn-warning btn-sm w-100" target="_blank" rel="noopener noreferrer">Sitio UIM en la FES</a>
                        <a href="{{ config('uim.urls.revista_figuras') }}" class="btn btn-outline-secondary btn-sm w-100" target="_blank" rel="noopener noreferrer">Revista FIGURAS</a>
                    </div>
                </div>

    {{-- NOTA (Bootstrap): fila completa para carrusel de tarjetas; NOTA (app.css): .uim-events-section márgenes. --}}
    <div class="col-12 uim-events-section">
            <h5 class="text-warning fw-bold mb-2">Eventos y difusión</h5>
            <p class="text-body-secondary small mb-3">
                {{-- NOTA (docencia): imágenes y títulos de muestra; en producción sustituir por datos desde base de datos o CMS. --}}
                Formato de carrusel para convocatorias, seminarios o cultura (similar a los bloques de avisos del portal de la FES Acatlán).
            </p>

            <div id="eventosCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Primera fila de eventos -->
                    <div class="carousel-item active">
                        <div class="row g-2">
                            <div class="col">
                                <a href="" class="text-decoration-none">
                                    <div class="card bloque-evento shadow-sm border-top border-warning border-3 h-100">
                                        <img src="{{ asset('dashboard/img1.jpg') }}" class="card-img-top evento-img" alt="Evento">
                                        <div class="card-body p-2 text-center">
                                            <h6 class="card-title mb-0 text-dark">Evento</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="" class="text-decoration-none">
                                    <div class="card bloque-evento shadow-sm border-top border-warning border-3 h-100">
                                        <img src="{{ asset('dashboard/img2.jpg') }}" class="card-img-top evento-img" alt="Seminario">
                                        <div class="card-body p-2 text-center">
                                            <h6 class="card-title mb-0 text-dark">Seminario</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="" class="text-decoration-none">
                                    <div class="card bloque-evento shadow-sm border-top border-warning border-3 h-100">
                                        <img src="{{ asset('dashboard/img3.jpg') }}" class="card-img-top evento-img" alt="Congreso">
                                        <div class="card-body p-2 text-center">
                                            <h6 class="card-title mb-0 text-dark">Congreso</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="" class="text-decoration-none">
                                    <div class="card bloque-evento shadow-sm border-top border-warning border-3 h-100">
                                        <img src="{{ asset('dashboard/img1.jpg') }}" class="card-img-top evento-img" alt="Taller">
                                        <div class="card-body p-2 text-center">
                                            <h6 class="card-title mb-0 text-dark">Taller</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="" class="text-decoration-none">
                                    <div class="card bloque-evento shadow-sm border-top border-warning border-3 h-100">
                                        <img src="{{ asset('dashboard/img2.jpg') }}" class="card-img-top evento-img" alt="Conferencia">
                                        <div class="card-body p-2 text-center">
                                            <h6 class="card-title mb-0 text-dark">Conferencia</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    
                    <!-- Segunda fila de eventos (puedes agregar más) -->
                    <div class="carousel-item">
                        <div class="row g-2">
                            <div class="col">
                                <a href="" class="text-decoration-none">
                                    <div class="card bloque-evento shadow-sm border-top border-warning border-3 h-100">
                                        <img src="{{ asset('dashboard/img3.jpg') }}" class="card-img-top evento-img" alt="Simposio">
                                        <div class="card-body p-2 text-center">
                                            <h6 class="card-title mb-0 text-dark">Simposio</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="" class="text-decoration-none">
                                    <div class="card bloque-evento shadow-sm border-top border-warning border-3 h-100">
                                        <img src="{{ asset('dashboard/img1.jpg') }}" class="card-img-top evento-img" alt="Panel">
                                        <div class="card-body p-2 text-center">
                                            <h6 class="card-title mb-0 text-dark">Panel</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="" class="text-decoration-none">
                                    <div class="card bloque-evento shadow-sm border-top border-warning border-3 h-100">
                                        <img src="{{ asset('dashboard/img2.jpg') }}" class="card-img-top evento-img" alt="Foro">
                                        <div class="card-body p-2 text-center">
                                            <h6 class="card-title mb-0 text-dark">Foro</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="" class="text-decoration-none">
                                    <div class="card bloque-evento shadow-sm border-top border-warning border-3 h-100">
                                        <img src="{{ asset('dashboard/img3.jpg') }}" class="card-img-top evento-img" alt="Taller">
                                        <div class="card-body p-2 text-center">
                                            <h6 class="card-title mb-0 text-dark">Taller</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="" class="text-decoration-none">
                                    <div class="card bloque-evento shadow-sm border-top border-warning border-3 h-100">
                                        <img src="{{ asset('dashboard/img1.jpg') }}" class="card-img-top evento-img" alt="Exposición">
                                        <div class="card-body p-2 text-center">
                                            <h6 class="card-title mb-0 text-dark">Exposición</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Controles del carrusel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#eventosCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#eventosCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
        
</div>
</div>



@push('scripts')
    <script>
    {{-- NOTA (JS vanilla): alterna clase .activo definida en app.css sobre .expandable; sin dependencias extra. --}}
    document.querySelectorAll(".btn-toggle").forEach(btn => {
        btn.addEventListener("click", function() {
            const box = this.closest(".expandable");

            box.classList.toggle("activo");

            this.textContent = box.classList.contains("activo") ? "Ver menos" : "Ver más";
        });
    });
    </script>
@endpush

@endsection