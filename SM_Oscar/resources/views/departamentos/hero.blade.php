{{--
    Componente: Hero Banner del Departamento
    Descripción: Banner principal con nombre del departamento y descripción
--}}

<section class="hero-modern">
  <!-- Botón hamburguesa para móvil -->
  <button class="btn btn-light mobile-menu-toggle d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar" style="--depto-color: {{ $deptoActivo->color }};">
    <i class="bi bi-list"></i>
  </button>
  <div class="hero-content">
    <div class="hero-badge">
      <i class="bi bi-building-gear me-2"></i>
      Departamento de Investigación
    </div>
    <h1 class="hero-title">{{ $deptoActivo->nombre }}</h1>
    <p class="hero-description">
      {{ $deptoActivo->descripcion ?? 'Investigación aplicada para comprender, prevenir y gestionar los retos que enfrentan la sociedad.' }}
    </p>
  </div>
  <div class="hero-accent"></div>
</section>
