@extends('admin.layout')

@section('title', 'Editar congreso')

@section('admin_content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <h1 class="h4 mb-0 text-body">Editar congreso</h1>
        <p class="text-body-secondary small mb-0">Actualiza la información y el estado de publicación.</p>
    </div>
    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('admin.congresos.index') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
        <a href="{{ route('congresos.show', $congreso) }}" class="btn btn-outline-secondary btn-sm" target="_blank" rel="noopener noreferrer">Ver público</a>
    </div>
</div>

<div class="card border-0 shadow-sm uim-page-shell">
    <div class="card-body p-4">
        <form method="POST" action="{{ route('admin.congresos.update', $congreso) }}" enctype="multipart/form-data">
            @include('admin.congresos._form', ['congreso' => $congreso, 'method' => 'PUT'])
        </form>
    </div>
</div>
@endsection
