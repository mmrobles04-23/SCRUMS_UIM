<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UIM FES Acatlán — UNAM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">

<!-- HEADER -->
<header class="bg-unam text-white py-3 shadow">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <img src="{{ asset('header/logo_unam.png') }}" class="logo" alt="UNAM">

        <h1 class="h4 mb-0 text-center flex-grow-1 fw-bold">
            Unidad de Investigación Multidisciplinaria
        </h1>

        <img src="{{ asset('header/logo_unam_fesa.png') }}" class="logo" alt="FES Acatlán">

    </div>
</header>

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
                    <h2 class="slide-title">orueba de trancision</h2>
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
    <div class="row">

        <aside class="col-2 bg-unam text-white sidebar py-3 px-0 shadow-lg">

            <h5 class="text-center border-bottom pb-2">Menú</h5>

            <ul class="nav flex-column px-2 mt-3">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/') }}">🏠 Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('web.dashboard') }}">📊 Dashboard</a>
                </li>
            </ul>

            <div class="mt-4 px-2">
                <h6 class="text-warning">Secciones UIM</h6>

                <ul class="nav flex-column mt-2">
                    <li class="nav-item">
                        <a class="nav-link text-white sidebar-link" href="#">📊 Líneas de investigación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white sidebar-link" href="#">📁 Proyectos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white sidebar-link" href="#">👩‍🏫 Cuerpos académicos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white sidebar-link" href="#">📚 Publicaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white sidebar-link" href="#">📢 Convocatorias</a>
                    </li>
                </ul>
            </div>

        </aside>

        <div class="col-10 py-3">

            <div class="row g-3 mb-3">

                <div class="col-9">

                    <div class="bg-unam text-white rounded p-4 bloque-uim shadow-lg">
                        <div class="row">

                            <div class="col-md-8">

                                <h3 class="text-warning fw-bold mb-3">
                                    UIM — Propósito de la Investigación
                                </h3>

                                <p>
                                    La Facultad de Estudios Superiores Acatlán, como entidad académica de la Universidad Nacional Autónoma de México, desarrolla actividades de investigación orientadas al fortalecimiento de la vida académica, promoviendo la generación de conocimiento y su integración con las funciones sustantivas de la Universidad.
                                </p>

                                <h5 class="text-warning mt-4">Objetivo</h5>

                                <p>
                                    Vincular la investigación con la atención y solución de problemáticas nacionales, fomentando su integración con la docencia y la difusión de la cultura. Asimismo, impulsar la formación y consolidación de profesores de carrera dedicados a la investigación, fortaleciendo la relación entre la generación de conocimiento y el proceso educativo.
                                </p>

                                <h5 class="text-warning mt-4">Funciones</h5>

                                <ul>
                                    <li>
                                        Desarrollar investigación interdisciplinaria, multidisciplinaria y especializada, enfocada prioritariamente en el apoyo a la docencia y en la atención de problemáticas nacionales.
                                    </li>
                                    <li>
                                        Generar y aportar conocimiento científico en las áreas sociales, humanísticas y de las ciencias exactas.
                                    </li>
                                    <li>
                                        Brindar apoyo a las actividades de docencia e investigación tanto en la Universidad Nacional Autónoma de México como en otras instituciones de carácter nacional.
                                    </li>
                                </ul>

                            </div>

                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                <img src="{{ asset('dashboard/investigacion.jpg') }}"
                                     class="img-fluid rounded shadow"
                                     alt="Investigación UIM">
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-3 d-flex flex-column gap-3">

                    <div class="bg-unam text-white rounded p-3 bloque-seccion shadow">
                        <h5>Investigación</h5>
                        <p class="small">Proyectos y líneas de investigación.</p>
                    </div>

                    <div class="bg-unam text-white rounded p-3 bloque-seccion shadow">
                        <h5>Convocatorias</h5>
                        <p class="small">Oportunidades académicas.</p>
                    </div>

                </div>

            </div>

            <div class="row g-3">

                <div class="col-9">
                    <div class="row g-2">

                        <div class="col">
                            <div class="card bloque-evento shadow-sm border-top border-warning border-3 p-2">Evento</div>
                        </div>

                        <div class="col">
                            <div class="card bloque-evento shadow-sm border-top border-warning border-3 p-2">Seminario</div>
                        </div>

                        <div class="col">
                            <div class="card bloque-evento shadow-sm border-top border-warning border-3 p-2">Congreso</div>
                        </div>

                        <div class="col">
                            <div class="card bloque-evento shadow-sm border-top border-warning border-3 p-2">Taller</div>
                        </div>

                        <div class="col">
                            <div class="card bloque-evento shadow-sm border-top border-warning border-3 p-2">Conferencia</div>
                        </div>

                    </div>
                </div>

                <div class="col-3">
                    <div class="bg-unam text-white rounded p-3 h-100 shadow">
                        <h5>Noticias</h5>
                        <p class="small">Actualizaciones recientes.</p>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<footer class="bg-unam text-white pt-4 pb-3 mt-3">
    <div class="container-fluid">
        <p class="text-center text-secondary small">
            Hecho en México, todos los derechos reservados 2026.
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
