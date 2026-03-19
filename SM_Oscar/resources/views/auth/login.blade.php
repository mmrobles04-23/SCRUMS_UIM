@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h1>Iniciar sesión</h1>

    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

    @if ($errors->has('general'))
        <div>{{ $errors->first('general') }}</div>
    @endif

    <form method="POST" action="{{ route('web.login.submit') }}">
        @csrf

        <div>
            <label for="email">Correo</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Entrar</button>
    </form>

    <div>
        <a href="{{ route('web.register') }}">Crear cuenta</a>
    </div>

    <div>
        <a href="{{ route('web.forgot.form') }}">¿Olvidaste tu contraseña?</a>
    </div>
@endsection
