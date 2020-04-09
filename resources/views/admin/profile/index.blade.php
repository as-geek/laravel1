@extends('layouts.main')

@section('title')
    @parent Пользователи
@endsection

@section('content')
    @foreach($listUsers as $user)
        <h3>Имя: {{$user->name}}</h3>
        <h3>Почта: {{$user->email}}</h3>
        <h3>Является администратором:
            @if($user->is_admin)
                ДА
            @else
                НЕТ
            @endif
        </h3>
        <a href="{{route('admin::profile::update', ['id' => $user->id])}}">Редактировать</a>
        <hr>
    @endforeach
    {{$listUsers->links()}}
@endsection
