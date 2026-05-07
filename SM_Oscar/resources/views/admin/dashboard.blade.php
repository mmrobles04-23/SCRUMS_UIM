@extends('admin.layout')

@section('title', 'Administración — UIM')

@section('admin_content')
    {{-- Bienvenida con info del usuario logeado --}}
    <div class="card border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, var(--unam-azul, #1E3C70) 0%, #2a4a7a 100%);">
        <div class="card-body p-4">
            <div class="d-flex flex-wrap align-items-center gap-3">
                {{-- Avatar/Icono del usuario --}}
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                     style="width: 60px; height: 60px; background: rgba(255,255,255,0.15);">
                    <i class="bi bi-person-circle text-white fs-2"></i>
                </div>
                
                {{-- Información del usuario --}}
                <div class="flex-grow-1">
                    <h2 class="h5 mb-1 text-white">
                        ¡Bienvenido, {{ auth()->user()->nombre ?? auth()->user()->name ?? 'Usuario' }}!
                    </h2>
                    <div class="d-flex flex-wrap gap-2 text-white-50 small">
                        <span class="d-inline-flex align-items-center gap-1">
                            <i class="bi bi-envelope"></i>
                            {{ auth()->user()->email }}
                        </span>
                        <span>|</span>
                        <span class="d-inline-flex align-items-center gap-1">
                            <i class="bi bi-shield-check"></i>
                            {{ auth()->user()->rol?->nombre ?? 'Administrador' }}
                        </span>
                        @if(auth()->user()->asignado && count(auth()->user()->asignado) > 0)
                            <span>|</span>
                            <span class="d-inline-flex align-items-center gap-1">
                                <i class="bi bi-building"></i>
                                {{ auth()->user()->asignado[0] ?? 'Sin asignación' }}
                            </span>
                        @endif
                    </div>
                </div>
                
                {{-- Estado de la cuenta --}}
                <div class="text-end">
                    @if(auth()->user()->active)
                        <span class="badge bg-success">
                            <i class="bi bi-check-circle me-1"></i>Cuenta Activa
                        </span>
                    @else
                        <span class="badge bg-danger">
                            <i class="bi bi-x-circle me-1"></i>Cuenta Inactiva
                        </span>
                    @endif
                    <div class="text-white-50 small mt-1">
                        <i class="bi bi-clock me-1"></i>
                        Sesión iniciada: {{ now()->format('d M Y, H:i') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="h4 mb-0 text-body">Panel administrativo</h1>
            <p class="text-body-secondary small mb-0">Acceso autorizado (administrador o desarrollador).</p>
        </div>
    </div>

    {{-- Estadísticas --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center p-3">
                    <div class="display-6" style="color: var(--unam-azul);">{{ $stats['usuarios'] }}</div>
                    <div class="small text-muted">Usuarios</div>
                    <small class="text-success">{{ $stats['usuarios_activos'] }} activos</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center p-3">
                    <div class="display-6" style="color: var(--fesa-verde);">{{ $stats['congresos_activos'] }}</div>
                    <div class="small text-muted">Congresos Activos</div>
                    <small class="text-body-secondary">de {{ $stats['congresos'] }} total</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center p-3">
                    <div class="display-6" style="color: var(--unam-dorado);">{{ $stats['departamentos_activos'] }}</div>
                    <div class="small text-muted">Departamentos</div>
                    <small class="text-body-secondary">{{ $stats['departamentos'] }} total</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center p-3">
                    <div class="display-6" style="color: var(--unam-azul);">{{ $stats['seminarios_proximos'] }}</div>
                    <div class="small text-muted">Seminarios Próximos</div>
                    <small class="text-body-secondary">{{ $stats['seminarios_publicados'] }} publicados</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-12 col-md-6 col-xl-4">
            <a class="text-decoration-none" href="{{ route('admin.departamentos.index') }}">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-3 d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: rgba(30,60,112,0.10);">
                                <i class="bi bi-diagram-3" style="color: var(--unam-azul);"></i>
                            </div>
                            <div>
                                <div class="fw-bold" style="color: var(--unam-dorado);">Departamentos</div>
                                <div class="small text-body-secondary">Catálogo y contenido</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
            <a class="text-decoration-none" href="{{ route('admin.seminarios.index') }}">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-3 d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: rgba(179,140,0,0.14);">
                                <i class="bi bi-easel2" style="color: var(--unam-dorado);"></i>
                            </div>
                            <div>
                                <div class="fw-bold" style="color: var(--unam-dorado);">Seminarios</div>
                                <div class="small text-body-secondary">Investigación</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
            <a class="text-decoration-none" href="{{ route('admin.congresos.index') }}">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-3 d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: rgba(11,121,29,0.12);">
                                <i class="bi bi-calendar-event" style="color: var(--fesa-verde);"></i>
                            </div>
                            <div>
                                <div class="fw-bold" style="color: var(--unam-dorado);">Congresos</div>
                                <div class="small text-body-secondary">Alta, edición y publicación</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
            <a class="text-decoration-none" href="{{ route('admin.usuarios.index') }}">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 20px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-3 d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: rgba(30,60,112,0.10); border-radius: 12px !important;">
                                <i class="bi bi-people" style="color: var(--unam-azul);"></i>
                            </div>
                            <div>
                                <div class="fw-bold" style="color: var(--unam-dorado);">Usuarios</div>
                                <div class="small text-body-secondary">Gestión de cuentas y roles</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
            <a class="text-decoration-none" href="{{ route('admin.welcome.edit') }}">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 20px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-3 d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: rgba(30,60,112,0.10);">
                                <i class="bi bi-house-door" style="color: var(--unam-azul);"></i>
                            </div>
                            <div>
                                <div class="fw-bold" style="color: var(--unam-dorado);">Página principal</div>
                                <div class="small text-body-secondary">Contenido de inicio (welcome)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    {{-- Actividad Reciente --}}
    <div class="row g-3 mt-2">
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h3 class="h6 mb-3" style="color: var(--unam-dorado);">
                        <i class="bi bi-clock-history me-2"></i>Congresos Recientes
                    </h3>
                    @if($actividad_reciente['congresos']->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach($actividad_reciente['congresos'] as $congreso)
                                <li class="list-group-item px-0 py-2 d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fw-medium">{{ \Illuminate\Support\Str::limit($congreso->titulo, 40) }}</div>
                                        <small class="text-muted">{{ $congreso->created_at->diffForHumans() }}</small>
                                    </div>
                                    @if($congreso->activo)
                                        <span class="badge text-bg-success">Activo</span>
                                    @else
                                        <span class="badge text-bg-secondary">Inactivo</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted small mb-0">No hay congresos registrados aún.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h3 class="h6 mb-3" style="color: var(--unam-dorado);">
                        <i class="bi bi-clock-history me-2"></i>Seminarios Recientes
                    </h3>
                    @if($actividad_reciente['seminarios']->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach($actividad_reciente['seminarios'] as $seminario)
                                <li class="list-group-item px-0 py-2 d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fw-medium">{{ \Illuminate\Support\Str::limit($seminario->titulo, 40) }}</div>
                                        <small class="text-muted">
                                            {{ $seminario->departamento?->siglas ?? 'Sin depto' }} • 
                                            {{ $seminario->created_at->diffForHumans() }}
                                        </small>
                                    </div>
                                    @if($seminario->estado === 'publicado')
                                        <span class="badge text-bg-success">Publicado</span>
                                    @elseif($seminario->estado === 'borrador')
                                        <span class="badge text-bg-secondary">Borrador</span>
                                    @else
                                        <span class="badge text-bg-danger">Cancelado</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted small mb-0">No hay seminarios registrados aún.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <style>
        .uim-header-institutional,
        footer {
            display: none !important;
        }
    </style>
@endpush
