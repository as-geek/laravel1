@extends('layouts.main')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="email">{{ 'E-Mail' }}</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <strong>{{ $message }}</strong>
        @enderror

        <label for="password">{{ 'Пароль' }}</label>
        <input id="password" type="password" name="password" required autocomplete="current-password">
        @error('password')
            <strong>{{ $message }}</strong>
        @enderror

        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label for="remember">
            {{ 'Запомнить меня' }}
        </label>

        <button type="submit">
            {{ 'Войти' }}
        </button>

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                {{ 'Забыли пароль?' }}
            </a>
        @endif
    </form>
@endsection
