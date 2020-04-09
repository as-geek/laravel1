@extends('layouts.main')

@section('title')
    @parent Главная
@endsection

@section('content')
    @guest
        <h3>Всем привет</h3>
    @else
        <h3>Привет, {{$user->name}}</h3>
    @endguest
@endsection
