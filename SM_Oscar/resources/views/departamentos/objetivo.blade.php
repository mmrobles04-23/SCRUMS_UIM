{{--
    Componente: Objetivo y Funciones del Departamento
    Descripción: Sección con el objetivo institucional y funciones principales
--}}

<section class="pb-4 pb-md-5 bg-surface-container-lowest mt-n4">
  <div class="container-fluid px-3 px-md-4 px-lg-5 pb-3 pb-md-4">
    <!-- Fila 1: Objetivo y Perfil - Objetivo primero en móvil -->
    <div class="row g-3 g-md-4">
      <!-- Sección: Nuestro Objetivo -->
      <div class="col-lg-8 order-1 order-lg-2">
        <div class="bg-surface-container-low p-3 p-md-4 p-md-5 rounded-4 shadow-sm border-depto objective-container h-100">
          <div class="d-flex align-items-center gap-2 gap-md-3 mb-3 mb-md-4">
            <i class="bi bi-journal-text fs-2 fs-md-1" style="color: var(--unam-dorado);"></i>
            <h2 class="h4 h-md-2 fw-bold mb-0 font-headline" style="color: var(--unam-dorado);">Nuestro Objetivo</h2>
          </div>
          <div class="d-flex align-items-center gap-2 gap-md-4">
            <div class="flex-grow-1">
              <p class="text-on-surface small lh-base lh-lg-md mb-0 font-body">
                {{ $deptoActivo->objetivo ?? $deptoActivo->descripcion }}
              </p>
            </div>
          </div>
        </div>
      </div>

      @include('departamentos.profile')
    </div>

    <!-- Fila 2: Funciones Principales -->
    <div class="row">
      <div class="col-12 mt-3 mt-md-4">
        <div class="bg-surface-container-low p-3 p-md-4 p-md-5 rounded-4 shadow-sm border-depto objective-container">
          <h3 class="h5 h-md-4 fw-bold mb-3 mb-md-4 d-flex align-items-center gap-2 gap-md-3 font-headline" style="color: var(--unam-dorado);">
            <i class="bi bi-check-circle-fill"></i> Funciones Principales
          </h3>

          <div class="row g-2 g-md-3">
            @forelse($deptoActivo->funciones as $funcion)
              <div class="col-12 col-md-6 d-flex gap-2 gap-md-3 align-items-start">
                <span class="fw-bold fs-5 fs-md-4 lh-1 flex-shrink-0" style="color: var(--depto-color);">•</span>
                <span class="text-on-surface-variant small pt-1">{{ $funcion->descripcion }}</span>
              </div>
            @empty
              <div class="col-12 text-muted small">No se han definido funciones para este departamento.</div>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
