@extends('admin.layout')

@section('title', 'Departamentos — Administración')

@section('admin_content')
@php
    $departamentos = [
        ['siglas' => 'DTA', 'nombre' => 'Tecnología Ambiental', 'color' => '#78D64B', 'estado' => 'Activo'],
        ['siglas' => 'IPAJ', 'nombre' => 'Procuración y Administración de Justicia', 'color' => '#69B3E7', 'estado' => 'Activo'],
        ['siglas' => 'DPE', 'nombre' => 'Proyección Empresarial', 'color' => '#DF1995', 'estado' => 'Activo'],
        ['siglas' => 'DIE', 'nombre' => 'Investigación Educativa', 'color' => '#FA4616', 'estado' => 'Activo'],
    ];
@endphp

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <h1 class="h4 mb-0 text-body">Departamentos</h1>
        <p class="text-body-secondary small mb-0">Catálogo y presentación pública (solo vista, sin funcionalidad por ahora).</p>
    </div>
    <div class="d-flex flex-wrap gap-2">
        <button class="btn btn-warning btn-sm" type="button">Nuevo departamento</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm">Panel admin</a>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 small">
                <thead class="table-light">
                    <tr>
                        <th>Siglas</th>
                        <th>Nombre</th>
                        <th>Color</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departamentos as $d)
                        <tr>
                            <td class="fw-semibold">{{ $d['siglas'] }}</td>
                            <td>{{ $d['nombre'] }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="rounded-2" style="width: 18px; height: 18px; background: {{ $d['color'] }};"></span>
                                    <code class="small">{{ $d['color'] }}</code>
                                </div>
                            </td>
                            <td><span class="badge text-bg-success">{{ $d['estado'] }}</span></td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-1">
                                    <a class="btn btn-outline-secondary btn-sm" href="{{ url('/departamento?id=' . $d['siglas']) }}" target="_blank" rel="noopener noreferrer">Ver</a>
                                    <button class="btn btn-outline-primary btn-sm" type="button" disabled>Editar</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
