{{--
    Componente: Perfil del Jefe de Departamento
    Descripción: Tarjeta con información del responsable del departamento
--}}

<div class="col-lg-4 order-2 order-lg-1">
  <div class="card text-white rounded-4 border-0 shadow card-hover-premium overflow-hidden h-100 profile-card">
    <div class="card-body p-3 p-md-4 p-xl-5 flex-column d-flex align-items-center text-center">
      <!-- Avatar más pequeño en móvil -->
      <div class="rounded-circle border border-3 border-md-4 overflow-hidden mb-3 mb-md-4 shadow border-depto profile-avatar" style="width: 80px; height: 80px; min-width: 80px;">
        @if($deptoActivo->imagen_coordinador)
          <img alt="{{ $deptoActivo->coordinador }}" class="w-100 h-100 object-fit-cover"
            src="{{ Storage::url($deptoActivo->imagen_coordinador) }}" />
        @else
          <img alt="Coordinador" class="w-100 h-100 object-fit-cover"
            src="https://ui-avatars.com/api/?name={{ urlencode($deptoActivo->coordinador ?? 'C') }}&background={{ ltrim($deptoActivo->color, '#') }}&color=fff&size=128" />
        @endif
      </div>
      <h3 class="h5 h-md-4 fw-bold mb-1 font-headline">{{ $deptoActivo->coordinador ?? 'Coordinador por designar' }}</h3>
      <p class="small fw-bold mb-3 mb-md-4 text-white-50">{{ $deptoActivo->cargo_coordinador ?? 'Jefe del Departamento' }}</p>

      <!-- Contacto compacto en móvil -->
      <div class="w-100 border-top border-white border-opacity-10 pt-3 pt-md-4 mt-auto text-start">
        <div class="row g-2 g-md-0">
          <div class="col-4 col-md-12 d-flex flex-column flex-md-row align-items-center align-items-md-start gap-1 gap-md-3 mb-md-3 text-center text-md-start">
            <i class="bi bi-building fs-6 fs-md-5 text-depto"></i>
            <span class="small font-light text-white-50" style="font-size: 0.7rem;">{{ $deptoActivo->oficina ?? 'Oficina por asignar' }}</span>
          </div>
          <div class="col-4 col-md-12 d-flex flex-column flex-md-row align-items-center align-items-md-start gap-1 gap-md-3 mb-md-3 text-center text-md-start">
            <i class="bi bi-telephone fs-6 fs-md-5 text-depto"></i>
            <span class="small font-light text-white-50" style="font-size: 0.7rem;">{{ $deptoActivo->telefono ?? 'Sin teléfono' }}</span>
          </div>
          <div class="col-4 col-md-12 d-flex flex-column flex-md-row align-items-center align-items-md-start gap-1 gap-md-3 text-center text-md-start">
            <i class="bi bi-envelope fs-6 fs-md-5 text-depto"></i>
            <span class="small font-light text-white-50 d-none d-md-inline" style="font-size: 0.75rem;">{{ $deptoActivo->email_contacto ?? 'Sin email' }}</span>
            <span class="small font-light text-white-50 d-md-none" style="font-size: 0.65rem;">Email</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
