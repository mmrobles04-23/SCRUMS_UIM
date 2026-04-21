@extends('admin.layout')

@section('title', 'Nuevo congreso')

@section('admin_content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <h1 class="h4 mb-0 text-body">Nuevo congreso</h1>
        <p class="text-body-secondary small mb-0">Crea un congreso para mostrarlo en el sitio público.</p>
    </div>
    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('admin.congresos.index') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
    </div>
</div>

<div class="card border-0 shadow-sm uim-page-shell">
    <div class="card-body p-4">
        <form method="POST" action="{{ route('admin.congresos.store') }}" enctype="multipart/form-data">
            @include('admin.congresos._form', ['congreso' => $congreso])
        </form>
    </div>
</div>
@endsection
