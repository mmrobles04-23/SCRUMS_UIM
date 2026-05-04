{{--
    Componente: Mobile Sidebar (Offcanvas)
    Descripción: Menú de navegación para dispositivos móviles
--}}

<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel" style="--depto-color: {{ $deptoActivo->color }};">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title fw-bold text-primary-uim" id="mobileSidebarLabel">
      <i class="bi bi-building me-2" style="color: var(--depto-color);"></i>
      Departamentos
    </h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body p-0">
    <nav class="nav flex-column">
      @foreach($departamentos as $depto)
        @php $isActive = ($deptoActivo->siglas === $depto->siglas); @endphp
        <a class="nav-link px-4 py-3 d-flex align-items-center gap-3 border-bottom {{ $isActive ? 'active-mobile-depto' : 'text-on-surface-variant' }}"
          href="{{ url('/departamento/' . $depto->siglas) }}"
          style="{{ $isActive ? 'background: linear-gradient(90deg, ' . $depto->color . '15 0%, transparent 100%); border-left: 4px solid ' . $depto->color . ';' : 'border-left: 4px solid transparent;' }}">
          <i class="bi {{ $depto->icono }} fs-5" style="color: {{ $isActive ? $depto->color : '#6c757d' }}"></i>
          <div class="d-flex flex-column">
            <span class="fw-semibold small">Dpto. {{ $depto->siglas }}</span>
            <span class="text-muted" style="font-size: 0.75rem; line-height: 1.3;">{{ Str::limit($depto->nombre, 35) }}</span>
          </div>
          @if($isActive)
            <i class="bi bi-chevron-right ms-auto" style="color: {{ $depto->color }}"></i>
          @endif
        </a>
      @endforeach
    </nav>
  </div>
</div>
