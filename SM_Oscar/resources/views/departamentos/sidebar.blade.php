{{--
    Componente: Sidebar de Departamentos (Desktop)
    Descripción: Navegación lateral para desktop con logo y lista de departamentos
--}}

<aside class="d-none d-lg-flex flex-column border-end bg-surface-container-low sidebar-container rounded-bottom-4 mb-4">
  <!-- Logo del Departamento Activo -->
  <div class="p-4 d-flex align-items-center justify-content-center border-bottom border-secondary border-opacity-10 bg-white shadow-sm">
    <img src="{{ asset('departamentos/' . $deptoActivo->logo) }}" alt="Logo {{ $deptoActivo->siglas }}"
      class="img-fluid object-fit-contain transition-all sidebar-logo">
  </div>

  <div class="p-4 mb-2">
    <h2 class="h6 fw-bold text-primary-uim text-uppercase tracking-widest mb-1 font-headline">Departamentos</h2>
    <p class="text-on-surface-variant small font-weight-medium mb-0">Red de Investigación</p>
  </div>

  <nav class="nav flex-column gap-2 px-3">
    @foreach($departamentos as $depto)
      @php $isActive = ($deptoActivo->siglas === $depto->siglas); @endphp
      <a class="nav-link px-3 py-2 rounded-3 d-flex align-items-center gap-3 transition-colors {{ $isActive ? 'active-depto shadow-sm fw-bold' : 'text-on-surface-variant hover-bg-surface-variant' }}"
        href="{{ url('/departamento/' . $depto->siglas) }}" title="{{ $depto->nombre }}">
        <i class="bi {{ $depto->icono }} fs-5"
          style="color: {{ $isActive ? 'var(--depto-color)' : 'inherit' }}"></i>
        <span class="small lh-sm {{ $isActive ? 'sidebar-text-active' : '' }}">Dpto. {{ $depto->siglas }}</span>
        <span class="small lh-sm depto-nombre d-none">{{ $depto->nombre }}</span>
      </a>
    @endforeach
  </nav>
</aside>
