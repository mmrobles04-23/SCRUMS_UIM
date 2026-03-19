
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UIM FES Acatlán — UNAM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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


<footer class="bg-unam text-white pt-4 pb-3 mt-3">
    <div class="container-fluid">
        <p class="text-center text-secondary small">
            Hecho en México, todos los derechos reservados 2026.
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
