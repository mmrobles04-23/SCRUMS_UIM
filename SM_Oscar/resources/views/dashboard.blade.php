@extends('layouts.app')

@section('title', 'Dashboard — UIM')

@section('content')
    {{-- NOTA (Bootstrap): container, row, col, card, alert, d-grid, btn. --}}
    {{-- NOTA (Estilo propio / app.css): .uim-auth-wrapper centra verticalmente; .uim-page-shell = tarjeta con sombra tipo Auth. --}}
    <div class="uim-auth-wrapper">
        <div class="container px-3">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="card uim-page-shell">
                        <div class="card-body p-4 p-md-5">
                            <h1 class="h4 mb-2 text-body">Panel de usuario</h1>
                            <p class="text-body-secondary small mb-4">Sesión iniciada correctamente.</p>

                            @if (session('status'))
                                <div class="alert alert-info mb-4" role="alert">{{ session('status') }}</div>
                            @endif

                            <div class="d-flex flex-column flex-sm-row gap-2 mb-4">
                                <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-sm">Ir al inicio</a>
                            </div>

                            <form method="POST" action="{{ route('web.logout') }}">
                                @csrf
                                {{-- NOTA (Bootstrap): d-grid; NOTA (app.css): .uim-form-actions-narrow limita ancho del botón. --}}
                                <div class="d-grid gap-2 uim-form-actions-narrow">
                                    {{-- NOTA (Bootstrap): btn-warning hereda dorado UNAM vía override en app.css. --}}
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
