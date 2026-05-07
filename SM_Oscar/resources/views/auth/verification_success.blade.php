@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                {{-- Header con gradiente UNAM --}}
                <div class="card-header border-0 text-center py-5" style="background: linear-gradient(135deg, var(--unam-azul, #1E3C70) 0%, #2a4a7a 100%);">
                    <div class="mb-3">
                        <i class="bi bi-check-circle-fill text-white" style="font-size: 4rem;"></i>
                    </div>
                    <h1 class="h4 text-white mb-0 fw-bold">{{ $message }}</h1>
                </div>

                <div class="card-body p-4 text-center">
                    <div class="mb-4">
                        <i class="bi bi-shield-check text-success" style="font-size: 3rem;"></i>
                    </div>

                    <h2 class="h5 mb-3" style="color: var(--unam-azul, #1E3C70);">
                        ¡Tu cuenta ha sido verificada!
                    </h2>

                    <p class="text-muted mb-4">
                        Ahora tienes permisos de administrador en la plataforma. Puedes iniciar sesión con tus credenciales para acceder al panel de administración.
                    </p>

                    <div class="d-grid gap-2">
                        <a href="{{ route('web.login') }}" class="btn btn-lg fw-bold" style="background-color: var(--unam-azul, #1E3C70); color: white; border-radius: 50px;">
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            Iniciar sesión
                        </a>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <small class="text-muted">
                            <i class="bi bi-info-circle me-1"></i>
                            Si tienes problemas para iniciar sesión, contacta al soporte técnico.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
