{{-- NOTA (Bootstrap): form-control, form-label, form-check; multipart en create/edit. --}}
@csrf
@if(isset($method) && $method !== 'POST')
    @method($method)
@endif

<div class="mb-3">
    <label for="titulo" class="form-label">Título <span class="text-danger">*</span></label>
    <input type="text" name="titulo" id="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo', $congreso->titulo) }}" required maxlength="255">
    @error('titulo')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="slug" class="form-label">Slug (URL)</label>
    <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $congreso->slug) }}" maxlength="255" placeholder="se-genera-automaticamente-si-se-deja-vacio">
    <div class="form-text">Solo minúsculas, números y guiones. Ej.: congreso-investigacion-2026</div>
    @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="resumen" class="form-label">Resumen (tarjeta en inicio)</label>
    <textarea name="resumen" id="resumen" class="form-control @error('resumen') is-invalid @enderror" rows="2" maxlength="500">{{ old('resumen', $congreso->resumen) }}</textarea>
    @error('resumen')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción completa</label>
    <textarea name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="8">{{ old('descripcion', $congreso->descripcion) }}</textarea>
    @error('descripcion')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="row g-3">
    <div class="col-md-6">
        <label for="fecha_inicio" class="form-label">Fecha inicio</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" value="{{ old('fecha_inicio', optional($congreso->fecha_inicio)->format('Y-m-d')) }}">
        @error('fecha_inicio')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label for="fecha_fin" class="form-label">Fecha fin</label>
        <input type="date" name="fecha_fin" id="fecha_fin" class="form-control @error('fecha_fin') is-invalid @enderror" value="{{ old('fecha_fin', optional($congreso->fecha_fin)->format('Y-m-d')) }}">
        @error('fecha_fin')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<div class="mb-3 mt-3">
    <label for="sede" class="form-label">Sede</label>
    <input type="text" name="sede" id="sede" class="form-control @error('sede') is-invalid @enderror" value="{{ old('sede', $congreso->sede) }}" maxlength="255">
    @error('sede')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="imagen_portada" class="form-label">Imagen de portada</label>
    <input type="file" name="imagen_portada" id="imagen_portada" class="form-control @error('imagen_portada') is-invalid @enderror" accept="image/*">
    @error('imagen_portada')<div class="invalid-feedback">{{ $message }}</div>@enderror
    @if($congreso->imagen_portada)
        <div class="form-text">Imagen actual guardada. Sube un archivo para reemplazarla.</div>
        <img src="{{ $congreso->urlPortada() }}" alt="" class="img-thumbnail mt-2" style="max-height: 120px;">
    @endif
</div>

<div class="mb-3">
    <label for="enlace_inscripcion" class="form-label">Enlace inscripción (alumnos)</label>
    <input type="url" name="enlace_inscripcion" id="enlace_inscripcion" class="form-control @error('enlace_inscripcion') is-invalid @enderror" value="{{ old('enlace_inscripcion', $congreso->enlace_inscripcion) }}" placeholder="https://...">
    @error('enlace_inscripcion')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="enlace_programa" class="form-label">Enlace programa / convocatoria (PDF o página)</label>
    <input type="url" name="enlace_programa" id="enlace_programa" class="form-control @error('enlace_programa') is-invalid @enderror" value="{{ old('enlace_programa', $congreso->enlace_programa) }}" placeholder="https://...">
    @error('enlace_programa')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="enlace_sitio_web" class="form-label">Sitio web del congreso</label>
    <input type="url" name="enlace_sitio_web" id="enlace_sitio_web" class="form-control @error('enlace_sitio_web') is-invalid @enderror" value="{{ old('enlace_sitio_web', $congreso->enlace_sitio_web) }}" placeholder="https://...">
    @error('enlace_sitio_web')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="form-check mb-4">
    <input type="hidden" name="activo" value="0">
    <input type="checkbox" name="activo" id="activo" class="form-check-input" value="1" @checked(old('activo', $congreso->activo ?? true))>
    <label class="form-check-label" for="activo">Congreso visible en el sitio público</label>
</div>

<div class="d-flex flex-wrap gap-2">
    <button type="submit" class="btn btn-warning">Guardar</button>
    <a href="{{ route('admin.congresos.index') }}" class="btn btn-outline-secondary">Cancelar</a>
</div>
