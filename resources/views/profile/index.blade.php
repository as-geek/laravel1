@extends('layouts.main')

@section('title')
    @parent Профиль
@endsection

@section('content')
    <h3>Имя: {{$profile->name}}</h3>
    <h3>Почта: {{$profile->email}}</h3>
    <a href="{{route('profile::update')}}">Изменить пароль</a>
@endsection
