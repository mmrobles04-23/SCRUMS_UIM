@extends('layouts.app')

@section('title', 'Administración — UIM')

@section('content')
    {{-- NOTA (Bootstrap): mismos patrones que dashboard.blade.php para homogeneidad. --}}
    {{-- NOTA (Estilo propio / app.css): .uim-page-shell alinea sombras con las vistas Auth. --}}
    <div class="uim-auth-wrapper">
        <div class="container px-3">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="card uim-page-shell">
                        <div class="card-body p-4 p-md-5">
                            <h1 class="h4 mb-2 text-body">Panel administrativo</h1>
                            <p class="text-body-secondary small mb-4">
                                Acceso autorizado (administrador o desarrollador).
                            </p>

                            <div class="d-flex flex-column flex-sm-row flex-wrap gap-2 mb-4">
                                <a href="{{ route('admin.congresos.index') }}" class="btn btn-warning btn-sm">Gestionar congresos</a>
                                <a href="{{ route('web.dashboard') }}" class="btn btn-outline-secondary btn-sm">Volver al dashboard</a>
                                <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-sm">Sitio público</a>
                            </div>

                            <form method="POST" action="{{ route('web.logout') }}">
                                @csrf
                                <div class="d-grid gap-2 uim-form-actions-narrow">
                                    <button type="submit" class="btn btn-warning">Cerrar sesión</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
