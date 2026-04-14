@extends('layouts.app')

@php
  // Esto será reemplazado por la data del Controlador real más adelante.
  $departamentos = [
    'DTA' => ['nombre' => 'Dpto. de Tecnología Ambiental', 'color' => '#78D64B', 'logo' => 'uima_dta.png', 'icono' => 'bi-tree', 'siglas' => 'DTA'],
    'IPAJ' => ['nombre' => 'Dpto. de Investigación en Procuración y Administración de Justicia', 'color' => '#69B3E7', 'logo' => 'uima_ipaj.png', 'icono' => 'bi-bank', 'siglas' => 'IPAJ'],
    'DPE' => ['nombre' => 'Dpto. de Proyección Empresarial', 'color' => '#DF1995', 'logo' => 'uima_dpe.png', 'icono' => 'bi-briefcase', 'siglas' => 'DPE'],
    'DIE' => ['nombre' => 'Dpto. de Investigación Educativa', 'color' => '#FA4616', 'logo' => 'uima_die.png', 'icono' => 'bi-mortarboard', 'siglas' => 'DIE'],
    'DICEC' => ['nombre' => 'Dpto. de Investigación en Comunicación y Estudios Culturales', 'color' => '#824F9E', 'logo' => 'uima_dicec.png', 'icono' => 'bi-broadcast', 'siglas' => 'DICEC'],
    'DRNA' => ['nombre' => 'Dpto. de Riesgos Naturales y Antropogénicos', 'color' => '#D50032', 'logo' => 'uima_drna.png', 'icono' => 'bi-exclamation-triangle', 'siglas' => 'DRNA'],
    'DEGPP' => ['nombre' => 'Dpto. de Estudios de Gobierno y Política Pública', 'color' => '#26D07C', 'logo' => 'uima_degpp.png', 'icono' => 'bi-building', 'siglas' => 'DEGPP'],
  ];

  // Tomar el departamento de la URL (ej. ?id=DPE). Por defecto DRNA.
  $siglaSolicitada = request()->query('id', 'DRNA');
  $deptoActivo = $departamentos[$siglaSolicitada] ?? $departamentos['DRNA'];
@endphp

@section('title', $deptoActivo['nombre'] . ' - UIMA FES Acatlán')

@push('styles')
  @vite(['resources/css/departamentos.css', 'resources/js/departamentos.js'])
@endpush

