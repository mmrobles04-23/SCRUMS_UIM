@php
$isEdit = isset($seminario) && $seminario->id;
$action = $isEdit ? route('admin.seminarios.update', $seminario) : route('admin.seminarios.store');
$method = $isEdit ? 'PUT' : 'POST';
@endphp

<form action="{{ $action }}" method="post" enctype="multipart/form-data" class="row g-4">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div class="col-12 col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h2 class="h6 mb-3" style="color: var(--unam-dorado);">Información General</h2>

                <div class="row g-3">
                    <div class="col-12">
                        <label for="titulo" class="form-label">Título del Seminario <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('titulo') is-invalid @enderror" 
                               id="titulo" name="titulo" value="{{ old('titulo', $seminario->titulo) }}" 
                               maxlength="255" required>
                        @error('titulo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="slug" class="form-label">Slug (URL amigable)</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                               id="slug" name="slug" value="{{ old('slug', $seminario->slug) }}" 
                               maxlength="255" placeholder="separado-por-guiones">
                        <small class="text-muted">Se genera automáticamente si se deja vacío</small>
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                  id="descripcion" name="descripcion" rows="4">{{ old('descripcion', $seminario->descripcion) }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body p-4">
                <h2 class="h6 mb-3" style="color: var(--unam-dorado);">Información del Ponente</h2>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="ponente" class="form-label">Ponente <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('ponente') is-invalid @enderror" 
                               id="ponente" name="ponente" value="{{ old('ponente', $seminario->ponente) }}" 
                               maxlength="255" required>
                        @error('ponente')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="institucion_ponente" class="form-label">Institución del Ponente</label>
                        <input type="text" class="form-control @error('institucion_ponente') is-invalid @enderror" 
                               id="institucion_ponente" name="institucion_ponente" 
                               value="{{ old('institucion_ponente', $seminario->institucion_ponente) }}" 
                               maxlength="255">
                        @error('institucion_ponente')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body p-4">
                <h2 class="h6 mb-3" style="color: var(--unam-dorado);">Fecha y Lugar</h2>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="fecha_inicio" class="form-label">Fecha y Hora de Inicio <span class="text-danger">*</span></label>
                        <input type="datetime-local" class="form-control @error('fecha_inicio') is-invalid @enderror" 
                               id="fecha_inicio" name="fecha_inicio" 
                               value="{{ old('fecha_inicio', $seminario->fecha_inicio?->format('Y-m-d\TH:i')) }}" 
                               required>
                        @error('fecha_inicio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="fecha_fin" class="form-label">Fecha y Hora de Fin</label>
                        <input type="datetime-local" class="form-control @error('fecha_fin') is-invalid @enderror" 
                               id="fecha_fin" name="fecha_fin" 
                               value="{{ old('fecha_fin', $seminario->fecha_fin?->format('Y-m-d\TH:i')) }}">
                        @error('fecha_fin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="lugar" class="form-label">Lugar</label>
                        <input type="text" class="form-control @error('lugar') is-invalid @enderror" 
                               id="lugar" name="lugar" value="{{ old('lugar', $seminario->lugar) }}" 
                               maxlength="255">
                        @error('lugar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="departamento_id" class="form-label">Departamento</label>
                        <select class="form-select @error('departamento_id') is-invalid @enderror" 
                                id="departamento_id" name="departamento_id">
                            <option value="">-- Seleccionar departamento --</option>
                            @foreach($departamentos ?? [] as $depto)
                                <option value="{{ $depto->id }}" 
                                    {{ old('departamento_id', $seminario->departamento_id) == $depto->id ? 'selected' : '' }}>
                                    {{ $depto->siglas }} - {{ $depto->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('departamento_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h2 class="h6 mb-3" style="color: var(--unam-dorado);">Publicación y Recursos</h2>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado <span class="text-danger">*</span></label>
                    <select class="form-select @error('estado') is-invalid @enderror" 
                            id="estado" name="estado" required>
                        <option value="borrador" {{ old('estado', $seminario->estado) === 'borrador' ? 'selected' : '' }}>Borrador</option>
                        <option value="publicado" {{ old('estado', $seminario->estado) === 'publicado' ? 'selected' : '' }}>Publicado</option>
                        <option value="cancelado" {{ old('estado', $seminario->estado) === 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                    </select>
                    @error('estado')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="imagen_banner" class="form-label">Imagen Banner</label>
                    <input type="file" class="form-control @error('imagen_banner') is-invalid @enderror" 
                           id="imagen_banner" name="imagen_banner" accept="image/*">
                    @error('imagen_banner')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Formatos: JPG, PNG. Máx: 4MB</small>
                </div>

                @if($isEdit && $seminario->imagen_banner)
                    <div class="mb-3">
                        <label class="form-label">Imagen Actual</label>
                        <div class="border rounded p-2">
                            <img src="{{ asset($seminario->imagen_banner) }}" alt="Banner" class="img-fluid rounded">
                        </div>
                        <small class="text-muted">Subir nueva imagen reemplazará la actual</small>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="enlace_material" class="form-label">Enlace a Material</label>
                    <input type="url" class="form-control @error('enlace_material') is-invalid @enderror" 
                           id="enlace_material" name="enlace_material" 
                           value="{{ old('enlace_material', $seminario->enlace_material) }}" 
                           maxlength="2048" placeholder="https://...">
                    @error('enlace_material')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">URL a presentación, video, o documentos</small>
                </div>

                <hr class="my-4">

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-save me-2"></i>{{ $isEdit ? 'Guardar Cambios' : 'Crear Seminario' }}
                    </button>
                    <a href="{{ route('admin.seminarios.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</form>
