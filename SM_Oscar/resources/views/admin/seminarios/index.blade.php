@extends('admin.layout')

@section('title', 'Seminarios — Administración')

@section('admin_content')
@php
    $seminarios = [
        ['titulo' => 'Seminario de Investigación I', 'ponente' => 'Dra. Ana Pérez', 'fecha' => '2026-05-12', 'estado' => 'Publicado'],
        ['titulo' => 'Seminario de Riesgos Naturales', 'ponente' => 'Mtro. Luis Gómez', 'fecha' => '2026-06-03', 'estado' => 'Borrador'],
        ['titulo' => 'Metodologías Aplicadas', 'ponente' => 'Dra. Karla Ruiz', 'fecha' => '2026-06-20', 'estado' => 'Publicado'],
    ];
@endphp

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <h1 class="h4 mb-0 text-body">Seminarios</h1>
        <p class="text-body-secondary small mb-0">Administración de seminarios de investigación (solo vista, sin funcionalidad por ahora).</p>
    </div>
    <div class="d-flex flex-wrap gap-2">
        <button class="btn btn-warning btn-sm" type="button" disabled>Nuevo seminario</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm">Panel admin</a>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 small">
                <thead class="table-light">
                    <tr>
                        <th>Título</th>
                        <th>Ponente</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($seminarios as $s)
                        <tr>
                            <td class="fw-medium">{{ $s['titulo'] }}</td>
                            <td>{{ $s['ponente'] }}</td>
                            <td><code class="small">{{ $s['fecha'] }}</code></td>
                            <td>
                                @if($s['estado'] === 'Publicado')
                                    <span class="badge text-bg-success">Publicado</span>
                                @else
                                    <span class="badge text-bg-secondary">Borrador</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-1">
                                    <a class="btn btn-outline-secondary btn-sm" href="{{ url('/investigacion') }}" target="_blank" rel="noopener noreferrer">Ver</a>
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
