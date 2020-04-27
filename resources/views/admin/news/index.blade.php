@extends('layouts.main')

@section('title')
    @parent Админка: новости
@endsection

@section('content')
    <a href="{{route('admin::news::create')}}">Создать</a>
    @forelse($news as $item)
        <h3>{{$item->title}}</h3>
        <a href="{{route('admin::news::update', ['id' => $item->id])}}">Редактировать</a>
        <a href="{{route('admin::news::delete', ['id' => $item->id])}}">Удалить</a>
        <hr>
    @empty
        Новостей нет!
    @endforelse
    {{$news->links()}}
@endsection
