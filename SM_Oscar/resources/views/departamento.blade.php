<!DOCTYPE html>

<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Departamento de Análisis de Riesgos - UIMA FES Acatlán</title>
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400&amp;family=Manrope:wght@300;400;500;700;800&amp;family=Inter:wght@400;500;600&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "secondary-fixed": "#ffdf9e",
                    "secondary-container": "#fdc744",
                    "error": "#ba1a1a",
                    "on-tertiary-fixed": "#001b3e",
                    "primary-fixed-dim": "#a9c7ff",
                    "surface-bright": "#f6faff",
                    "on-secondary-fixed-variant": "#5b4300",
                    "on-tertiary-container": "#8faadd",
                    "tertiary-fixed": "#d7e3ff",
                    "on-primary-fixed": "#001b3d",
                    "on-error-container": "#93000a",
                    "on-primary": "#ffffff",
                    "surface-container-lowest": "#ffffff",
                    "inverse-surface": "#293138",
                    "on-secondary": "#ffffff",
                    "on-primary-container": "#81aaf0",
                    "tertiary-container": "#223e6a",
                    "on-tertiary-fixed-variant": "#2b4774",
                    "surface-container-low": "#ecf5fe",
                    "surface-dim": "#d2dbe4",
                    "surface-container": "#e6eff8",
                    "outline-variant": "#c3c6d2",
                    "on-background": "#141d23",
                    "on-primary-fixed-variant": "#134685",
                    "inverse-on-surface": "#e9f2fb",
                    "primary": "#002754",
                    "outline": "#737781",
                    "on-secondary-container": "#715300",
                    "surface-container-highest": "#dbe4ed",
                    "secondary": "#795900",
                    "inverse-primary": "#a9c7ff",
                    "surface": "#f6faff",
                    "surface-tint": "#325e9f",
                    "background": "#f6faff",
                    "on-tertiary": "#ffffff",
                    "on-surface-variant": "#434750",
                    "secondary-fixed-dim": "#f4bf3c",
                    "on-error": "#ffffff",
                    "tertiary-fixed-dim": "#acc7fc",
                    "surface-container-high": "#e0e9f2",
                    "on-secondary-fixed": "#261a00",
                    "tertiary": "#052853",
                    "surface-variant": "#dbe4ed",
                    "error-container": "#ffdad6",
                    "primary-fixed": "#d6e3ff",
                    "primary-container": "#003d7c",
                    "on-surface": "#141d23"
            },
            "borderRadius": {
                    "DEFAULT": "0.125rem",
                    "lg": "0.25rem",
                    "xl": "0.5rem",
                    "full": "0.75rem"
            },
            "fontFamily": {
                    "headline": ["Noto Serif"],
                    "body": ["Manrope"],
                    "label": ["Inter"]
            }
          },
        },
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body { font-family: 'Manrope', sans-serif; }
        h1, h2, h3, .serif-font { font-family: 'Noto Serif', serif; }
    </style>
</head>
<body class="bg-surface text-on-surface">
<!-- Top Navigation Bar -->
<header class="bg-[#002754] dark:bg-[#001a38] text-[#fdc744] dark:text-[#fdc744] shadow-lg flex justify-between items-center px-6 py-3 w-full docked full-width top-0 sticky z-50">
<div class="flex items-center gap-4">
<span class="text-xl font-bold text-white tracking-tight">UIMA FES Acatlán</span>
</div>
<nav class="hidden md:flex gap-8">
<a class="text-white/80 hover:text-white transition-colors" href="#">Inicio</a>
<a class="text-white/80 hover:text-white transition-colors" href="#">Investigación</a>
<a class="text-[#fdc744] border-b-2 border-[#795900] pb-1 font-bold" href="#">Departamentos</a>
<a class="text-white/80 hover:text-white transition-colors" href="#">Proyectos</a>
</nav>
<button class="bg-secondary-container text-on-secondary-container px-6 py-2 rounded-md font-bold hover:scale-95 duration-200 transition-all">
            Inscribirme
        </button>
