@extends('admin.layout')

@section('title', 'Nuevo Seminario — Administración')

@section('admin_content')
<div class="container py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="h4 mb-0 text-body">Nuevo Seminario</h1>
            <p class="text-body-secondary small mb-0">Crea un nuevo seminario de investigación.</p>
        </div>
        <a href="{{ route('admin.seminarios.index') }}" class="btn btn-outline-secondary btn-sm">Volver al listado</a>
    </div>

    @include('admin.seminarios._form', ['seminario' => new \App\Models\Seminario])
</div>
@endsection
