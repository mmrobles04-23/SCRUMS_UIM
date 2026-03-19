@extends('layouts.app')

@section('title', 'Registro')

@section('content')
    <h1>Registro</h1>

    @if ($errors->has('general'))
        <div>{{ $errors->first('general') }}</div>
    @endif

    <form method="POST" action="{{ route('web.register.submit') }}">
        @csrf

        <div>
            <label for="name">Usuario</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email">Correo</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="nombre">Nombre(s)</label>
            <input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" required>
            @error('nombre')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="apellido_paterno">Apellido paterno</label>
            <input id="apellido_paterno" type="text" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required>
            @error('apellido_paterno')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="apellido_materno">Apellido materno</label>
            <input id="apellido_materno" type="text" name="apellido_materno" value="{{ old('apellido_materno') }}" required>
            @error('apellido_materno')
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

        <div>
            <label for="password_confirmation">Confirmar contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <button type="submit">Crear cuenta</button>
    </form>

    <div>
        <a href="{{ route('web.login') }}">Ya tengo cuenta</a>
    </div>
@endsection
