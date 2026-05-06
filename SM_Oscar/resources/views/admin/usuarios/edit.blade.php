@extends('admin.layout')

@section('title', 'Editar Usuario — UIM')

@section('admin_content')
    <div class="mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color: var(--unam-azul);">Panel</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.usuarios.index') }}" class="text-decoration-none" style="color: var(--unam-azul);">Usuarios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>
        <h1 class="h4 mb-0 text-body" style="font-weight: 700;">Editar Usuario</h1>
        <p class="text-body-secondary small">Actualiza la información de <strong>{{ $user->nombre }} {{ $user->apellido_paterno }}</strong></p>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4" style="border-radius: 14px; background-color: #d1e7dd; color: #0f5132;">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        </div>
    @endif

    {{-- Formulario Principal --}}
    @include('admin.usuarios._form')

    {{-- Sección de Cambio de Contraseña --}}
    <div class="row mt-4">
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                <div class="card-body p-4">
                    <h2 class="h6 mb-3" style="color: var(--unam-dorado); font-weight: 700;">Cambiar Contraseña</h2>
                    
                    <form action="{{ route('admin.usuarios.password.update', $user) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Nueva Contraseña</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       id="password" name="password" required style="border-radius: 8px;">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                                <input type="password" class="form-control" 
                                       id="password_confirmation" name="password_confirmation" required style="border-radius: 8px;">
                            </div>
                            
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-outline-dark" style="border-radius: 8px; font-weight: 500;">
                                    Actualizar Contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
