@extends('admin.layout')

@section('title', 'Nuevo Usuario — UIM')

@section('admin_content')
    <div class="mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color: var(--unam-azul);">Panel</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.usuarios.index') }}" class="text-decoration-none" style="color: var(--unam-azul);">Usuarios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nuevo</li>
            </ol>
        </nav>
        <h1 class="h4 mb-0 text-body" style="font-weight: 700;">Nuevo Usuario</h1>
        <p class="text-body-secondary small">Registra un nuevo usuario en el sistema. Se le enviará un correo de bienvenida.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4" style="border-radius: 14px; background-color: #d1e7dd; color: #0f5132;">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        </div>
    @endif

    {{-- Formulario Principal --}}
    @include('admin.usuarios._form', ['user' => new App\Models\User()])

@endsection
