@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>

    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

    <p>Sesión activa.</p>

    <form method="POST" action="{{ route('web.logout') }}">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
@endsection