</header>
<div class="flex min-h-screen">
<!-- Sidebar Navigation -->
<aside class="hidden md:flex flex-col w-64 h-screen sticky top-[60px] p-4 bg-[#f6faff] dark:bg-[#0f172a] border-r-0 shadow-none">
<div class="mb-8">
<h2 class="text-lg font-bold text-[#002754] uppercase tracking-wider mb-1">Departamentos</h2>
<p class="text-xs text-on-surface-variant font-medium">Red de Investigación</p>
</div>
<nav class="flex flex-col gap-2">
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-[#002754]/70 dark:text-slate-400 hover:bg-[#dbe4ed] dark:hover:bg-slate-800 transition-all" href="#">
<span class="material-symbols-outlined" data-icon="group">group</span>
<span class="font-medium text-sm">Ciencias Sociales</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-[#002754]/70 dark:text-slate-400 hover:bg-[#dbe4ed] dark:hover:bg-slate-800 transition-all" href="#">
<span class="material-symbols-outlined" data-icon="menu_book">menu_book</span>
<span class="font-medium text-sm">Humanidades</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-[#795900] font-bold border-l-4 border-[#795900] bg-[#dbe4ed] dark:bg-slate-700 transition-all" href="#">
<span class="material-symbols-outlined" data-icon="biotech">biotech</span>
<span class="font-medium text-sm">Tecnología</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-[#002754]/70 dark:text-slate-400 hover:bg-[#dbe4ed] dark:hover:bg-slate-800 transition-all" href="#">
<span class="material-symbols-outlined" data-icon="palette">palette</span>
<span class="font-medium text-sm">Artes</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-[#002754]/70 dark:text-slate-400 hover:bg-[#dbe4ed] dark:hover:bg-slate-800 transition-all" href="#">
<span class="material-symbols-outlined" data-icon="payments">payments</span>
<span class="font-medium text-sm">Economía</span>
</a>
</nav>
<div class="mt-auto p-4 flex items-center gap-3 border-t border-outline-variant/20">
<div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white font-bold">U</div>
<div>
<p class="text-xs font-bold text-primary">Escudo UIMA</p>
<p class="text-[10px] text-outline">FES Acatlán</p>
</div>
</div>
</aside>
<!-- Main Content Canvas -->
<main class="flex-1 overflow-x-hidden">
<!-- Hero Banner Section -->
<section class="relative w-full h-[400px] overflow-hidden flex items-end">
<div class="absolute inset-0 bg-primary/40 z-10"></div>
<img alt="" class="absolute inset-0 w-full h-full object-cover" data-alt="Majestic view of Popocatepetl volcano with a plume of ash against a dramatic twilight sky in a scholarly editorial style" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDEcuqQUFQ-pm3xuGkNtTmIeROUof2CHyVkA1ksB_5kSYXN5cCkD8BDpNlXxnPoPRfBC_C0ZUfPT-VflN7ptmTH-AP86BR455_BltBtcv38SB8vaUkNe_5AVP_60BZc_RUlCRsj6qz09WdkeMJsQ16DqcGHhVXroIStqXfSXeeOn8157r0UwP9f38Kpd5I1fhpZ1W1KNS7zWvKw7OLglfJMrRi4tGu8Vh0QFgQxTzl91iw4kD6HIhAzVuXgm8T5WzS11DksN3wDiQ"/>
<div class="container mx-auto px-12 pb-16 relative z-20">
<div class="max-w-4xl">
<span class="inline-block px-4 py-1 bg-secondary-container text-on-secondary-container font-bold text-xs rounded-full mb-4">Investigación de Alto Impacto</span>
<h1 class="text-5xl font-bold text-white leading-tight drop-shadow-lg">Departamento de Análisis de Riesgos Naturales y Antropogénicos</h1>
</div>
</div>
</section>
<!-- Profile and Objective Section -->
<section class="container mx-auto px-12 py-16">
<div class="flex flex-col lg:flex-row gap-8">
<!-- Jefe de Departamento Card -->
<div class="w-full lg:w-1/3">
<div class="bg-primary text-white rounded-xl overflow-hidden shadow-xl transform transition-transform hover:scale-[1.01]">
<div class="p-8 flex flex-col items-center text-center">
<div class="w-32 h-32 rounded-full border-4 border-secondary-container overflow-hidden mb-6 shadow-lg">
<img alt="" class="w-full h-full object-cover" data-alt="Professional portrait of Ing. Carlos Arce Leon, a senior engineer in a formal suit with a neutral professional background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDJZUQyxPjpEhZBK90S18No2X-jckocvzlxWoIGtVvdhyQ1Yu3MihmxjyT01uSDznGkf699HqZhlimShC-FehOmtgWfmrLnhYIBzpyrhjciKTDi5P29hH946vB7DT0HhbslTZoB8BnTwda5gxQSPx-utlbfL_RoQxJwuFW2oPUGT_f9Is_k5PH2cx16S2_WiJISDyGLYVu1z3vacpQ0dz_hijfPgycEGdb4FOT975ewr8JjDfFTzOuWf-OZ_Kyi8K6ijkJlMIFukg"/>
</div>
<h3 class="text-2xl font-bold mb-1">Ing. Carlos Arce León</h3>
<p class="text-secondary-fixed text-sm font-medium mb-6">Jefe del Departamento</p>
<div class="w-full space-y-4 text-left border-t border-white/10 pt-6">
<div class="flex items-center gap-4">
<span class="material-symbols-outlined text-secondary-container" data-icon="corporate_fare">corporate_fare</span>
<span class="text-sm font-light">Edificio de Investigación, Cubículo 104</span>
</div>
<div class="flex items-center gap-4">
<span class="material-symbols-outlined text-secondary-container" data-icon="call">call</span>
<span class="text-sm font-light">Ext. 45678</span>
</div>
<div class="flex items-center gap-4">
<span class="material-symbols-outlined text-secondary-container" data-icon="mail">mail</span>
<span class="text-sm font-light">carlos.arce@acatlan.unam.mx</span>
</div>
</div>
</div>
</div>
</div>
<!-- Nuestro Objetivo Section -->
<div class="w-full lg:w-2/3">
<div class="bg-surface-container-low p-10 rounded-xl h-full border-l-8 border-secondary">
<div class="flex items-center gap-4 mb-6">
<span class="material-symbols-outlined text-primary text-4xl" data-icon="auto_stories">auto_stories</span>
<h2 class="text-3xl font-bold text-primary">Nuestro Objetivo</h2>
</div>
<p class="text-on-surface text-lg leading-relaxed mb-8">
                                Caracterizar las acciones generadas por los distintos agentes perturbadores mediante el análisis riguroso de modelos estocásticos y deterministas. Buscamos establecer marcos metodológicos que permitan la prevención oportuna y la mitigación de impactos en infraestructuras críticas y asentamientos humanos.
                            </p>
<h3 class="text-xl font-bold text-primary mb-6 flex items-center gap-2">
<span class="material-symbols-outlined" data-icon="task_alt">task_alt</span>
                                Funciones Principales
                            </h3>
<ul class="grid md:grid-cols-2 gap-4">
<li class="flex gap-3">
<span class="text-secondary font-bold text-xl">•</span>
<span class="text-on-surface-variant text-sm">Evaluar riesgos geológicos e hidrometeorológicos.</span>
</li>
<li class="flex gap-3">
<span class="text-secondary font-bold text-xl">•</span>
<span class="text-on-surface-variant text-sm">Desarrollo de metodologías de cuantificación.</span>
</li>
<li class="flex gap-3">
<span class="text-secondary font-bold text-xl">•</span>
<span class="text-on-surface-variant text-sm">Análisis de vulnerabilidad estructural en zonas críticas.</span>
</li>
<li class="flex gap-3">
<span class="text-secondary font-bold text-xl">•</span>
<span class="text-on-surface-variant text-sm">Consultoría especializada para entes gubernamentales.</span>
</li>
<li class="flex gap-3">
<span class="text-secondary font-bold text-xl">•</span>
<span class="text-on-surface-variant text-sm">Monitoreo sísmico y alertamiento temprano.</span>
</li>
<li class="flex gap-3">
<span class="text-secondary font-bold text-xl">•</span>
<span class="text-on-surface-variant text-sm">Investigación en nuevos materiales resilientes.</span>
</li>
</ul>
</div>
</div>
</div>
</section>
<!-- Proyectos Destacados (Bento Grid Style) -->
<section class="container mx-auto px-12 py-16 bg-surface-container-highest/30">
<div class="flex justify-between items-end mb-10">
<div>
<h2 class="text-3xl font-bold text-primary mb-2">Proyectos Destacados</h2>
<div class="h-1 w-24 bg-secondary"></div>
</div>
<a class="text-primary font-bold hover:underline flex items-center gap-2" href="#">
                        Ver todos los proyectos <span class="material-symbols-outlined">arrow_forward</span>
</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Project Card 1 -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-lg border border-outline-variant/10 group">
<div class="h-56 overflow-hidden relative">
<img alt="" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Scientific visualization of seismic wave patterns and earthquake risk maps across a city layout, blue and yellow color palette" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA7ffKsh3KFOnXmFF5CF96GNqecshdQ7lVKjO05Qg1xRKtyE4O2WwVY61r03iseSv0-OjWa2g5_m6yGdeEV4G7b1pFwvDIArR94RYPZXaqhfSBYd3CMiPgLYXFxR48t7N1dsoSDqWc1YZ7XHAthgt-nBiMdIlvgYNaDCPOQZxEjiNXwu9-JSj4ofqVciB59grzc6enimOUeuAsLsnYHgCPHey0uq3-rYRERcWL-mFRFeqgTN1rhmfoHheVT0SI-x8RcHoMJG30w3Q"/>
<div class="absolute top-4 left-4">
<span class="px-3 py-1 bg-primary text-white text-[10px] font-bold rounded-full uppercase tracking-widest">En Curso</span>
</div>
</div>
<div class="p-6">
<h4 class="text-xl font-bold text-primary mb-3">Evaluación de riesgo sísmico</h4>
<p class="text-on-surface-variant text-sm mb-4">Modelado avanzado de la respuesta dinámica del suelo en el Valle de México frente a eventos de gran magnitud.</p>
<button class="text-secondary font-bold text-xs flex items-center gap-2 hover:translate-x-1 transition-transform">
                                DETALLES <span class="material-symbols-outlined text-sm">add_circle</span>
</button>
</div>
</div>
<!-- Project Card 2 -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-lg border border-outline-variant/10 group">
<div class="h-56 overflow-hidden relative">
<img alt="" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Extreme close-up of high-performance building materials being tested in a laboratory setting with mechanical pressure sensors" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBsqi0gsXwmbDJR6e1-aO8xZW86kcqxkv9a2VyYxQiUYxaG2tUSjbWJ7RJrgWDZAoDN-TRq9luyPV7QKeaDCiCYp9UmQia7hsB5BbVnEsd8l7tkrhfbGKbl4rrA8HO25FMj4pVis0su4BExfxBHSWj8EU8LwWD3ddneBf1UPAiRLHv1V_yFg87bUuAyVfYpBbdkiqsH--bK_rrIN3-_j4OmDgrNdLBSfpf6_Qa0aAhUkFixbHPEJ3qivcKfVChYf_chhfPQz9y7Ew"/>
<div class="absolute top-4 left-4">
<span class="px-3 py-1 bg-secondary text-on-secondary text-[10px] font-bold rounded-full uppercase tracking-widest">Laboratorio</span>
</div>
</div>
<div class="p-6">
<h4 class="text-xl font-bold text-primary mb-3">Caracterización de materiales</h4>
<p class="text-on-surface-variant text-sm mb-4">Estudio de concreto de alto desempeño y polímeros para ambientes de temperaturas extremas y corrosión.</p>
<button class="text-secondary font-bold text-xs flex items-center gap-2 hover:translate-x-1 transition-transform">
                                DETALLES <span class="material-symbols-outlined text-sm">add_circle</span>
</button>
</div>
</div>
<!-- Project Card 3 -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-lg border border-outline-variant/10 group">
<div class="h-56 overflow-hidden relative">
<img alt="" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Satellite thermal imaging of urban flood zones showing water accumulation patterns in a metropolitan area" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDrDbey0ShAnsu7vb3f97Kaz6LzYMmiY3h3oDJYxkhBmVrncDVMYgvSGq_ImhhRO_MlfQUPcDiK9jUIbWF6LRWp7dGR26_yHKHlhhmU15A_dvqs6qFvNw5avLIt-GRxaFFTcX_Ddue2UlqObj6VoPV6_c_Qi6Qx5zq6XVLIhGJrOKRJOn0BOOILxWBd9vJVMNdkojUYvdjISXqQrx1V6bkt2hBKhklwUXrAbT_N1xpyiPqVW6oGg55BowyBtVyX_c2aBEi7JERqKA"/>
<div class="absolute top-4 left-4">
<span class="px-3 py-1 bg-primary text-white text-[10px] font-bold rounded-full uppercase tracking-widest">Planificación</span>
</div>
</div>
<div class="p-6">
<h4 class="text-xl font-bold text-primary mb-3">Análisis de inundaciones pluviales</h4>
<p class="text-on-surface-variant text-sm mb-4">Determinación de puntos críticos de anegamiento en zonas urbanas mediante topografía de alta precisión LIDAR.</p>
<button class="text-secondary font-bold text-xs flex items-center gap-2 hover:translate-x-1 transition-transform">
                                DETALLES <span class="material-symbols-outlined text-sm">add_circle</span>
</button>
</div>
</div>
</div>
</section>
</main>
</div>
<!-- Footer -->
<footer class="bg-[#002754] dark:bg-[#001a38] text-white py-12 px-12 mt-auto border-t border-white/10">
<div class="container mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
<div class="text-center md:text-left">
<h3 class="font-serif italic text-2xl mb-2 text-white">UIMA FES Acatlán</h3>
<p class="text-white/60 font-light text-sm max-w-md">
                    Unidad de Investigación Multidisciplinaria de la Facultad de Estudios Superiores Acatlán. Comprometidos con la excelencia académica y el desarrollo científico.
                </p>
</div>
<div class="flex flex-col md:flex-row gap-8 items-center">
<nav class="flex gap-6">
<a class="text-white/60 hover:text-white underline underline-offset-4 transition-all" href="#">Privacidad</a>
<a class="text-white/60 hover:text-white underline underline-offset-4 transition-all" href="#">Contacto</a>
<a class="text-white/60 hover:text-white underline underline-offset-4 transition-all" href="#">Directorio</a>
<a class="text-white/60 hover:text-white underline underline-offset-4 transition-all" href="#">UNAM</a>
</nav>
<div class="flex gap-4">
<span class="material-symbols-outlined text-[#fdc744] cursor-pointer hover:scale-110 transition-transform">public</span>
<span class="material-symbols-outlined text-[#fdc744] cursor-pointer hover:scale-110 transition-transform">diversity_3</span>
<span class="material-symbols-outlined text-[#fdc744] cursor-pointer hover:scale-110 transition-transform">school</span>
</div>
</div>
</div>
<div class="container mx-auto mt-12 pt-8 border-t border-white/5 text-center">
<p class="text-white/40 text-[10px] uppercase tracking-[0.2em]">© 2024 UIMA FES Acatlán - El Digital Curator</p>
</div>
</footer>
</body></html>