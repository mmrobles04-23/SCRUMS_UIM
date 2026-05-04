@extends('admin.layout')

@section('title', 'Página principal — Administración')

@section('admin_content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <h1 class="h4 mb-0 text-body">Página principal (Welcome)</h1>
        <p class="text-body-secondary small mb-0">Edición de bloques de contenido para la página pública.</p>
    </div>
    <div class="d-flex flex-wrap gap-2">
        <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-sm" target="_blank" rel="noopener noreferrer">Ver público</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm">Panel admin</a>
    </div>
</div>

@if (session('status'))
    <div class="alert alert-success mb-4" role="alert">{{ session('status') }}</div>
@endif

<form action="{{ route('admin.welcome.update') }}" method="post" enctype="multipart/form-data">
    @csrf

    {{-- Slide Hero Carrusel --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">
            <h2 class="h6 mb-3" style="color: var(--unam-dorado);">
                <i class="bi bi-images me-2"></i>Hero - Carrusel
            </h2>
            <div class="row g-3">
                @for($i = 1; $i <= 3; $i++)
                    <div class="col-md-4">
                        <div class="border rounded p-3">
                            <h6 class="small fw-bold mb-2">Slide {{ $i }}</h6>
                            <div class="mb-2">
                                <input type="text" class="form-control form-control-sm" name="hero_slide{{ $i }}_titulo"
                                       value="{{ old('hero_slide'.$i.'_titulo', $settings['hero_slide'.$i.'_titulo']->value ?? '') }}"
                                       placeholder="Título slide {{ $i }}">
                            </div>
                            <div class="mb-2">
                                <input type="file" class="form-control form-control-sm" name="hero_slide{{ $i }}_imagen" accept="image/*">
                            </div>
                            @if(isset($settings['hero_slide'.$i.'_imagen']) && $settings['hero_slide'.$i.'_imagen']->value)
                                <img src="{{ Storage::url($settings['hero_slide'.$i.'_imagen']->value) }}" class="img-thumbnail" style="max-height: 80px;">
                            @endif
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    {{-- Propósito y Estadísticas --}}
    <div class="row g-3 mb-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h2 class="h6 mb-3" style="color: var(--unam-dorado);">
                        <i class="bi bi-bullseye me-2"></i>Sección Propósito
                    </h2>
                    <div class="mb-3">
                        <label class="form-label small">Etiqueta superior</label>
                        <input type="text" class="form-control" name="proposito_etiqueta"
                               value="{{ old('proposito_etiqueta', $settings['proposito_etiqueta']->value ?? 'Institucional') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Título</label>
                        <input type="text" class="form-control" name="proposito_titulo"
                               value="{{ old('proposito_titulo', $settings['proposito_titulo']->value ?? '¿Qué es la UIMA?') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Párrafo 1</label>
                        <textarea class="form-control" name="proposito_parrafo1" rows="3">{{ old('proposito_parrafo1', $settings['proposito_parrafo1']->value ?? '') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Párrafo 2</label>
                        <textarea class="form-control" name="proposito_parrafo2" rows="3">{{ old('proposito_parrafo2', $settings['proposito_parrafo2']->value ?? '') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Imagen lateral</label>
                        <input type="file" class="form-control" name="proposito_imagen" accept="image/*">
                        @if(isset($settings['proposito_imagen']) && $settings['proposito_imagen']->value)
                            <div class="mt-2">
                                <img src="{{ Storage::url($settings['proposito_imagen']->value) }}" class="img-thumbnail" style="max-height: 100px;">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h2 class="h6 mb-3" style="color: var(--unam-dorado);">
                        <i class="bi bi-graph-up me-2"></i>Estadísticas
                    </h2>
                    @for($i = 1; $i <= 3; $i++)
                        <div class="mb-3 p-2 border rounded">
                            <label class="form-label small fw-bold">Estadística {{ $i }}</label>
                            <input type="text" class="form-control form-control-sm mb-1" name="stat{{ $i }}_numero"
                                   value="{{ old('stat'.$i.'_numero', $settings['stat'.$i.'_numero']->value ?? '') }}"
                                   placeholder="Número (ej: 25+)">
                            <input type="text" class="form-control form-control-sm" name="stat{{ $i }}_label"
                                   value="{{ old('stat'.$i.'_label', $settings['stat'.$i.'_label']->value ?? '') }}"
                                   placeholder="Etiqueta">
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

    {{-- Departamentos --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">
            <h2 class="h6 mb-3" style="color: var(--unam-dorado);">
                <i class="bi bi-building me-2"></i>Sección Departamentos
            </h2>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label small">Etiqueta</label>
                    <input type="text" class="form-control" name="dept_etiqueta"
                           value="{{ old('dept_etiqueta', $settings['dept_etiqueta']->value ?? 'Estructura Académica') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label small">Título</label>
                    <input type="text" class="form-control" name="dept_titulo"
                           value="{{ old('dept_titulo', $settings['dept_titulo']->value ?? 'Nuestros Departamentos') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label small">Descripción</label>
                    <textarea class="form-control" name="dept_descripcion" rows="2">{{ old('dept_descripcion', $settings['dept_descripcion']->value ?? '') }}</textarea>
                </div>
            </div>
        </div>
    </div>

    {{-- Congresos --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">
            <h2 class="h6 mb-3" style="color: var(--unam-dorado);">
                <i class="bi bi-calendar-event me-2"></i>Sección Congresos
            </h2>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label small">Título</label>
                    <input type="text" class="form-control" name="congresos_titulo"
                           value="{{ old('congresos_titulo', $settings['congresos_titulo']->value ?? 'Congresos') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label small">Subtítulo</label>
                    <input type="text" class="form-control" name="congresos_subtitulo"
                           value="{{ old('congresos_subtitulo', $settings['congresos_subtitulo']->value ?? '') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label small">Mensaje sin congresos</label>
                    <input type="text" class="form-control" name="congresos_empty"
                           value="{{ old('congresos_empty', $settings['congresos_empty']->value ?? 'No hay congresos publicados.') }}">
                </div>
            </div>
        </div>
    </div>

    {{-- Noticias --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">
            <h2 class="h6 mb-3" style="color: var(--unam-dorado);">
                <i class="bi bi-newspaper me-2"></i>Sección Noticias
            </h2>
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label class="form-label small">Etiqueta</label>
                    <input type="text" class="form-control" name="noticias_etiqueta"
                           value="{{ old('noticias_etiqueta', $settings['noticias_etiqueta']->value ?? 'Actualidad') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label small">Título</label>
                    <input type="text" class="form-control" name="noticias_titulo"
                           value="{{ old('noticias_titulo', $settings['noticias_titulo']->value ?? 'Últimas Noticias') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label small">Texto del link</label>
                    <input type="text" class="form-control" name="noticias_link"
                           value="{{ old('noticias_link', $settings['noticias_link']->value ?? 'Ver todas') }}">
                </div>
            </div>

            {{-- Noticia 1, 2, 3 --}}
            <div class="row g-3">
                @for($i = 1; $i <= 3; $i++)
                    <div class="col-md-4">
                        <div class="border rounded p-3">
                            <h6 class="small fw-bold mb-2">Noticia {{ $i }}</h6>
                            <input type="text" class="form-control form-control-sm mb-2" name="noticia{{ $i }}_titulo"
                                   value="{{ old('noticia'.$i.'_titulo', $settings['noticia'.$i.'_titulo']->value ?? '') }}"
                                   placeholder="Título">
                            <textarea class="form-control form-control-sm mb-2" name="noticia{{ $i }}_resumen" rows="2"
                                      placeholder="Resumen">{{ old('noticia'.$i.'_resumen', $settings['noticia'.$i.'_resumen']->value ?? '') }}</textarea>
                            <div class="row g-2 mb-2">
                                <div class="col-6">
                                    <input type="text" class="form-control form-control-sm" name="noticia{{ $i }}_categoria"
                                           value="{{ old('noticia'.$i.'_categoria', $settings['noticia'.$i.'_categoria']->value ?? '') }}"
                                           placeholder="Categoría">
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control form-control-sm" name="noticia{{ $i }}_fecha"
                                           value="{{ old('noticia'.$i.'_fecha', $settings['noticia'.$i.'_fecha']->value ?? '') }}"
                                           placeholder="Fecha">
                                </div>
                            </div>
                            <input type="text" class="form-control form-control-sm mb-2" name="noticia{{ $i }}_link"
                                   value="{{ old('noticia'.$i.'_link', $settings['noticia'.$i.'_link']->value ?? '') }}"
                                   placeholder="URL del link">
                            <input type="file" class="form-control form-control-sm" name="noticia{{ $i }}_imagen" accept="image/*">
                            @if(isset($settings['noticia'.$i.'_imagen']) && $settings['noticia'.$i.'_imagen']->value)
                                <img src="{{ Storage::url($settings['noticia'.$i.'_imagen']->value) }}" class="img-thumbnail mt-2" style="max-height: 60px;">
                            @endif
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button type="submit" class="btn btn-warning btn-lg">
            <i class="bi bi-save me-2"></i>Guardar todos los cambios
        </button>
        <a href="{{ route('admin.welcome.edit') }}" class="btn btn-outline-secondary">Restaurar</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Panel admin</a>
    </div>
</form>
@endsection
