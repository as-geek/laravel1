@extends('layouts.main')

@section('title')
    @parent Админка: редактирование профиля
@endsection

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
    <h3>Редактор</h3>
    <hr>
    <form action="{{route('admin::profile::saveUpdate', ['id' => $user->id])}}" method="post">
        @csrf
        <label for="name">{{ 'Имя' }}</label>
        <input id="name" type="text" name="name" value="{{$user->name}}">

        <label for="email">{{ 'Почта' }}</label>
        <input id="email" type="email" name="email" value="{{$user->email}}">

        <label for="is_admin">{{ 'Админ?' }}</label>
        @if($user->is_admin)
            да<input type="radio" name="is_admin" id="is_admin" value="1" checked>
            нет<input type="radio" name="is_admin" id="is_admin" value="0">
        @else
            да<input type="radio" name="is_admin" id="is_admin" value="1">
            нет<input type="radio" name="is_admin" id="is_admin" value="0" checked>
        @endif

        <input type="submit" value="Сохранить">
    </form>
@endsection
