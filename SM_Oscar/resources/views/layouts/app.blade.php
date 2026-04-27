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
{{-- NOTA (Bootstrap): d-flex flex-column min-vh-100 = columna de altura mínima viewport; footer queda abajo en páginas
cortas. --}}

<body class="bg-light d-flex flex-column min-vh-100">
    {{-- NOTA (Estilo propio / app.css): .uim-site-head-sticky mantiene header + subbarra visibles al hacer scroll. --}}
    {{-- NOTA (Blade): @section('subnav') opcional en vistas (p. ej. welcome); si no existe, solo se muestra el header.
    --}}
    <div class="uim-site-head-sticky">
        {{-- NOTA (Bootstrap): bg-unam (app.css), shadow-sm; borde dorado en .uim-header-institutional. --}}
        <header class="bg-unam text-white shadow-sm uim-header-institutional">
            <div class="container-fluid px-3 px-lg-4">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 py-3">
                    <div class="d-none d-md-flex align-items-center gap-3 order-md-1">
                        <a href="{{ url('/') }}" class="text-decoration-none hover-zoom-btn">
                            <img src="{{ asset('header/UIMA-negro_logo.png') }}" class="logo-uima" alt="UNAM"
                                style="transition: transform 0.3s ease-in-out;">
                        </a>
                    </div>
                    <h1 class="h4 mb-0 text-center flex-grow-1 fw-bold order-md-2 px-2">
                        <span class="d-md-none tracking-widest fs-3">UIMA</span>
                        <span class="d-none d-md-inline">Unidad de Investigación Multidisciplinaria Aplicada</span>
                    </h1>
                    <div class="d-none d-md-flex align-items-center gap-2 order-md-3">
                        <a href="{{ config('uim.urls.portal_fes') }}" target="_blank" rel="noopener noreferrer"
                            class="text-decoration-none hover-zoom-btn">
                            <img src="{{ asset('header/logo_unam_fesa.png') }}" class="logo" alt="FES Acatlán"
                                style="transition: transform 0.2s ease-in-out;">
                        </a>
                    </div>
                </div>
            </div>
            <style>
                .hover-zoom-btn:hover img {
                    transform: scale(1.05);
                }

                .hover-zoom-btn:active img {
                    transform: scale(0.95);
                }
            </style>
        </header>
        @hasSection('subnav')
            @yield('subnav')
        @endif
    </div>

    {{-- NOTA (Bootstrap): flex-grow-1 empuja el footer hacia abajo dentro del body flex. --}}
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer class="footer-uim-premium text-white mt-auto">
        <div class="container-fluid px-4 px-lg-5 pt-5 pb-5 position-relative z-1">
            <div class="row g-4 align-items-stretch text-center text-lg-start">

                <!-- Col 1 -->
                <div class="col-lg-4 d-flex flex-column pe-lg-4 align-items-center align-items-lg-start">
                    <div class="d-flex flex-column flex-lg-row align-items-center align-items-lg-start gap-3 mb-4">
                        <img src="{{ asset('header/UIMA-negro_logo.png') }}" class="mb-2 mb-lg-0" alt="UNAM UIMA"
                            style="width: 70px; filter: brightness(0) invert(1);">
                        <div>
                            <h5 class="text-warning text-uppercase mb-1 fw-bold tracking-widest fs-6">UIMA FES Acatlán
                            </h5>
                            <p class="small text-white-50 mb-0 font-body">Unidad de Investigación
                                Multidisciplinaria<br>FES Acatlán • UNAM</p>
                        </div>
                    </div>
                    <p class="small text-white-50 mb-4 font-body pe-md-4">
                        Impulsamos la investigación multidisciplinaria para generar conocimiento que transforme la
                        sociedad.
                    </p>
                    <div class="d-flex justify-content-center justify-content-lg-start flex-wrap gap-2 mt-auto">
                        <a href="{{ config('uim.redes_sociales.facebook') }}"
                            class="footer-social-icon text-decoration-none" aria-label="Facebook"><i
                                class="bi bi-facebook"></i></a>
                        <a href="{{ config('uim.redes_sociales.twitter') }}"
                            class="footer-social-icon text-decoration-none" aria-label="X (Twitter)"><i
                                class="bi bi-twitter-x"></i></a>
                        <a href="{{ config('uim.redes_sociales.instagram') }}"
                            class="footer-social-icon text-decoration-none" aria-label="Instagram"><i
                                class="bi bi-instagram"></i></a>
                        <a href="{{ config('uim.redes_sociales.youtube') }}"
                            class="footer-social-icon text-decoration-none" aria-label="YouTube"><i
                                class="bi bi-youtube"></i></a>
                        <a href="{{ config('uim.urls.podcast_uim') }}" class="footer-social-icon text-decoration-none"
                            aria-label="Spotify" target="_blank" rel="noopener noreferrer"><i
                                class="bi bi-spotify"></i></a>
                    </div>
                </div>

                <!-- Col 2 -->
                <div
                    class="col-lg-4 border-uim-responsive px-lg-5 py-4 py-lg-0 d-flex flex-column align-items-center align-items-lg-start">
                    <h5 class="text-warning text-uppercase mb-3 fw-bold tracking-widest fs-6">Podcast UIMA</h5>
                    <p class="small text-white-50 mb-4 font-body text-center text-lg-start">
                        Escucha nuestros episodios sobre investigación multidisciplinaria y proyectos destacados de la
                        FES Acatlán.
                    </p>
                    <div class="mt-auto">
                        <a href="{{ config('uim.urls.podcast_uim') }}"
                            class="btn rounded-pill fw-bold text-dark font-label d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2"
                            style="background-color: var(--unam-dorado); border: none;" target="_blank"
                            rel="noopener noreferrer">
                            <i class="bi bi-spotify fs-5"></i> ESCUCHAR EN SPOTIFY
                        </a>
                    </div>
                </div>

                <!-- Col 3 -->
                <div class="col-lg-4 ps-lg-5 d-flex flex-column py-4 py-lg-0 align-items-center align-items-lg-start">
                    <h5 class="text-warning text-uppercase mb-4 fw-bold tracking-widest fs-6">Contacto</h5>
                    <ul
                        class="list-unstyled mb-0 d-flex flex-column gap-3 w-100 align-items-center align-items-lg-start">
                        <li class="d-flex align-items-center gap-3 text-start">
                            <div class="footer-contact-icon shadow-sm"><i class="bi bi-globe fs-5"></i></div>
                            <div class="font-body">
                                <div class="small text-white-50">Sitio web</div>
                                <a href="{{ config('uim.urls.uim_oficial') }}"
                                    class="text-warning text-decoration-none small fw-bold" target="_blank"
                                    rel="noopener noreferrer">{{ config('uim.contacto.web_etiqueta') }}</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center gap-3 text-start">
                            <div class="footer-contact-icon shadow-sm"><i class="bi bi-telephone fs-5"></i></div>
                            <div class="font-body">
                                <div class="small text-white-50">Teléfono</div>
                                <a href="{{ config('uim.contacto.telefono_enlace') }}"
                                    class="text-warning text-decoration-none small fw-bold">{{ config('uim.contacto.telefono') }}</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center gap-3 text-start">
                            <div class="footer-contact-icon shadow-sm"><i class="bi bi-envelope fs-5"></i></div>
                            <div class="font-body">
                                <div class="small text-white-50">Correo</div>
                                <a href="mailto:{{ config('uim.contacto.correo') }}"
                                    class="text-warning text-decoration-none small fw-bold">{{ config('uim.contacto.correo') }}</a>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Barra inferior oscura -->
        <div class="py-3 px-4 px-lg-5 w-100 position-relative z-1" style="background-color: rgba(0,0,0,0.25);">
            <div class="row align-items-center font-body small text-center text-md-start">
                <div class="col-md-8 text-white-50 mb-3 mb-md-0 d-flex flex-column">
                    <span class="mb-1">© {{ date('Y') }} Universidad Nacional Autónoma de México.</span>
                    <span class="mb-1">Todos los derechos reservados.</span>
                    <span>FES Acatlán - UIMA</span>
                </div>
                <div
                    class="col-md-4 text-md-end d-flex flex-column flex-md-row justify-content-center justify-content-md-end gap-2 gap-md-3">
                    <a href="#" class="text-warning text-decoration-none" style="transition: color 0.3s;"
                        onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--unam-dorado)'">Aviso
                        de privacidad</a>
                    <a href="#" class="text-warning text-decoration-none" style="transition: color 0.3s;"
                        onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--unam-dorado)'">Mapa
                        del sitio</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- Barra de navegación móvil (solo visible en smartphones) --}}
    <nav class="mobile-bottom-nav d-lg-none">
        <a href="{{ url('/') }}" class="mobile-nav-item {{ request()->is('/') ? 'active' : '' }}">
            <i class="bi bi-house"></i>
            <span>Inicio</span>
        </a>
        <a href="{{ url('/investigacion') }}" class="mobile-nav-item {{ request()->is('investigacion*') ? 'active' : '' }}">
            <i class="bi bi-journal-text"></i>
            <span>Seminarios</span>
        </a>
        <a href="{{ url('/departamento') }}" class="mobile-nav-item {{ request()->is('departamento*') ? 'active' : '' }}">
            <i class="bi bi-building"></i>
            <span>Departamentos</span>
        </a>
        <a href="{{ url('/congresos') }}" class="mobile-nav-item {{ request()->is('congresos*') ? 'active' : '' }}">
            <i class="bi bi-people"></i>
            <span>Congresos</span>
        </a>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let lastScrollTop = 0;
            const header = document.querySelector('.uim-site-head-sticky');
            const mobileNav = document.querySelector('.mobile-bottom-nav');

            if (header) {
                window.addEventListener('scroll', function () {
                    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                    // Ocultar al bajar después de 150px
                    if (scrollTop > 150) {
                        if (scrollTop > lastScrollTop) {
                            // Scrolee hacia abajo: Ocultar
                            header.classList.add('header-hidden');
                            if (mobileNav) mobileNav.classList.add('nav-compact');
                        } else {
                            // Scrolee hacia arriba: Mostrar
                            header.classList.remove('header-hidden');
                            if (mobileNav) mobileNav.classList.remove('nav-compact');
                        }
                    } else {
                        // Siempre mostrar si estamos hasta arriba (menos de 150px)
                        header.classList.remove('header-hidden');
                        if (mobileNav) mobileNav.classList.remove('nav-compact');
                    }
                    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
                }, { passive: true });
            }
        });
    </script>
    @stack('scripts')
</body>

</html>