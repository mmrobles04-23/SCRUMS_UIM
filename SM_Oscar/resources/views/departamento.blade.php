@extends('layouts.app')

@section('title', 'Departamentos — UIM FES Acatlán')

 @push('styles')
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
     @vite(['resources/css/departamentos.css'])
 @endpush
 
 @push('scripts')
     @vite(['resources/js/departamentos.js'])
 @endpush
 
@section('content')
    {{-- NOTA (Bootstrap): wrapper con padding; el diseño detallado sigue en resources/css/departamentos.css. --}}
    <div class="py-3 py-lg-4">
        <div class="container-fluid px-3 px-lg-4">
<div class="banner">
    <img src="/departamentos/UIM.jpg" alt="">
    <h1>DEPARTAMENTOS DE <b>INVESTIGACION</b></h1>
</div>

<div class="depto"> 

    <div class="deptoInfo">

        <div class="contacto">
            <img class="contImg" id="imgDepto" src="/departamentos/PERSONA.jpg">

            <div class="contText">
                <h2 id="tituloDepto">Hat Kid gana</h2>
                <p id="descDepto">Protagonista</p>

                <ul class="lista-contacto">
                    <li class="ubicacion"> nave en el espacio</li>
                    <li class="tel"> 55hatkidBD</li>
                    <li class="email"><a href="#">hatkid@gearsforbreafast.com</a></li>
                </ul>
            </div> 
        </div>

        <div class="infoDepto">

            <div class="noseQejeso">

                <div class="quejeso1">
                    <img src="/departamentos/titulo.png" class="icono">
                    <h2>Algo de titulo</h2>
                    <p>mucho texto</p>
                </div>

                <div class="btnIN" onclick="toggleInfo(this)">
                    <h2>Ver más</h2>
                </div>

                <div class="infoExtra">
                    <p>Información adicional del departamento.</p>
                </div>

            </div>

            <div class="objetivo">
                <h2>Nuestro Objetivo</h2>
               
                <ul id="listaObjetivo">
                    <li>smug dance</li>
                    <li>PECK</li>
                    <li>CAT CRIME</li>
                </ul>
            </div>

        </div>

    </div>

    <!-- TARJETAS -->
    <div class="deptoFunc">

        <div class="funcion">
            <img src="/departamentos/depto.png">
            <h3>Departamento 1</h3>
            <p>Información del departamento</p>

            <div class="btnVerMas" onclick="toggleCardInfo(event, this)">Ver más</div>
            <div class="extraCard">Más info del departamento 1...</div>
        </div>

        <div class="funcion">
            <img src="/departamentos/depto.png">
            <h3>Departamento 2</h3>
            <p>Información del departamento</p>

            <div class="btnVerMas" onclick="toggleCardInfo(event, this)">Ver más</div>
            <div class="extraCard">Más info del departamento 2...</div>
        </div>

        <div class="funcion">
            <img src="/departamentos/depto.png">
            <h3>Departamento 3</h3>
            <p>Información del departamento</p>

            <div class="btnVerMas" onclick="toggleCardInfo(event, this)">Ver más</div>
            <div class="extraCard">Más info del departamento 3...</div>
        </div>

        <div class="funcion">
            <img src="/departamentos/depto.png">
            <h3>Departamento 4</h3>
            <p>Información del departamento</p>

            <div class="btnVerMas" onclick="toggleCardInfo(event, this)">Ver más</div>
            <div class="extraCard">Más info del departamento 4...</div>
        </div>

        <div class="funcion">
            <img src="/departamentos/depto.png">
            <h3>Departamento 5</h3>
            <p>Información del departamento</p>

            <div class="btnVerMas" onclick="toggleCardInfo(event, this)">Ver más</div>
            <div class="extraCard">Más info del departamento 5...</div>
        </div>

        <div class="funcion">
            <img src="/departamentos/depto.png">
            <h3>Departamento 6</h3>
            <p>Información del departamento</p>

            <div class="btnVerMas" onclick="toggleCardInfo(event, this)">Ver más</div>
            <div class="extraCard">Más info del departamento 6...</div>
        </div>

    </div>

</div>
        </div>
    </div>
@endsection