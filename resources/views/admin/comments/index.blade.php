@extends('layouts.main')

@section('title')
    @parent Админка: комментарии
@endsection

@section('content')
    @forelse($comments as $item)
        <h3>{{$item->name}}</h3>
        <p>{{$item->content}}</p>
        <p>Новость: <a href="{{route('news::cardNews', ['id' => $item->news_id])}}">{{$item->title}}</a></p>
        <a href="{{route('admin::comments::update', ['id' => $item->id])}}">Редактировать</a>
        <a href="{{route('admin::comments::delete', ['id' => $item->id])}}">Удалить</a>
        <hr>
    @empty
        Комментариев в нет!
    @endforelse
    {{$comments->links()}}
@endsection
