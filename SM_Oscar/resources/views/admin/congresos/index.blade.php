@extends('layouts.app')

@section('title', 'Congresos — Administración')

@section('content')
<div class="container py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="h4 mb-0 text-body">Congresos</h1>
            <p class="text-body-secondary small mb-0">Alta, edición y publicación en la página de inicio.</p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.congresos.create') }}" class="btn btn-warning btn-sm">Nuevo congreso</a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm">Panel admin</a>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="alert">{{ session('status') }}</div>
    @endif

    <div class="card border-0 shadow-sm uim-page-shell">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 small">
                    <thead class="table-light">
                        <tr>
                            <th>Título</th>
                            <th>Slug</th>
                            <th>Fechas</th>
                            <th>Estado</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($congresos as $c)
                            <tr>
                                <td class="fw-medium">{{ \Illuminate\Support\Str::limit($c->titulo, 40) }}</td>
                                <td><code class="small">{{ $c->slug }}</code></td>
                                <td>
                                    @if($c->fecha_inicio)
                                        {{ $c->fecha_inicio->format('Y-m-d') }}
                                        @if($c->fecha_fin) — {{ $c->fecha_fin->format('Y-m-d') }} @endif
                                    @else
                                        —
                                    @endif
                                </td>
                                <td>
                                    @if($c->activo)
                                        <span class="badge text-bg-success">Activo</span>
                                    @else
                                        <span class="badge text-bg-secondary">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="d-flex flex-wrap justify-content-end gap-1">
                                        <a href="{{ route('congresos.show', $c) }}" class="btn btn-outline-secondary btn-sm" target="_blank" rel="noopener noreferrer" title="Ver público">Ver</a>
                                        <a href="{{ route('admin.congresos.edit', $c) }}" class="btn btn-outline-primary btn-sm">Editar</a>
                                        <form action="{{ route('admin.congresos.toggle-activo', $c) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-outline-dark btn-sm">{{ $c->activo ? 'Desactivar' : 'Activar' }}</button>
                                        </form>
                                        <form action="{{ route('admin.congresos.destroy', $c) }}" method="post" class="d-inline" onsubmit="return confirm('¿Eliminar este congreso?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-body-secondary py-4">No hay congresos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $congresos->links() }}
    </div>
</div>
@endsection
