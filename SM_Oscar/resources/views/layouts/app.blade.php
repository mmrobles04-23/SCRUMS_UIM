
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UIM FES Acatlán — UNAM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-light">
<header class="bg-unam text-white py-3 shadow">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <img src="{{ asset('header/logo_unam.png') }}" class="logo" alt="UNAM">

        <h1 class="h4 mb-0 text-center flex-grow-1 fw-bold">
            Unidad de Investigación Multidisciplinaria
        </h1>
        <img src="{{ asset('header/logo_unam_fesa.png') }}" class="logo" alt="FES Acatlán">
    </div>
</header>


@yield('content')


<footer class="bg-unam text-white pt-3 pb-2 mt-3 shadow">
    <div class="container-fluid px-0">
        <div class="row mx-0">
            <!-- Sección de información -->
            <div class="col-md-4 mb-2 px-4">
                <h5 class="text-warning mb-2">UIM FES Acatlán</h5>
                <p class="small mb-2">Unidad de Investigación Multidisciplinaria</p>
                <p class="small mb-2">FES Acatlán - UNAM</p>
                <div class="mt-2">
                    <a href="#" class="text-white me-2"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white me-2"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-white me-2"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white me-2"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-spotify"></i></a>
                </div>
            </div>
            
            <!-- Sección combinada: enlaces rápidos y contacto -->
            <div class="col-md-8 mb-2 px-4">
                <div class="row">
                    <!-- Enlaces rápidos -->
                    <div class="col-6">
                        <h5 class="text-warning mb-2">Enlaces Rápidos</h5>
<div class="row">
    <div class="col-md-6">
                                <ul class="list-unstyled small">
                            <li class="mb-1"><a href="{{ url('/') }}" class="text-white text-decoration-none">• Inicio</a></li>
                            <li class="mb-1"><a href="{{ url('/investigacion') }}" class="text-white text-decoration-none">• Investigación</a></li>
                            <li class="mb-1"><a href="{{ url('/departamento') }}" class="text-white text-decoration-none">• Departamentos</a></li>
                        </ul>
    </div>
    <div class="col-md-6">
                                <ul class="list-unstyled small">
                            <li class="mb-1"><a href="#" class="text-white text-decoration-none">• Publicaciones</a></li>
                            <li class="mb-1"><a href="#" class="text-white text-decoration-none">• Convocatorias</a></li>
                            <li class="mb-1"><a href="#" class="text-white text-decoration-none">• Podcast UIM</a></li>
                        </ul>
    </div>
</div>
                    </div>
                    
                        <!-- Contacto -->
                            <div class="col-6">
                                <h5 class="text-warning mb-2">Contacto</h5>
                            <div class="row">
                                <div class="col-md-6">
                                        <ul class="list-unstyled small">
                                    <li class="mb-1"><i class="bi bi-geo-alt me-1"></i> Av. Alcanfores 186</li>
                                    <li class="mb-1"><i class="bi bi-globe me-1"></i> www.acatlan.unam.mx/uim</li>
                                </ul>
                                </div>
                                <div class="col-md-6">
                                        <ul class="list-unstyled small">
                                    
                                    <li class="mb-1"><i class="bi bi-telephone me-1"></i> +52 55 5623 1333</li>
                                    <li class="mb-1"><i class="bi bi-envelope me-1"></i> uim@acatlan.unam.mx</li>
                                
                                </ul>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button class="btn btn-outline-light btn-sm me-1">Contacto</button>
                                <button class="btn btn-warning btn-sm">Información</button>
                            </div>
                            </div>
                        </div>
                    </div>
        </div>
        
        <hr class="border-secondary my-2 mx-4">
        
        <!-- Derechos reservados -->
        <div class="text-center px-4">
            <p class="small mb-0">
                <i class="bi bi-c-circle me-1"></i> 
                Hecho en México, todos los derechos reservados 2026 - UNAM
            </p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')

</body>
</html>
