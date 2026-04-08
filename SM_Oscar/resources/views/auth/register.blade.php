@extends('layouts.app')

@section('title', 'Registro')

@section('content')
    {{-- NOTA (Bootstrap): grid + card + componentes de formulario para consistencia visual. --}}
    {{-- NOTA (Estilo propio en app.css): `.uim-auth-wrapper`, `.uim-auth-card`, `.uim-auth-accent`, `.uim-auth-title`. --}}
    <div class="uim-auth-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-9">
                    <div class="card uim-auth-card">
                        <div class="row g-0">
                            <div class="col-md-5 uim-auth-accent p-4 d-flex flex-column justify-content-center">
                                {{-- NOTA (Estilo propio): logos UNAM/FES más grandes, blancos y separados por línea. --}}
                                <div class="uim-auth-logos">
                                    <img src="{{ asset('header/logo_unam.png') }}" alt="UNAM">
                                    {{-- NOTA (Bootstrap): borde; NOTA (app.css): .uim-auth-logos-divider. --}}
                                    <div class="border-start border-white opacity-50 uim-auth-logos-divider" role="presentation"></div>
                                    <img src="{{ asset('header/logo_unam_fesa.png') }}" alt="FES Acatlán">
                                </div>
                                <h2 class="h4 uim-auth-title mb-2">Registro UIM</h2>
                                <p class="mb-0 text-muted small">
                                    Crea tu cuenta para acceder a los recursos y actividades.
                                </p>
                            </div>

                            <div class="col-md-7 p-4">
                                <h1 class="h4 mb-3">Crear cuenta</h1>

                                @if ($errors->has('general'))
                                    <div class="alert alert-danger" role="alert">{{ $errors->first('general') }}</div>
                                @endif

                                <form method="POST" action="{{ route('web.register.submit') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Usuario</label>
                                        <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required autocomplete="username">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Correo</label>
                                        <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required autocomplete="email">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="nombre" class="form-label">Nombre(s)</label>
                                            <input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" class="form-control @error('nombre') is-invalid @enderror" required>
                                            @error('nombre')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="apellido_paterno" class="form-label">Apellido paterno</label>
                                            <input id="apellido_paterno" type="text" name="apellido_paterno" value="{{ old('apellido_paterno') }}" class="form-control @error('apellido_paterno') is-invalid @enderror" required>
                                            @error('apellido_paterno')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="apellido_materno" class="form-label">Apellido materno</label>
                                            <input id="apellido_materno" type="text" name="apellido_materno" value="{{ old('apellido_materno') }}" class="form-control @error('apellido_materno') is-invalid @enderror" required>
                                            @error('apellido_materno')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-warning">Crear cuenta</button>
                                    </div>
                                </form>

                                <hr class="my-4">

                                <a class="link-secondary" href="{{ route('web.login') }}">Ya tengo cuenta</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
