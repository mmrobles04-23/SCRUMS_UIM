@php
$isEdit = isset($departamento) && $departamento->id;
$action = $isEdit ? route('admin.departamentos.update', $departamento) : route('admin.departamentos.store');
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
                    <div class="col-md-6">
                        <label for="siglas" class="form-label">Siglas <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('siglas') is-invalid @enderror" 
                               id="siglas" name="siglas" value="{{ old('siglas', $departamento->siglas) }}" 
                               maxlength="10" required>
                        @error('siglas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Ej: DTA, IPAJ, DPE, DIE</small>
                    </div>

                    <div class="col-md-6">
                        <label for="color" class="form-label">Color Identidad <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="color" class="form-control form-control-color" id="color" name="color" 
                                   value="{{ old('color', $departamento->color ?? '#1E3C70') }}" required>
                            <input type="text" class="form-control @error('color') is-invalid @enderror" 
                                   id="colorText" value="{{ old('color', $departamento->color ?? '#1E3C70') }}" 
                                   maxlength="7" placeholder="#1E3C70">
                        </div>
                        @error('color')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="logo" class="form-label">Logo (nombre archivo)</label>
                        <input type="text" class="form-control @error('logo') is-invalid @enderror" 
                               id="logo" name="logo" value="{{ old('logo', $departamento->logo) }}" 
                               maxlength="255" placeholder="ej: uima_drna.png">
                        @error('logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Archivo en public/departamentos/</small>
                    </div>

                    <div class="col-md-6">
                        <label for="icono" class="form-label">Icono (clase Bootstrap)</label>
                        <input type="text" class="form-control @error('icono') is-invalid @enderror" 
                               id="icono" name="icono" value="{{ old('icono', $departamento->icono) }}" 
                               maxlength="50" placeholder="ej: bi-building">
                        @error('icono')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Ej: bi-tree, bi-bank, bi-briefcase</small>
                    </div>

                    <div class="col-12">
                        <label for="nombre" class="form-label">Nombre del Departamento <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre', $departamento->nombre) }}" 
                               maxlength="255" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="descripcion" class="form-label">Descripción Breve (para tarjetas)</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                  id="descripcion" name="descripcion" rows="2">{{ old('descripcion', $departamento->descripcion) }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="objetivo" class="form-label">Nuestro Objetivo</label>
                        <textarea class="form-control @error('objetivo') is-invalid @enderror" 
                                  id="objetivo" name="objetivo" rows="4" placeholder="Escribe el objetivo institucional del departamento...">{{ old('objetivo', $departamento->objetivo) }}</textarea>
                        @error('objetivo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body p-4">
                <h2 class="h6 mb-3" style="color: var(--unam-dorado);">Contacto y Coordinación</h2>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="coordinador" class="form-label">Coordinador</label>
                        <input type="text" class="form-control @error('coordinador') is-invalid @enderror" 
                               id="coordinador" name="coordinador" value="{{ old('coordinador', $departamento->coordinador) }}" 
                               maxlength="255">
                        @error('coordinador')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="cargo_coordinador" class="form-label">Cargo del Coordinador</label>
                        <input type="text" class="form-control @error('cargo_coordinador') is-invalid @enderror" 
                               id="cargo_coordinador" name="cargo_coordinador" value="{{ old('cargo_coordinador', $departamento->cargo_coordinador) }}" 
                               maxlength="255" placeholder="Jefe del Departamento">
                        @error('cargo_coordinador')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="oficina" class="form-label">Oficina</label>
                        <input type="text" class="form-control @error('oficina') is-invalid @enderror" 
                               id="oficina" name="oficina" value="{{ old('oficina', $departamento->oficina) }}" 
                               maxlength="255" placeholder="Edificio A, Oficina 101">
                        @error('oficina')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email_contacto" class="form-label">Email de Contacto</label>
                        <input type="email" class="form-control @error('email_contacto') is-invalid @enderror" 
                               id="email_contacto" name="email_contacto" value="{{ old('email_contacto', $departamento->email_contacto) }}" 
                               maxlength="255">
                        @error('email_contacto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control @error('telefono') is-invalid @enderror" 
                               id="telefono" name="telefono" value="{{ old('telefono', $departamento->telefono) }}" 
                               maxlength="50">
                        @error('telefono')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="orden" class="form-label">Orden de Visualización</label>
                        <input type="number" class="form-control @error('orden') is-invalid @enderror" 
                               id="orden" name="orden" value="{{ old('orden', $departamento->orden ?? 0) }}" 
                               min="0">
                        @error('orden')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Número menor = aparece primero</small>
                    </div>
                </div>
            </div>
        </div>

        {{-- Funciones Principales --}}
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h6 mb-0" style="color: var(--unam-dorado);">
                        <i class="bi bi-check-circle-fill me-2"></i>Funciones Principales
                    </h2>
                    <button type="button" class="btn btn-outline-warning btn-sm" onclick="addFuncion()">
                        <i class="bi bi-plus-lg me-1"></i>Añadir Función
                    </button>
                </div>
                
                <div id="funciones-container" class="row g-2">
                    @php $fList = old('funciones', $isEdit ? $departamento->funciones->pluck('descripcion')->toArray() : []); @endphp
                    @forelse($fList as $desc)
                        <div class="col-12 funcion-item">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-dot fs-4" style="color: var(--unam-dorado);"></i></span>
                                <input type="text" name="funciones[]" class="form-control border-start-0" value="{{ $desc }}" placeholder="Describa la función...">
                                <button type="button" class="btn btn-outline-danger" onclick="removeFuncion(this)"><i class="bi bi-trash"></i></button>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 funcion-item">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-dot fs-4" style="color: var(--unam-dorado);"></i></span>
                                <input type="text" name="funciones[]" class="form-control border-start-0" value="" placeholder="Describa la función...">
                                <button type="button" class="btn btn-outline-danger" onclick="removeFuncion(this)"><i class="bi bi-trash"></i></button>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h2 class="h6 mb-3" style="color: var(--unam-dorado);">Imagen y Estado</h2>

                <div class="mb-3">
                    <label for="imagen_banner" class="form-label">Imagen Banner</label>
                    <input type="file" class="form-control @error('imagen_banner') is-invalid @enderror" 
                           id="imagen_banner" name="imagen_banner" accept="image/*">
                    @error('imagen_banner')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Formatos: JPG, PNG. Máx: 4MB</small>
                </div>

                @if($isEdit && $departamento->imagen_banner)
                    <div class="mb-3">
                        <label class="form-label">Imagen Actual</label>
                        <div class="border rounded p-2">
                            <img src="{{ asset($departamento->imagen_banner) }}" alt="Banner" class="img-fluid rounded">
                        </div>
                        <small class="text-muted">Subir nueva imagen reemplazará la actual</small>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="imagen_coordinador" class="form-label">Imagen del Coordinador</label>
                    <input type="file" class="form-control @error('imagen_coordinador') is-invalid @enderror" 
                           id="imagen_coordinador" name="imagen_coordinador" accept="image/*">
                    @error('imagen_coordinador')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Foto del coordinador. Formatos: JPG, PNG. Máx: 2MB</small>
                </div>

                @if($isEdit && $departamento->imagen_coordinador)
                    <div class="mb-3">
                        <label class="form-label">Foto Actual</label>
                        <div class="border rounded p-2">
                            <img src="{{ Storage::url($departamento->imagen_coordinador) }}" alt="Coordinador" class="img-fluid rounded" style="max-height: 150px;">
                        </div>
                        <small class="text-muted">Subir nueva imagen reemplazará la actual</small>
                    </div>
                @endif

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="activo" name="activo" value="1" 
                               {{ old('activo', $departamento->activo ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="activo">Departamento Activo</label>
                    </div>
                    <small class="text-muted">Los departamentos inactivos no aparecen en el sitio público</small>
                </div>

                <hr class="my-4">

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-save me-2"></i>{{ $isEdit ? 'Guardar Cambios' : 'Crear Departamento' }}
                    </button>
                    <a href="{{ route('admin.departamentos.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    // Sincronizar input color con input text
    document.getElementById('color').addEventListener('input', function() {
        document.getElementById('colorText').value = this.value;
    });
    document.getElementById('colorText').addEventListener('input', function() {
        if(/^#[a-fA-F0-9]{6}$/.test(this.value)) {
            document.getElementById('color').value = this.value;
        }
    });

    // Lógica para Funciones Dinámicas
    function addFuncion() {
        const container = document.getElementById('funciones-container');
        const div = document.createElement('div');
        div.className = 'col-12 funcion-item';
        div.innerHTML = `
            <div class="input-group shadow-sm">
                <span class="input-group-text bg-white border-end-0"><i class="bi bi-dot fs-4" style="color: var(--unam-dorado);"></i></span>
                <input type="text" name="funciones[]" class="form-control border-start-0" value="" placeholder="Describa la función...">
                <button type="button" class="btn btn-outline-danger" onclick="removeFuncion(this)">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(div);
        div.querySelector('input').focus();
    }

    function removeFuncion(btn) {
        const items = document.querySelectorAll('.funcion-item');
        if (items.length > 1) {
            btn.closest('.funcion-item').remove();
        } else {
            btn.closest('.funcion-item').querySelector('input').value = '';
        }
    }
</script>
