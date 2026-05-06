@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4 uim-admin-shell">
        <div class="row g-4">
            <aside class="col-12 col-lg-3 col-xl-2">
                <div class="card border-0 shadow-sm uim-admin-sidebar">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <div class="rounded-circle" style="width: 10px; height: 10px; background: var(--unam-dorado);">
                            </div>
                            <div class="fw-bold">Administrador UIM</div>
                        </div>

                        <nav class="nav flex-column gap-1">
                            <a class="nav-link px-3 py-2 rounded-3 {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                                href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-speedometer2 me-2"></i>Panel
                            </a>
                            <a class="nav-link px-3 py-2 rounded-3 {{ request()->is('admin/usuarios*') ? 'active' : '' }}"
                                href="{{ route('admin.usuarios.index') }}">
                                <i class="bi bi-people me-2"></i>Usuarios
                            </a>
                            <a class="nav-link px-3 py-2 rounded-3 {{ request()->is('admin/congresos*') ? 'active' : '' }}"
                                href="{{ route('admin.congresos.index') }}">
                                <i class="bi bi-calendar-event me-2"></i>Congresos
                            </a>
                            <a class="nav-link px-3 py-2 rounded-3 {{ request()->is('admin/departamentos*') ? 'active' : '' }}"
                                href="{{ route('admin.departamentos.index') }}">
                                <i class="bi bi-diagram-3 me-2"></i>Departamentos
                            </a>
                            <a class="nav-link px-3 py-2 rounded-3 {{ request()->is('admin/seminarios*') ? 'active' : '' }}"
                                href="{{ route('admin.seminarios.index') }}">
                                <i class="bi bi-easel2 me-2"></i>Seminarios
                            </a>
                            <a class="nav-link px-3 py-2 rounded-3 {{ request()->is('admin/inscripciones') || request()->is('admin/inscripciones/*') && !request()->is('admin/inscripciones-congresos*') ? 'active' : '' }}"
                                href="{{ route('admin.inscripciones.index') }}">
                                <i class="bi bi-person-check me-2"></i>Inscripciones a Seminarios
                            </a>
                            <a class="nav-link px-3 py-2 rounded-3 {{ request()->is('admin/inscripciones-congresos*') ? 'active' : '' }}"
                                href="{{ route('admin.inscripciones_congresos.index') }}">
                                <i class="bi bi-people me-2"></i>Inscripciones a Congresos
                            </a>
                            <a class="nav-link px-3 py-2 rounded-3 {{ request()->is('admin/welcome*') ? 'active' : '' }}"
                                href="{{ route('admin.welcome.edit') }}">
                                <i class="bi bi-house-door me-2"></i>Página principal
                            </a>
                        </nav>

                        <hr class="my-3">

                        <div class="d-grid gap-2">
                            <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-sm">Ver sitio público</a>
                            <form method="POST" action="{{ route('web.logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">Cerrar sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
            </aside>

            <section class="col-12 col-lg-9 col-xl-10">
                @yield('admin_content')
            </section>
        </div>
    </div>
@endsection
@push('styles')
    <style>
        .uim-header-institutional,
        footer {
            display: none !important;
        }
    </style>
@endpush