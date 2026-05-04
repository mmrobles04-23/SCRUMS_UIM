@extends('admin.layout')

@section('title', 'Seminarios — Administración')

@section('admin_content')
<div class="container py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="h4 mb-0 text-body">Seminarios</h1>
            <p class="text-body-secondary small mb-0">Administración de seminarios de investigación.</p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.seminarios.create') }}" class="btn btn-warning btn-sm">Nuevo seminario</a>
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
                            <th>Título</th>
                            <th>Ponente</th>
                            <th>Departamento</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($seminarios as $s)
                            <tr>
                                <td class="fw-medium">{{ \Illuminate\Support\Str::limit($s->titulo, 40) }}</td>
                                <td>{{ $s->ponente }}</td>
                                <td>{{ $s->departamento?->siglas ?? '—' }}</td>
                                <td>
                                    @if($s->fecha_inicio)
                                        {{ $s->fecha_inicio->format('Y-m-d H:i') }}
                                    @else
                                        —
                                    @endif
                                </td>
                                <td>
                                    @if($s->estado === 'publicado')
                                        <span class="badge text-bg-success">Publicado</span>
                                    @elseif($s->estado === 'borrador')
                                        <span class="badge text-bg-secondary">Borrador</span>
                                    @else
                                        <span class="badge text-bg-danger">Cancelado</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end gap-1">
                                        <a class="btn btn-outline-secondary btn-sm" href="{{ url('/investigacion') }}" target="_blank" rel="noopener noreferrer">Ver</a>
                                        <a href="{{ route('admin.seminarios.edit', $s) }}" class="btn btn-outline-primary btn-sm">Editar</a>
                                        <form action="{{ route('admin.seminarios.destroy', $s) }}" method="post" class="d-inline" onsubmit="return confirm('¿Eliminar este seminario?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-body-secondary py-4">No hay seminarios registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $seminarios->links() }}
    </div>
</div>
@endsection
