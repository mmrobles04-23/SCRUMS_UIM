@extends('admin.layout')

@section('title', 'Administración — UIM')

@section('admin_content')
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
