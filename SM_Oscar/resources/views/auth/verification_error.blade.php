@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                {{-- Header con color de error --}}
                <div class="card-header border-0 text-center py-5" style="background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);">
                    <div class="mb-3">
                        <i class="bi bi-x-circle-fill text-white" style="font-size: 4rem;"></i>
                    </div>
                    <h1 class="h4 text-white mb-0 fw-bold">Verificación fallida</h1>
                </div>

                <div class="card-body p-4 text-center">
                    <div class="alert alert-danger" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        {{ $message }}
                    </div>

                    <p class="text-muted mb-4">
                        El enlace que utilizaste puede haber expirado o no ser válido. Por favor, asegúrate de usar el enlace más reciente enviado a tu correo electrónico.
                    </p>

                    <div class="d-grid gap-2">
                        <a href="{{ route('web.login') }}" class="btn btn-lg fw-bold" style="background-color: var(--unam-azul, #1E3C70); color: white; border-radius: 50px;">
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            Ir al inicio de sesión
                        </a>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <small class="text-muted">
                            <i class="bi bi-envelope me-1"></i>
                            Si no recibiste el correo de verificación, revisa tu bandeja de spam o solicita uno nuevo.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