@section('content')
  <div class="d-flex w-100 bg-surface-container-lowest"
    style="--depto-color: {{ $deptoActivo['color'] }}; --depto-color-alpha: {{ $deptoActivo['color'] }}25;">

    <!-- Sidebar de Departamentos (Oculto en móviles) -->
    <aside class="d-none d-lg-flex flex-column border-end bg-surface-container-low sidebar-container">
      <div class="p-4 mb-2">
        <h2 class="h6 fw-bold text-primary-uim text-uppercase tracking-widest mb-1 font-headline">Departamentos</h2>
        <p class="text-on-surface-variant small font-weight-medium mb-0">Red de Investigación</p>
      </div>

      <nav class="nav flex-column gap-2 px-3">
        @foreach($departamentos as $sigla => $depto)
          @php $isActive = ($deptoActivo['siglas'] === $depto['siglas']); @endphp
          <a class="nav-link px-3 py-2 rounded-3 d-flex align-items-center gap-3 transition-colors {{ $isActive ? 'active-depto shadow-sm fw-bold' : 'text-on-surface-variant hover-bg-surface-variant' }}"
            href="{{ url('/departamento?id=' . $depto['siglas']) }}">
            <i class="bi {{ $depto['icono'] }} fs-5" style="color: {{ $isActive ? 'var(--depto-color)' : 'inherit' }}"></i>
            <span class="small lh-sm {{ $isActive ? 'sidebar-text-active' : '' }}">{{ $depto['nombre'] }}</span>
          </a>
        @endforeach
      </nav>

      <!-- Logo del Departamento Activo -->
      <div
        class="mt-auto p-4 d-flex align-items-center justify-content-center border-top border-secondary border-opacity-10 bg-white">
        <img src="{{ asset('departamentos/' . $deptoActivo['logo']) }}" alt="Logo {{ $deptoActivo['siglas'] }}"
          class="img-fluid object-fit-contain transition-all sidebar-logo">
      </div>
    </aside>

    <!-- Contenido Principal -->
    <div class="flex-grow-1 overflow-x-hidden">

      <!-- Hero Banner Estilo Split Asimétrico (Estrecho) -->
      <section class="position-relative w-100 overflow-hidden bg-white hero-banner">
        <div class="row w-100 h-100 m-0 align-items-stretch">

          <!-- Lado Izquierdo: Texto y Topografía -->
          <div
            class="col-lg-9 position-relative z-2 d-flex flex-column justify-content-center px-4 py-3 px-lg-5 bg-white">
            <!-- Patrón de topografía simulado por CSS (sutil) -->
            <div class="position-absolute top-0 end-0 w-100 h-100 opacity-25 hero-topography"></div>

            <div class="position-relative z-3 ps-lg-3 hero-text-container">
              <h6 class="text-uppercase tracking-widest fw-bold mb-1 d-flex align-items-center gap-2 hero-subtitle">
                Departamentos de Investigación
              </h6>

              <h1 class="fw-bold font-headline lh-sm mb-2 hero-title">
                {{ $deptoActivo['nombre'] }}
              </h1>

              <p class="font-body mb-0 hero-description">
                Investigación aplicada para comprender, prevenir y gestionar los retos que enfrentan la sociedad y la
                infraestructura mediante el enfoque multidisciplinario de la UIMA.
              </p>
            </div>
          </div>

          <!-- Lado Derecho: Imagen con recorte curvo (Swoosh) -->
          <div class="col-lg-3 p-0 position-relative d-none d-lg-block hero-img-col">
            <!-- Contenedor de la Imagen con tinte dinámico -->
            <div class="position-relative">
              <img alt="{{ $deptoActivo['nombre'] }}" class="w-100 h-100 object-fit-cover"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDEcuqQUFQ-pm3xuGkNtTmIeROUof2CHyVkA1ksB_5kSYXN5cCkD8BDpNlXxnPoPRfBC_C0ZUfPT-VflN7ptmTH-AP86BR455_BltBtcv38SB8vaUkNe_5AVP_60BZc_RUlCRsj6qz09WdkeMJsQ16DqcGHhVXroIStqXfSXeeOn8157r0UwP9f38Kpd5I1fhpZ1W1KNS7zWvKw7OLglfJMrRi4tGu8Vh0QFgQxTzl91iw4kD6HIhAzVuXgm8T5WzS11DksN3wDiQ" />
              <div class="position-absolute top-0 start-0 w-100 h-100 hero-img-overlay"></div>
            </div>

            <!-- Recorte SVG Curvo para fusionarse con la izquierda -->
            <svg class="position-absolute top-0 start-0 h-100 hero-swoosh" viewBox="0 0 100 100"
              preserveAspectRatio="none">
              <path d="M0,0 C70,30 30,70 100,100 L0,100 Z"></path>
            </svg>
          </div>

          <!-- Banner en versión Móvil (Imagen arriba, texto abajo) -->
          <div class="col-12 p-0 d-lg-none hero-mobile-img">
            <img alt="{{ $deptoActivo['nombre'] }}" class="w-100 h-100 object-fit-cover"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuDEcuqQUFQ-pm3xuGkNtTmIeROUof2CHyVkA1ksB_5kSYXN5cCkD8BDpNlXxnPoPRfBC_C0ZUfPT-VflN7ptmTH-AP86BR455_BltBtcv38SB8vaUkNe_5AVP_60BZc_RUlCRsj6qz09WdkeMJsQ16DqcGHhVXroIStqXfSXeeOn8157r0UwP9f38Kpd5I1fhpZ1W1KNS7zWvKw7OLglfJMrRi4tGu8Vh0QFgQxTzl91iw4kD6HIhAzVuXgm8T5WzS11DksN3wDiQ" />
          </div>

        </div>
      </section>

      <!-- Profile and Objective -->
      <section class="py-5 bg-surface-container-lowest">
        <div class="container-fluid px-4 px-lg-5 py-4">
          <div class="row g-5">

            <!-- Jefe de Departamento Card -->
            <div class="col-lg-4 col-xl-3">
              <div
                class="card text-white rounded-4 border-0 shadow card-hover-premium overflow-hidden h-100 profile-card">
                <div class="card-body p-4 p-xl-5 flex-column d-flex align-items-center text-center">
                  <div class="rounded-circle border border-4 overflow-hidden mb-4 shadow border-depto profile-avatar">
                    <img alt="Ing. Carlos Arce Leon" class="w-100 h-100 object-fit-cover"
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuDJZUQyxPjpEhZBK90S18No2X-jckocvzlxWoIGtVvdhyQ1Yu3MihmxjyT01uSDznGkf699HqZhlimShC-FehOmtgWfmrLnhYIBzpyrhjciKTDi5P29hH946vB7DT0HhbslTZoB8BnTwda5gxQSPx-utlbfL_RoQxJwuFW2oPUGT_f9Is_k5PH2cx16S2_WiJISDyGLYVu1z3vacpQ0dz_hijfPgycEGdb4FOT975ewr8JjDfFTzOuWf-OZ_Kyi8K6ijkJlMIFukg" />
                  </div>
                  <h3 class="h4 fw-bold mb-1 font-headline">Ing. Carlos Arce León</h3>
                  <p class="small fw-bold mb-4 text-depto">Jefe del Departamento</p>

                  <div class="w-100 border-top border-white border-opacity-10 pt-4 mt-auto text-start">
                    <div class="d-flex align-items-center gap-3 mb-3">
                      <i class="bi bi-building fs-5 text-depto"></i>
                      <span class="small font-light text-white-50">Edificio de Investigación, Cubículo 104</span>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-3">
                      <i class="bi bi-telephone fs-5 text-depto"></i>
                      <span class="small font-light text-white-50">Ext. 45678</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                      <i class="bi bi-envelope fs-5 text-depto"></i>
                      <span class="small font-light text-white-50">carlos.arce@acatlan.unam.mx</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Nuestro Objetivo Section -->
            <div class="col-lg-8 col-xl-9">
              <div class="bg-surface-container-low p-4 p-md-5 rounded-4 h-100 shadow-sm border-depto objective-container">
                <div class="d-flex align-items-center gap-3 mb-4">
                  <i class="bi bi-journal-text display-6 text-depto"></i>
                  <h2 class="h2 fw-bold mb-0 font-headline text-depto">Nuestro Objetivo</h2>
                </div>
                <p class="text-on-surface fs-5 lh-lg mb-5 font-body">
                  Caracterizar las acciones generadas por los distintos agentes perturbadores mediante el análisis
                  riguroso de modelos estocásticos y deterministas. Buscamos establecer marcos metodológicos que permitan
                  la prevención oportuna y la mitigación de impactos en infraestructuras críticas y asentamientos humanos.
                </p>

                <h3 class="h5 fw-bold text-primary-uim mb-4 d-flex align-items-center gap-2">
                  <i class="bi bi-check-circle-fill text-depto"></i> Funciones Principales
                </h3>

                <div class="row g-3">
                  <div class="col-md-6 d-flex gap-3 align-items-start">
                    <span class="fw-bold fs-4 lh-1 text-depto">•</span>
                    <span class="text-on-surface-variant small pt-1">Evaluar riesgos geológicos e
                      hidrometeorológicos.</span>
                  </div>
                  <div class="col-md-6 d-flex gap-3 align-items-start">
                    <span class="fw-bold fs-4 lh-1 text-depto">•</span>
                    <span class="text-on-surface-variant small pt-1">Desarrollo de metodologías de cuantificación.</span>
                  </div>
                  <div class="col-md-6 d-flex gap-3 align-items-start">
                    <span class="fw-bold fs-4 lh-1 text-depto">•</span>
                    <span class="text-on-surface-variant small pt-1">Análisis de vulnerabilidad estructural en zonas
                      críticas.</span>
                  </div>
                  <div class="col-md-6 d-flex gap-3 align-items-start">
                    <span class="fw-bold fs-4 lh-1 text-depto">•</span>
                    <span class="text-on-surface-variant small pt-1">Consultoría especializada para entes
                      gubernamentales.</span>
                  </div>
                  <div class="col-md-6 d-flex gap-3 align-items-start">
                    <span class="fw-bold fs-4 lh-1 text-depto">•</span>
                    <span class="text-on-surface-variant small pt-1">Monitoreo sísmico y alertamiento temprano.</span>
                  </div>
                  <div class="col-md-6 d-flex gap-3 align-items-start">
                    <span class="fw-bold fs-4 lh-1 text-depto">•</span>
                    <span class="text-on-surface-variant small pt-1">Investigación en nuevos materiales
                      resilientes.</span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>

      <!-- Proyectos Destacados (Bento Grid Style) -->
      <section class="py-5 bg-surface-container-low border-top border-secondary border-opacity-10">
        <div class="container-fluid px-4 px-lg-5 py-4">

          <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5 gap-3">
            <div>
              <h2 class="h3 fw-bold text-primary-uim mb-2 font-headline">Proyectos Destacados</h2>
              <div class="projects-divider"></div>
            </div>
            <a href="#"
              class="text-primary-uim fw-bold text-decoration-none d-flex align-items-center gap-2 group-arrow-hover transition-all">
              Ver todos los proyectos <i class="bi bi-arrow-right icon-transition"></i>
            </a>
          </div>

          <div class="row g-4">

            <!-- Project Card 1 -->
            <div class="col-md-6 col-xl-4">
              <div
                class="card border border-secondary border-opacity-10 shadow-sm rounded-4 overflow-hidden h-100 card-hover-premium group-arrow-hover">
                <div class="position-relative overflow-hidden project-img-container">
                  <img alt="Riesgo Sísmico" class="w-100 h-100 object-fit-cover group-hover-scale project-img-scale"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuA7ffKsh3KFOnXmFF5CF96GNqecshdQ7lVKjO05Qg1xRKtyE4O2WwVY61r03iseSv0-OjWa2g5_m6yGdeEV4G7b1pFwvDIArR94RYPZXaqhfSBYd3CMiPgLYXFxR48t7N1dsoSDqWc1YZ7XHAthgt-nBiMdIlvgYNaDCPOQZxEjiNXwu9-JSj4ofqVciB59grzc6enimOUeuAsLsnYHgCPHey0uq3-rYRERcWL-mFRFeqgTN1rhmfoHheVT0SI-x8RcHoMJG30w3Q" />
                  <div class="position-absolute top-0 start-0 m-3 z-2">
                    <span
                      class="badge bg-unam text-white text-uppercase tracking-widest px-3 py-2 rounded-pill project-badge-sm">En
                      Curso</span>
                  </div>
                </div>
                <div class="card-body p-4 d-flex flex-column">
                  <h4 class="h5 fw-bold text-primary-uim mb-3 font-headline">Evaluación de riesgo sísmico</h4>
                  <p class="small text-on-surface-variant mb-4">Modelado avanzado de la respuesta dinámica del suelo en el
                    Valle de México frente a eventos de gran magnitud.</p>
                  <button
                    class="btn btn-link text-secondary-uim fw-bold text-uppercase p-0 text-decoration-none d-flex align-items-center gap-2 mt-auto tracking-widest transition-all project-btn-details">
                    DETALLES <i class="bi bi-plus-circle icon-transition fs-5"></i>
                  </button>
                </div>
              </div>
            </div>

            <!-- Project Card 2 -->
            <div class="col-md-6 col-xl-4">
              <div
                class="card border border-secondary border-opacity-10 shadow-sm rounded-4 overflow-hidden h-100 card-hover-premium group-arrow-hover">
                <div class="position-relative overflow-hidden project-img-container">
                  <img alt="Materiales" class="w-100 h-100 object-fit-cover group-hover-scale project-img-scale"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBsqi0gsXwmbDJR6e1-aO8xZW86kcqxkv9a2VyYxQiUYxaG2tUSjbWJ7RJrgWDZAoDN-TRq9luyPV7QKeaDCiCYp9UmQia7hsB5BbVnEsd8l7tkrhfbGKbl4rrA8HO25FMj4pVis0su4BExfxBHSWj8EU8LwWD3ddneBf1UPAiRLHv1V_yFg87bUuAyVfYpBbdkiqsH--bK_rrIN3-_j4OmDgrNdLBSfpf6_Qa0aAhUkFixbHPEJ3qivcKfVChYf_chhfPQz9y7Ew" />
                  <div class="position-absolute top-0 start-0 m-3 z-2">
                    <span
                      class="badge bg-warning text-dark text-uppercase tracking-widest px-3 py-2 rounded-pill project-badge-sm">Laboratorio</span>
                  </div>
                </div>
                <div class="card-body p-4 d-flex flex-column">
                  <h4 class="h5 fw-bold text-primary-uim mb-3 font-headline">Caracterización de materiales</h4>
                  <p class="small text-on-surface-variant mb-4">Estudio de concreto de alto desempeño y polímeros para
                    ambientes de temperaturas extremas y corrosión.</p>
                  <button
                    class="btn btn-link text-secondary-uim fw-bold text-uppercase p-0 text-decoration-none d-flex align-items-center gap-2 mt-auto tracking-widest transition-all project-btn-details">
                    DETALLES <i class="bi bi-plus-circle icon-transition fs-5"></i>
                  </button>
                </div>
              </div>
            </div>

            <!-- Project Card 3 -->
            <div class="col-md-6 col-xl-4 mx-auto">
              <div
                class="card border border-secondary border-opacity-10 shadow-sm rounded-4 overflow-hidden h-100 card-hover-premium group-arrow-hover">
                <div class="position-relative overflow-hidden project-img-container">
                  <img alt="Inundaciones" class="w-100 h-100 object-fit-cover group-hover-scale project-img-scale"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDrDbey0ShAnsu7vb3f97Kaz6LzYMmiY3h3oDJYxkhBmVrncDVMYgvSGq_ImhhRO_MlfQUPcDiK9jUIbWF6LRWp7dGR26_yHKHlhhmU15A_dvqs6qFvNw5avLIt-GRxaFFTcX_Ddue2UlqObj6VoPV6_c_Qi6Qx5zq6XVLIhGJrOKRJOn0BOOILxWBd9vJVMNdkojUYvdjISXqQrx1V6bkt2hBKhklwUXrAbT_N1xpyiPqVW6oGg55BowyBtVyX_c2aBEi7JERqKA" />
                  <div class="position-absolute top-0 start-0 m-3 z-2">
                    <span
                      class="badge bg-unam text-white text-uppercase tracking-widest px-3 py-2 rounded-pill project-badge-sm">Planificación</span>
                  </div>
                </div>
                <div class="card-body p-4 d-flex flex-column">
                  <h4 class="h5 fw-bold text-primary-uim mb-3 font-headline">Análisis de inundaciones pluviales</h4>
                  <p class="small text-on-surface-variant mb-4">Determinación de puntos críticos de anegamiento en zonas
                    urbanas mediante topografía de alta precisión LIDAR.</p>
                  <button
                    class="btn btn-link text-secondary-uim fw-bold text-uppercase p-0 text-decoration-none d-flex align-items-center gap-2 mt-auto tracking-widest transition-all project-btn-details">
                    DETALLES <i class="bi bi-plus-circle icon-transition fs-5"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>

    </div>
  </div>
@endsection