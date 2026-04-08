@extends('layouts.app')

@section('title', 'Restablecer contraseña')

@section('content')
    <h1>Restablecer contraseña</h1>

    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

    @if ($errors->has('general'))
        <div>{{ $errors->first('general') }}</div>
    @endif

    <form method="POST" action="{{ route('web.reset.submit') }}">
        @csrf

        <div>
            <label for="email">Correo</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="token">Código (8 dígitos)</label>
            <input id="token" type="text" name="token" value="{{ old('token') }}" required maxlength="8">
            @error('token')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password">Nueva contraseña</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password_confirmation">Confirmar nueva contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <button type="submit">Restablecer</button>
    </form>

    <div>
        <a href="{{ route('web.login') }}">Volver a login</a>
    </div>
@endsection
