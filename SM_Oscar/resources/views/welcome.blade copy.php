@extends('layouts.app')
@section('content')
<section class="bg-secondary-subtle bloque-carrucel d-flex align-items-center">
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">

            <div class="carousel-item active" data-bs-interval="3000">
                <img src="{{ asset('dashboard/img1.jpg') }}" class="d-block w-100" alt="slide1">
                <div class="carousel-caption">
                    <h2 class="slide-title">UIM Fes acatlan</h2>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="3000">
                <img src="{{ asset('dashboard/img2.jpg') }}" class="d-block w-100" alt="slide2">
                <div class="carousel-caption">
                    <h2 class="slide-title">carrucel de fotos</h2>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="3000">
                <img src="{{ asset('dashboard/img3.jpg') }}" class="d-block w-100" alt="slide3">
                <div class="carousel-caption">
                    <h2 class="slide-title">prueba de trancision</h2>
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

<div class="container-fluid">
    <br>
    <div class="row">

        <aside class="col-2 bg-unam text-white sidebar sidebar-compact py-3 px-0 shadow-lg">

            <h5 class="text-center border-bottom pb-2">Menú</h5>

            <div class="mt-4 px-2">
                <ul class="nav flex-column mt-2">
                    <li class="nav-item">
                        <a class="nav-link text-white sidebar-link" href="{{ url('/investigacion') }}">Investigación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white sidebar-link" href="{{ url('/departamento') }}">Departamentos</a>
                    </li>
                </ul>
            </div>

        </aside>

        <div class="col-md-10 py-3">

            <div class="row g-3 mb-3">

                <div class="col-md-9">

                    <div class="bloque-principal1 p-3 text-grey">
                        <div class="row">

                            <div class="col-md-8">

                                <h3 class="text-warning fw-bold mb-3">
                                    UIM — Propósito de la Investigación
                                </h3>

                                <p>
                                    La Facultad de Estudios Superiores Acatlán, como entidad académica de la Universidad
                                    Nacional Autónoma de México, desarrolla actividades de investigación orientadas al
                                    fortalecimiento de la vida académica, promoviendo la generación de conocimiento y su
                                    integración con las funciones sustantivas de la Universidad.
                                </p>

                                <h5 class="text-warning mt-4">Objetivo</h5>

                                <p>
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

                <div class="col-3 d-flex flex-column gap-3">
                    <!-- Carrusel horizontal de tarjetas laterales -->
                    <div id="tarjetasCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Primera fila de tarjetas -->
                            <div class="carousel-item active">
                                <div class="d-flex flex-column gap-3">
                                    <!-- INVESTIGACIÓN -->
                                    <div class="bloque-sec p-3 text-white rounded expandable">
                                        <h6>Investigación</h6>
                                        <p class="resumen">
                                            La FES Acatlán desarrolla actividades de investigación para integrarlas en la vida académica.
                                        </p>
                                        <div class="extra">
                                            <p>
                                                Se busca que la investigación ayude a resolver problemas reales y se relacione con la docencia.
                                            </p>
                                        </div>
                                        <div class="d-flex gap-2 mt-2">
                                            <button class="btn btn-light btn-sm btn-toggle">Ver más</button>
                                            <a href="investigacion.html" class="btn btn-warning btn-sm">Ir</a>
                                        </div>
                                    </div>

                                    <!-- SECCIÓN -->
                                    <div class="bloque-sec p-3 text-white rounded expandable">
                                        <h6>Dep. de Investigacion</h6>
                                        <h6>Proyecto cultural</h6>
                                        <p class="resumen">
                                            Participación en proyectos culturales y digitales dentro de la facultad.
                                        </p>
                                        <div class="extra">
                                            <ul>
                                                <li>Trabajo colaborativo</li>
                                                <li>Interés cultural</li>
                                            </ul>
                                        </div>
                                        <div class="d-flex gap-2 mt-2">
                                            <button class="btn btn-light btn-sm btn-toggle">Ver más</button>
                                            <a href="seccion.html" class="btn btn-warning btn-sm">Ir</a>
                                        </div>
                                    </div>

                                    <!-- INVESTIGACIÓN (duplicado original) -->
                                    <div class="bloque-sec p-3 text-white rounded expandable">
                                        <h6>Investigación</h6>
                                        <p class="resumen">
                                            La FES Acatlán desarrolla actividades de investigación para integrarlas en la vida académica.
                                        </p>
                                        <div class="extra">
                                            <p>
                                                Se busca que la investigación ayude a resolver problemas reales y se relacione con la docencia.
                                            </p>
                                        </div>
                                        <div class="d-flex gap-2 mt-2">
                                            <button class="btn btn-light btn-sm btn-toggle">Ver más</button>
                                            <a href="investigacion.html" class="btn btn-warning btn-sm">Ir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Segunda fila de tarjetas (nuevas opciones) -->
                            <div class="carousel-item">
                                <div class="d-flex flex-column gap-3">
                                    <!-- DEPARTAMENTOS -->
                                    <div class="bloque-sec p-3 text-white rounded expandable">
                                        <h6>Departamentos</h6>
                                        <p class="resumen">
                                            Conoce los diferentes departamentos de investigación de la FES Acatlán.
                                        </p>
                                        <div class="extra">
                                            <ul>
                                                <li>Derecho</li>
                                                <li>Economía</li>
                                                <li>Humanidades</li>
                                            </ul>
                                        </div>
                                        <div class="d-flex gap-2 mt-2">
                                            <button class="btn btn-light btn-sm btn-toggle">Ver más</button>
                                            <a href="{{ url('/departamento') }}" class="btn btn-warning btn-sm">Ir</a>
                                        </div>
                                    </div>

                                    <!-- PROYECTOS -->
                                    <div class="bloque-sec p-3 text-white rounded expandable">
                                        <h6>Proyectos</h6>
                                        <p class="resumen">
                                            Proyectos de investigación activos y en desarrollo en la unidad.
                                        </p>
                                        <div class="extra">
                                            <ul>
                                                <li>Proyecto multidisciplinario</li>
                                                <li>Investigación aplicada</li>
                                                <li>Colaboración internacional</li>
                                            </ul>
                                        </div>
                                        <div class="d-flex gap-2 mt-2">
                                            <button class="btn btn-light btn-sm btn-toggle">Ver más</button>
                                            <a href="#" class="btn btn-warning btn-sm">Ir</a>
                                        </div>
                                    </div>

                                    <!-- PUBLICACIONES -->
                                    <div class="bloque-sec p-3 text-white rounded expandable">
                                        <h6>Publicaciones</h6>
                                        <p class="resumen">
                                            Artículos, libros y revistas científicas publicadas por nuestros investigadores.
                                        </p>
                                        <div class="extra">
                                            <ul>
                                                <li>Artículos indexados</li>
                                                <li>Libros académicos</li>
                                                <li>Revistas científicas</li>
                                            </ul>
                                        </div>
                                        <div class="d-flex gap-2 mt-2">
                                            <button class="btn btn-light btn-sm btn-toggle">Ver más</button>
                                            <a href="#" class="btn btn-warning btn-sm">Ir</a>
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

                    <div class="d-flex flex-column gap-2 mt-3">
                        <button class="btn btn-warning btn-sm w-100">Petar</button>
                        <button class="btn btn-warning btn-sm w-100">Revista Figuras</button>
                    </div>
                </div>

                <!-- Botones adicionales -->

            </div>

        </div>

        <div class="col-12">
            <h5>Eventos</h5>
            
            <!-- Carrusel horizontal de eventos -->
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


@push('scripts')
    <script>
    // toggle de ver más (funciona bien, no moverle mucho)
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