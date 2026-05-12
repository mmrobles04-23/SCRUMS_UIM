@php
$isEdit = isset($user) && $user->id;
$action = $isEdit ? route('admin.usuarios.update', $user) : route('admin.usuarios.store');
@endphp

<form action="{{ $action }}" method="post" class="row g-4">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div class="col-12 col-lg-8">
        <div class="card border-0 shadow-sm" style="border-radius: 20px;">
            <div class="card-body p-4">
                <h2 class="h6 mb-3" style="color: var(--unam-dorado); font-weight: 700;">Información Personal</h2>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre(s) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre', $user->nombre ?? '') }}" 
                               maxlength="255" required style="border-radius: 8px;">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="apellido_paterno" class="form-label">Apellido Paterno <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('apellido_paterno') is-invalid @enderror" 
                               id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno', $user->apellido_paterno ?? '') }}" 
                               maxlength="255" required style="border-radius: 8px;">
                        @error('apellido_paterno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="apellido_materno" class="form-label">Apellido Materno <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('apellido_materno') is-invalid @enderror" 
                               id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno', $user->apellido_materno ?? '') }}" 
                               maxlength="255" required style="border-radius: 8px;">
                        @error('apellido_materno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Correo Electrónico <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email', $user->email ?? '') }}" 
                               maxlength="255" required style="border-radius: 8px;">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="name" class="form-label">Nombre de Usuario (Username) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $user->name ?? '') }}" 
                               maxlength="255" required style="border-radius: 8px;">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mt-4" style="border-radius: 20px;">
            <div class="card-body p-4">
                <h2 class="h6 mb-3" style="color: var(--unam-dorado); font-weight: 700;">Permisos y Roles</h2>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="permiso_id" class="form-label">Nivel de Permiso</label>
                        <select class="form-select @error('permiso_id') is-invalid @enderror" 
                                id="permiso_id" name="permiso_id" style="border-radius: 8px;">
                            <option value="">-- Sin permiso administrativo --</option>
                            @foreach($permisos as $permiso)
                                <option value="{{ $permiso->id }}" 
                                    {{ old('permiso_id', $user->permiso_id ?? '') == $permiso->id ? 'selected' : '' }}>
                                    {{ $permiso->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('permiso_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="rol_id" class="form-label">Rol Asignado</label>
                        <select class="form-select @error('rol_id') is-invalid @enderror" 
                                id="rol_id" name="rol_id" style="border-radius: 8px;">
                            <option value="">-- Sin rol asignado --</option>
                            @foreach($roles as $rol)
                                <option value="{{ $rol->id }}" 
                                    {{ old('rol_id', $user->rol_id ?? '') == $rol->id ? 'selected' : '' }}>
                                    {{ $rol->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('rol_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        @if(!$isEdit)
            <div class="card border-0 shadow-sm mt-4" style="border-radius: 20px;">
                <div class="card-body p-4">
                    <h2 class="h6 mb-3" style="color: var(--unam-dorado); font-weight: 700;">Contraseña</h2>
                    <p class="small text-muted mb-3">Si dejas este campo en blanco, el sistema generará una contraseña segura automáticamente y se la enviará al usuario por correo.</p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Contraseña (opcional)</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" style="border-radius: 8px;">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="col-12 col-lg-4">
        <div class="card border-0 shadow-sm" style="border-radius: 20px;">
            <div class="card-body p-4">
                <h2 class="h6 mb-3" style="color: var(--unam-dorado); font-weight: 700;">Estado de la Cuenta</h2>

                <div class="mb-4">
                    <div class="form-check form-switch">
                        {{-- Hidden input para enviar 0 cuando el checkbox no está marcado --}}
                        <input type="hidden" name="active" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" id="active" name="active" value="1" {{ old('active', $user->active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="active">Usuario Activo</label>
                    </div>
                    <small class="text-muted d-block mt-1">Los usuarios desactivados no pueden iniciar sesión.</small>
                </div>

                <hr class="my-4">

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning" style="background-color: var(--unam-dorado); border: none; color: white; font-weight: 600; border-radius: 8px;">
                        <i class="bi bi-save me-2"></i>{{ $isEdit ? 'Guardar Cambios' : 'Crear Usuario' }}
                    </button>
                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline-secondary" style="border-radius: 8px;">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</form>
