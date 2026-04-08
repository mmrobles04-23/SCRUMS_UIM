<?php

/**
 * Contenido institucional UIM / FES Acatlán (valores por defecto).
 *
 * Sobrescribe con variables en .env (prefijo UIM_) para homologar sin tocar Blade.
 * Ver: docs/GUIA_CONTENIDO_UIM.md
 */
return [

    'urls' => [
        'portal_fes' => env('UIM_URL_PORTAL_FES', 'https://www.acatlan.unam.mx/'),
        'uim_oficial' => env('UIM_URL_UIM_OFICIAL', 'https://www.acatlan.unam.mx/uim'),
        'revista_figuras' => env('UIM_URL_REVISTA_FIGURAS', 'https://revistafiguras.acatlan.unam.mx/index.php/figuras/index'),
        /** Enlaces rápidos / pie: sustituir cuando la UNAM confirme URLs */
        'publicaciones' => env('UIM_URL_PUBLICACIONES', '#'),
        'convocatorias' => env('UIM_URL_CONVOCATORIAS', '#'),
        'podcast_uim' => env('UIM_URL_PODCAST_UIM', '#'),
        'contacto_formulario' => env('UIM_URL_CONTACTO', '#'),
        'informacion' => env('UIM_URL_INFORMACION', '#'),
    ],

    'contacto' => [
        'direccion' => env('UIM_CONTACTO_DIRECCION', 'Av. Alcanfores 186'),
        'telefono' => env('UIM_CONTACTO_TELEFONO', '+52 55 5623 1333'),
        /** URI para <a href="..."> (solo dígitos y +, sin espacios) */
        'telefono_enlace' => env('UIM_CONTACTO_TELEFONO_ENLACE', 'tel:+525556231333'),
        'correo' => env('UIM_CONTACTO_CORREO', 'uim@acatlan.unam.mx'),
        /** Texto visible junto al ícono (puede ser distinta a la URL final) */
        'web_etiqueta' => env('UIM_CONTACTO_WEB_ETIQUETA', 'www.acatlan.unam.mx/uim'),
    ],

    'redes_sociales' => [
        'facebook' => env('UIM_REDES_FACEBOOK', '#'),
        'twitter' => env('UIM_REDES_TWITTER', '#'),
        'instagram' => env('UIM_REDES_INSTAGRAM', '#'),
        'youtube' => env('UIM_REDES_YOUTUBE', '#'),
        'spotify' => env('UIM_REDES_SPOTIFY', '#'),
    ],

];
