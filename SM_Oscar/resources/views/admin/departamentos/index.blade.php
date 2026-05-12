@extends('admin.layout')

@section('title', 'Departamentos — Administración')

@section('admin_content')
<div class="container py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="h4 mb-0 text-body">Departamentos</h1>
            <p class="text-body-secondary small mb-0">Catálogo y presentación pública. Gestiona los departamentos de investigación.</p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.departamentos.create') }}" class="btn btn-warning btn-sm">Nuevo departamento</a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm">Panel admin</a>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="alert">{{ session('status') }}</div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 small">
                    <thead class="table-light">
                        <tr>
                            <th>Siglas</th>
                            <th>Nombre</th>
                            <th>Color</th>
                            <th>Coordinador</th>
                            <th>Estado</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($departamentos as $d)
                            <tr>
                                <td class="fw-semibold">{{ $d->siglas }}</td>
                                <td>{{ $d->nombre }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="rounded-2" style="width: 18px; height: 18px; background: {{ $d->color }}; border: 1px solid #ddd;"></span>
                                        <code class="small">{{ $d->color }}</code>
                                    </div>
                                </td>
                                <td>{{ $d->coordinador ?? '—' }}</td>
                                <td>
                                    @if($d->activo)
                                        <span class="badge text-bg-success">Activo</span>
                                    @else
                                        <span class="badge text-bg-secondary">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end gap-1">
                                        <a class="btn btn-outline-secondary btn-sm" href="{{ route('departamento.show', ['siglas' => $d->siglas]) }}" target="_blank" rel="noopener noreferrer">Ver</a>
                                        <a href="{{ route('admin.departamentos.edit', $d) }}" class="btn btn-outline-primary btn-sm">Editar</a>
                                        <form action="{{ route('admin.departamentos.destroy', $d) }}" method="post" class="d-inline" onsubmit="return confirm('¿Eliminar este departamento?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-body-secondary py-4">No hay departamentos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $departamentos->links() }}
    </div>
</div>
@endsection
