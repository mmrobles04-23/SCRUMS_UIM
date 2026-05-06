@extends('admin.layout')

@section('title', 'Usuarios — UIM')

@section('admin_content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="h4 mb-0 text-body" style="font-weight: 700;">Gestión de Usuarios</h1>
            <p class="text-body-secondary small mb-0">Listado total de usuarios registrados en el sistema.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4" style="border-radius: 14px; background-color: #d1e7dd; color: #0f5132;">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm" style="border-radius: 20px; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead style="background-color: #f8f9fa;">
                    <tr>
                        <th class="px-4 py-3" style="color: var(--unam-azul); font-weight: 600; font-size: 0.85rem; text-transform: uppercase;">Usuario</th>
                        <th class="py-3" style="color: var(--unam-azul); font-weight: 600; font-size: 0.85rem; text-transform: uppercase;">Correo</th>
                        <th class="py-3" style="color: var(--unam-azul); font-weight: 600; font-size: 0.85rem; text-transform: uppercase;">Rol / Permiso</th>
                        <th class="py-3" style="color: var(--unam-azul); font-weight: 600; font-size: 0.85rem; text-transform: uppercase;">Estado</th>
                        <th class="px-4 py-3 text-end" style="color: var(--unam-azul); font-weight: 600; font-size: 0.85rem; text-transform: uppercase;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="px-4 py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" 
                                         style="width: 38px; height: 38px; background-color: var(--unam-azul); font-weight: 600; font-size: 0.9rem;">
                                        {{ substr($user->nombre, 0, 1) }}{{ substr($user->apellido_paterno, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold text-body" style="font-size: 0.95rem;">{{ $user->nombre }} {{ $user->apellido_paterno }}</div>
                                        <div class="text-body-secondary small">{{ $user->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 small text-body">{{ $user->email }}</td>
                            <td class="py-3">
                                @if($user->permiso)
                                    <span class="badge" style="background-color: rgba(30,60,112,0.1); color: var(--unam-azul); border-radius: 14px; font-weight: 600;">
                                        {{ $user->permiso->nombre }}
                                    </span>
                                @endif
                                @if($user->rol)
                                    <span class="badge" style="background-color: rgba(179,140,0,0.1); color: var(--unam-dorado); border-radius: 14px; font-weight: 600;">
                                        {{ $user->rol->nombre }}
                                    </span>
                                @endif
                                @if(!$user->permiso && !$user->rol)
                                    <span class="text-muted small">Usuario Final</span>
                                @endif
                            </td>
                            <td class="py-3">
                                @if($user->active)
                                    <span class="badge" style="background-color: rgba(11,121,29,0.1); color: var(--fesa-verde); border-radius: 14px; font-weight: 600;">
                                        Activo
                                    </span>
                                @else
                                    <span class="badge" style="background-color: rgba(106,106,106,0.1); color: #6a6a6a; border-radius: 14px; font-weight: 600;">
                                        Inactivo
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.usuarios.edit', $user) }}" class="btn btn-sm btn-outline-primary" style="border-radius: 8px;" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    
                                    <form action="{{ route('admin.usuarios.status.toggle', $user) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="active" value="{{ $user->active ? 0 : 1 }}">
                                        <button type="submit" class="btn btn-sm {{ $user->active ? 'btn-outline-danger' : 'btn-outline-success' }}" style="border-radius: 8px;" title="{{ $user->active ? 'Desactivar' : 'Activar' }}">
                                            <i class="bi {{ $user->active ? 'bi-person-x' : 'bi-person-check' }}"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($users->hasPages())
            <div class="card-footer bg-white border-0 px-4 py-3">
                {{ $users->links() }}
            </div>
        @endif
    </div>
@endsection
