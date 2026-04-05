{{-- NOTA (Blade): layout maestro. @extends('layouts.app') + @section('content') en cada vista. --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- NOTA (Blade): título por vista con @section('title', '...'); fallback si no se define. --}}
    <title>@yield('title', 'UIM FES Acatlán — UNAM')</title>

    {{-- NOTA (Bootstrap): hoja CSS oficial 5.3 + iconos. --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    {{-- NOTA (Laravel + Vite): CSS/JS del proyecto; variables UNAM y componentes propios en app.css. --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
{{-- NOTA (Bootstrap): d-flex flex-column min-vh-100 = columna de altura mínima viewport; footer queda abajo en páginas cortas. --}}
<body class="bg-light d-flex flex-column min-vh-100">
    {{-- NOTA (Estilo propio / app.css): .uim-site-head-sticky mantiene header + subbarra visibles al hacer scroll. --}}
    {{-- NOTA (Blade): @section('subnav') opcional en vistas (p. ej. welcome); si no existe, solo se muestra el header. --}}
    <div class="uim-site-head-sticky">
        {{-- NOTA (Bootstrap): bg-unam (app.css), shadow-sm; borde dorado en .uim-header-institutional. --}}
        <header class="bg-unam text-white shadow-sm uim-header-institutional">
            <div class="container-fluid px-3 px-lg-4">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 py-3">
                    <div class="d-flex align-items-center gap-2 gap-md-3 order-md-1">
                        <img src="{{ asset('header/logo_unam.png') }}" class="logo" alt="UNAM">
                    </div>
                    <h1 class="h4 mb-0 text-center flex-grow-1 fw-bold order-md-2 px-2">
                        Unidad de Investigación Multidisciplinaria
                    </h1>
                    <div class="d-flex align-items-center gap-2 order-md-3">
                        <img src="{{ asset('header/logo_unam_fesa.png') }}" class="logo" alt="FES Acatlán">
                    </div>
                </div>
            </div>
        </header>
        @hasSection('subnav')
            @yield('subnav')
        @endif
    </div>

    {{-- NOTA (Bootstrap): flex-grow-1 empuja el footer hacia abajo dentro del body flex. --}}
    <main class="flex-grow-1">
        @yield('content')
    </main>

    {{-- NOTA (Bootstrap): grid row/col, g-4, utilidades de texto y botones. --}}
    {{-- NOTA (Estilo propio / app.css): .uim-footer-institutional = borde dorado superior. --}}
    {{-- NOTA (contenido): enlaces y contacto desde config('uim.*'); ver docs/GUIA_CONTENIDO_UIM.md --}}
    <footer class="bg-unam text-white mt-auto shadow uim-footer-institutional">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="row g-4 align-items-start">
                <div class="col-md-4">
                    <h5 class="text-warning mb-3">UIM FES Acatlán</h5>
                    <p class="small mb-2 text-white-50">Unidad de Investigación Multidisciplinaria</p>
                    <p class="small mb-3 text-white-50">FES Acatlán - UNAM</p>
                    {{-- NOTA: URLs en config/uim.php → redes_sociales.* (o .env UIM_REDES_*). Valor # = pendiente por UNAM. --}}
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ config('uim.redes_sociales.facebook') }}" class="text-white text-decoration-none" aria-label="Facebook"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="{{ config('uim.redes_sociales.twitter') }}" class="text-white text-decoration-none" aria-label="X (Twitter)"><i class="bi bi-twitter fs-5"></i></a>
                        <a href="{{ config('uim.redes_sociales.instagram') }}" class="text-white text-decoration-none" aria-label="Instagram"><i class="bi bi-instagram fs-5"></i></a>
                        <a href="{{ config('uim.redes_sociales.youtube') }}" class="text-white text-decoration-none" aria-label="YouTube"><i class="bi bi-youtube fs-5"></i></a>
                        <a href="{{ config('uim.redes_sociales.spotify') }}" class="text-white text-decoration-none" aria-label="Spotify"><i class="bi bi-spotify fs-5"></i></a>
                    </div>
                </div>
                {{-- NOTA: misma lógica que welcome (menú Investigación FES). URLs externas → config('uim.urls.*'). --}}
                <div class="col-md-4 col-lg-5">
                    <h5 class="text-warning mb-3">Enlaces rápidos</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled small mb-0">
                                <li class="mb-2"><a href="{{ route('home') }}" class="text-white text-decoration-none">Inicio</a></li>
                                <li class="mb-2"><a href="{{ route('home') }}#uim-proposito" class="text-white text-decoration-none">Propósito</a></li>
                                <li class="mb-2"><a href="{{ route('home') }}#uim-congresos" class="text-white text-decoration-none">Congresos</a></li>
                                <li class="mb-2"><a href="{{ url('/investigacion') }}" class="text-white text-decoration-none">Seminarios</a></li>
                                <li class="mb-2"><a href="{{ url('/departamento') }}" class="text-white text-decoration-none">Departamentos</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled small mb-0">
                                <li class="mb-2"><a href="{{ config('uim.urls.revista_figuras') }}" class="text-white text-decoration-none" target="_blank" rel="noopener noreferrer">Revista FIGURAS</a></li>
                                <li class="mb-2"><a href="{{ config('uim.urls.uim_oficial') }}" class="text-white text-decoration-none" target="_blank" rel="noopener noreferrer">Sitio UIM (FES)</a></li>
                                <li class="mb-2"><a href="{{ config('uim.urls.portal_fes') }}" class="text-white text-decoration-none" target="_blank" rel="noopener noreferrer">Portal FES Acatlán</a></li>
                                <li class="mb-2"><a href="{{ config('uim.urls.publicaciones') }}" class="text-white text-decoration-none">Publicaciones</a></li>
                                <li class="mb-2"><a href="{{ config('uim.urls.convocatorias') }}" class="text-white text-decoration-none">Convocatorias</a></li>
                                <li class="mb-2"><a href="{{ config('uim.urls.podcast_uim') }}" class="text-white text-decoration-none">Podcast UIM</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <h5 class="text-warning mb-3">Contacto</h5>
                    {{-- NOTA: textos en config/uim.php → contacto.* --}}
                    <ul class="list-unstyled small mb-3">
                        <li class="mb-2"><i class="bi bi-geo-alt me-2 text-warning"></i>{{ config('uim.contacto.direccion') }}</li>
                        <li class="mb-2">
                            <i class="bi bi-globe me-2 text-warning"></i>
                            <a href="{{ config('uim.urls.uim_oficial') }}" class="text-white-50 text-decoration-none" target="_blank" rel="noopener noreferrer">{{ config('uim.contacto.web_etiqueta') }}</a>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-telephone me-2 text-warning"></i>
                            <a href="{{ config('uim.contacto.telefono_enlace') }}" class="text-white-50 text-decoration-none">{{ config('uim.contacto.telefono') }}</a>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-envelope me-2 text-warning"></i>
                            <a href="mailto:{{ config('uim.contacto.correo') }}" class="text-white-50 text-decoration-none">{{ config('uim.contacto.correo') }}</a>
                        </li>
                    </ul>
                    {{-- NOTA (Bootstrap): btn-outline-light y btn-warning; el color dorado del warning viene del override .btn-warning en app.css. --}}
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ config('uim.urls.contacto_formulario') }}" class="btn btn-outline-light btn-sm">Contacto</a>
                        <a href="{{ config('uim.urls.informacion') }}" class="btn btn-warning btn-sm">Información</a>
                    </div>
                </div>
            </div>

            <hr class="border-secondary border-opacity-25 my-4">

            <p class="text-center small mb-0 text-white-50">
                <i class="bi bi-c-circle me-1"></i>
                Hecho en México, todos los derechos reservados 2026 — UNAM
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
