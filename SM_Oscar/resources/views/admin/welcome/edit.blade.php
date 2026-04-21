@extends('admin.layout')

@section('title', 'Página principal — Administración')

@section('admin_content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <h1 class="h4 mb-0 text-body">Página principal (Welcome)</h1>
        <p class="text-body-secondary small mb-0">Edición de bloques de contenido para la página pública (solo vista, sin guardar por ahora).</p>
    </div>
    <div class="d-flex flex-wrap gap-2">
        <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-sm" target="_blank" rel="noopener noreferrer">Ver público</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm">Panel admin</a>
    </div>
</div>

<div class="row g-3">
    <div class="col-12 col-lg-7">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
                <h2 class="h6 mb-3" style="color: var(--unam-dorado);">Configuración visual</h2>

                <div class="mb-3">
                    <label class="form-label">Título principal</label>
                    <input type="text" class="form-control" value="Unidad de Investigación Multidisciplinaria Aplicada" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Texto de introducción</label>
                    <textarea class="form-control" rows="4" disabled>Contenido de presentación para la página principal...</textarea>
                </div>

                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-warning" type="button" disabled>Guardar cambios</button>
                    <button class="btn btn-outline-secondary" type="button" disabled>Restaurar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h2 class="h6 mb-3" style="color: var(--unam-dorado);">Atajos</h2>

                <div class="d-grid gap-2">
                    <a class="btn btn-outline-secondary" href="{{ route('admin.congresos.index') }}">Congresos</a>
                    <a class="btn btn-outline-secondary" href="{{ route('admin.seminarios.index') }}">Seminarios</a>
                    <a class="btn btn-outline-secondary" href="{{ route('admin.departamentos.index') }}">Departamentos</a>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mt-3">
            <div class="card-body p-4">
                <h2 class="h6 mb-3" style="color: var(--unam-dorado);">Vista previa</h2>
                <div class="ratio ratio-16x9 rounded-3 overflow-hidden" style="background: #f2f2f2;">
                    <div class="d-flex align-items-center justify-content-center text-body-secondary small">
                        Preview (pendiente)
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
