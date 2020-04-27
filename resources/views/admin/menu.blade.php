@extends('layouts.main')

@section('title')
    @parent Админка
@endsection

@section('content')
    <h3>Админка</h3>
    <div class="menu">
        <a href="{{route('admin::news::index')}}">Новости</a>
        <a href="{{route('admin::comments::index')}}">Комментарии</a>
        <a href="{{route('admin::profile::index')}}">Пользователи</a>
        <a href="{{route('admin::partner::index')}}">Партнёры</a>
    </div>
@endsection
