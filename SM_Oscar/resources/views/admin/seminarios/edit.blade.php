@extends('admin.layout')

@section('title', 'Editar Seminario — Administración')

@section('admin_content')
<div class="container py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="h4 mb-0 text-body">Editar Seminario</h1>
            <p class="text-body-secondary small mb-0">Modifica la información del seminario.</p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.seminarios.index') }}" class="btn btn-outline-secondary btn-sm">Volver al listado</a>
            <a href="{{ route('seminarios.index') }}" class="btn btn-outline-secondary btn-sm" target="_blank" rel="noopener noreferrer">Ver público</a>
        </div>
    </div>

    @include('admin.seminarios._form', compact('seminario', 'departamentos'))
</div>
@endsection
