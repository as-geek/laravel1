@extends('layouts.main')

@section('title')
    @parent Админка: партнёры
@endsection

@section('content')
    <a href="{{route('admin::partner::create')}}">Создать</a>
    @forelse($partners as $partner)
        <p>{{$partner->name}}</p>
        <p>{{$partner->description}}</p>
        <p>{{$partner->link}}</p>
        <a href="{{route('admin::partner::update', ['id' => $partner->id])}}">Редактировать</a>
        <a href="{{route('admin::partner::delete', ['id' => $partner->id])}}">Удалить</a>
        <hr>
    @empty
        Записей нет!
    @endforelse
    {{$partners->links()}}
@endsection
