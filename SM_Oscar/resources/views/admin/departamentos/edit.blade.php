@extends('admin.layout')

@section('title', 'Editar Departamento — Administración')

@section('admin_content')
<div class="container py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="h4 mb-0 text-body">Editar Departamento</h1>
            <p class="text-body-secondary small mb-0">Modifica la información del departamento {{ $departamento->siglas }}.</p>
        </div>
        <a href="{{ route('admin.departamentos.index') }}" class="btn btn-outline-secondary btn-sm">Volver al listado</a>
    </div>

    @include('admin.departamentos._form', compact('departamento'))
</div>
@endsection
