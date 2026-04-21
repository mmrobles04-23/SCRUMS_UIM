@extends('admin.layout')

@section('title', 'Administración — UIM')

@section('admin_content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="h4 mb-0 text-body">Panel administrativo</h1>
            <p class="text-body-secondary small mb-0">Acceso autorizado (administrador o desarrollador).</p>
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
            <a class="text-decoration-none" href="{{ route('admin.welcome.edit') }}">
                <div class="card border-0 shadow-sm h-100">
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

@endsection
