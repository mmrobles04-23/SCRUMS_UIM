@extends('layouts.app')

@section('title', 'Login')

@section('content')
    {{-- NOTA (Bootstrap): usamos grid (`container`, `row`, `col-*`) para centrar el formulario y hacerlo responsive. --}}
    {{-- NOTA (Estilo propio en app.css): `.uim-auth-wrapper`, `.uim-auth-card`, `.uim-auth-accent`, `.uim-auth-title` para identidad UNAM. --}}
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
                                    {{-- NOTA (Bootstrap): border-start + opacity. NOTA (app.css): .uim-auth-logos-divider fija ancho/alto. --}}
                                    <div class="border-start border-white opacity-50 uim-auth-logos-divider" role="presentation"></div>
                                    <img src="{{ asset('header/logo_unam_fesa.png') }}" alt="FES Acatlán">
                                </div>
                                <h2 class="h4 uim-auth-title mb-2">UIMA — Acceso</h2>
                                <p class="mb-0 text-muted small">
                                    Inicia sesión con tu correo institucional.
                                </p>
                            </div>

                            <div class="col-md-7 p-4">
                                <h1 class="h4 mb-3">Iniciar sesión</h1>

                                {{-- NOTA (Bootstrap): `alert` para mensajes de estado/error. --}}
                                @if (session('status'))
                                    <div class="alert alert-info" role="alert">{{ session('status') }}</div>
                                @endif

                                @if ($errors->has('general'))
                                    <div class="alert alert-danger" role="alert">{{ $errors->first('general') }}</div>
                                @endif

                                <form method="POST" action="{{ route('web.login.submit') }}">
                                    @csrf

                                    {{-- NOTA (Bootstrap): `form-label` + `form-control` + `is-invalid` para validación visual. --}}
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Correo</label>
                                        <input
                                            id="email"
                                            type="email"
                                            name="email"
                                            value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror"
                                            required
                                            autocomplete="email"
                                        >
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <div class="input-group">
                                            <input
                                                id="password"
                                                type="password"
                                                name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                required
                                                autocomplete="current-password"
                                            >
                                            <button class="btn btn-toggle" type="button" data-uim-toggle-password="#password" aria-label="Mostrar contraseña">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-grid gap-2">
                                        {{-- NOTA (Bootstrap): `btn` + `btn-warning` para botón principal. --}}
                                        <button type="submit" class="btn btn-warning">
                                            Entrar
                                        </button>
                                    </div>
                                </form>

                                <hr class="my-4">

                                <div class="uim-auth-actions">
                                    <a class="uim-auth-action-link" href="{{ auth()->check() ? route('web.dashboard') : route('home') }}">
                                        <i class="bi bi-arrow-left"></i>
                                        Volver al dashboard
                                    </a>
                                    <a class="uim-auth-action-link uim-auth-action-link--primary" href="{{ route('web.register') }}">
                                        <i class="bi bi-person-plus"></i>
                                        Crear cuenta
                                    </a>
                                    <a class="uim-auth-action-link" href="{{ route('web.forgot.form') }}">
                                        <i class="bi bi-shield-lock"></i>
                                        ¿Olvidaste tu contraseña?
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('[data-uim-toggle-password]').forEach((btn) => {
                btn.addEventListener('click', () => {
                    const selector = btn.getAttribute('data-uim-toggle-password');
                    const input = selector ? document.querySelector(selector) : null;
                    if (!input) return;
                    input.type = input.type === 'password' ? 'text' : 'password';
                    const icon = btn.querySelector('i');
                    if (icon) {
                        icon.classList.toggle('bi-eye');
                        icon.classList.toggle('bi-eye-slash');
                    }
                });
            });
        });
    </script>
@endpush
