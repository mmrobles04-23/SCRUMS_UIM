@extends('layouts.app')

@section('title', 'Recuperar contraseña')

@section('content')
    <h1>Recuperar contraseña</h1>

    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

    @if ($errors->has('general'))
        <div>{{ $errors->first('general') }}</div>
    @endif

    <form method="POST" action="{{ route('web.forgot.submit') }}">
        @csrf

        <div>
            <label for="email">Correo</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Enviar código</button>
    </form>

    <div>
        <a href="{{ route('web.login') }}">Volver a login</a>
    </div>
@endsection
