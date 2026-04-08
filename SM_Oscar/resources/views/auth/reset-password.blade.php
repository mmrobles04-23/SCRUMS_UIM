@extends('layouts.app')

@section('title', 'Restablecer contraseña')

@section('content')
    {{-- NOTA (Bootstrap): formularios con `form-control` + estados `is-invalid` y mensajes con `invalid-feedback`. --}}
    {{-- NOTA (Estilo propio): clases `uim-auth-*` definidas en app.css para dar identidad UNAM sin duplicar HTML. --}}
    <div class="uim-auth-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="card uim-auth-card">
                        <div class="row g-0">
                            <div class="col-md-5 uim-auth-accent p-4 d-flex flex-column justify-content-center">
                                {{-- NOTA (Estilo propio): logos UNAM/FES más grandes, blancos y separados por línea. --}}
                                <div class="uim-auth-logos">
                                    <img src="{{ asset('header/logo_unam.png') }}" alt="UNAM">
                                    {{-- NOTA (Bootstrap + app.css): mismo separador que login/register. --}}
                                    <div class="border-start border-white opacity-50 uim-auth-logos-divider" role="presentation"></div>
                                    <img src="{{ asset('header/logo_unam_fesa.png') }}" alt="FES Acatlán">
                                </div>
                                <h2 class="h4 uim-auth-title mb-2">Restablecer</h2>
                                <p class="mb-0 text-muted small">
                                    Ingresa el código (8 dígitos) y define tu nueva contraseña.
                                </p>
                            </div>

                            <div class="col-md-7 p-4">
                                <h1 class="h4 mb-3">Restablecer contraseña</h1>

                                @if (session('status'))
                                    <div class="alert alert-info" role="alert">{{ session('status') }}</div>
                                @endif

                                @if ($errors->has('general'))
                                    <div class="alert alert-danger" role="alert">{{ $errors->first('general') }}</div>
                                @endif

                                <form method="POST" action="{{ route('web.reset.submit') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Correo</label>
                                        <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required autocomplete="email">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="token" class="form-label">Código (8 dígitos)</label>
                                        <input id="token" type="text" name="token" value="{{ old('token') }}" class="form-control @error('token') is-invalid @enderror" required maxlength="8" inputmode="numeric" autocomplete="one-time-code">
                                        @error('token')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Nueva contraseña</label>
                                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirmar nueva contraseña</label>
                                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-warning">Restablecer</button>
                                    </div>
                                </form>

                                <hr class="my-4">

                                <a class="link-secondary" href="{{ route('web.login') }}">Volver a login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
