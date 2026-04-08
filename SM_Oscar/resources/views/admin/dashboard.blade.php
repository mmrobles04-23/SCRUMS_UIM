@extends('layouts.app')

@section('title', 'Panel Administrativo')

@section('content')
    <h1>Panel Administrativo</h1>

    <p>Acceso autorizado (admin o desarrollador).</p>

    <div>
        <a href="{{ route('web.dashboard') }}">Volver a dashboard</a>
    </div>

    <form method="POST" action="{{ route('web.logout') }}">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
@endsection
