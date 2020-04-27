@extends('layouts.main')

@section('title')
    @parent Профиль: редактирование
@endsection

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
    <h3>Редактор</h3>
    <hr>
    <form action="{{route('profile::saveUpdate')}}" method="post">
        @csrf
        <label for="old_password">{{ 'Текущий пароль' }}</label>
        <input id="old_password" type="password" name="old_password">

        <label for="password">{{ 'Новый пароль' }}</label>
        <input id="password" type="password" name="password">

        <label for="password_confirmation">{{ 'Новый пароль ещё раз' }}</label>
        <input id="password_confirmation" type="password" name="password_confirmation">

        <input type="submit" value="Сохранить">
    </form>
@endsection
