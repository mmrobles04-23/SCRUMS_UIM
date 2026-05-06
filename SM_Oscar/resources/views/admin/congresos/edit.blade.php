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

@php
    $totalInscritos = $congreso->totalInscritos();
    $cupoMaximo = $congreso->cupo ?? 0;
@endphp

<div class="row g-4">
    {{-- Columna izquierda: Formulario --}}
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm uim-page-shell">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('admin.congresos.update', $congreso) }}" enctype="multipart/form-data">
                    @include('admin.congresos._form', ['congreso' => $congreso, 'method' => 'PUT'])
                </form>
            </div>
        </div>
    </div>
    
    {{-- Columna derecha: Inscripciones --}}
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header text-white" style="background-color: var(--unam-azul, #1E3C70);">
                <h5 class="mb-0"><i class="bi bi-people me-2"></i>Inscripciones</h5>
            </div>
            <div class="card-body">
                {{-- Contador de inscritos --}}
                <div class="text-center mb-3">
                    <h2 class="display-4 fw-bold" style="color: var(--unam-azul, #1E3C70);">{{ $totalInscritos }}</h2>
                    <p class="text-muted mb-0">inscritos</p>
                </div>
                
                {{-- Barra de progreso y estado del cupo --}}
                @if($cupoMaximo > 0)
                    @php $porcentaje = min(100, round(($totalInscritos / $cupoMaximo) * 100)); @endphp
                    <div class="mb-2">
                        <div class="d-flex justify-content-between small mb-1">
                            <span>Cupo máximo: {{ $cupoMaximo }}</span>
                            <span>{{ $porcentaje }}%</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar {{ $porcentaje >= 100 ? 'bg-danger' : 'bg-success' }}" role="progressbar" style="width: {{ $porcentaje }}%;"></div>
                        </div>
                    </div>
                    @if($totalInscritos >= $cupoMaximo)
                        <div class="alert alert-warning py-2 mb-0">
                            <i class="bi bi-exclamation-triangle me-1"></i>Cupo lleno
                        </div>
                    @else
                        <div class="alert alert-info py-2 mb-0">
                            <i class="bi bi-info-circle me-1"></i>Quedan {{ $cupoMaximo - $totalInscritos }} lugares
                        </div>
                    @endif
                @else
                    <div class="alert alert-light py-2 mb-0">
                        <i class="bi bi-infinity me-1"></i>Cupo ilimitado
                    </div>
                @endif
                
                {{-- Botón ver inscripciones --}}
                <a href="{{ route('admin.inscripciones_congresos.index', ['congreso_id' => $congreso->id]) }}" class="btn btn-outline-primary w-100 mt-3">
                    <i class="bi bi-list me-1"></i>Ver inscripciones
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
