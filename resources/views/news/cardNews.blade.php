@extends('layouts.main')

@section('title')
    @parent Новости
@endsection

@section('content')
    @foreach($news as $value)
        <h3>{{$value->title}}</h3>
        <p>{{$value->content}}</p>
    @endforeach
@endsection

@section('addComment')
    <hr>
    <form action="{{route('comments')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Имя">
        <textarea name="content" cols="30" rows="10"></textarea>
        <input type="hidden" name="rubricsId" value={{$value->rubrics_id}}>
        <input type="hidden" name="news_id" value={{$value->id}}>
        <input type="submit">
    </form>
@endsection

@section('comments')
    <hr>
    <h3>Комментарии</h3>
    @forelse($comments as $comment)
        <h3>{{$comment->name}}</h3>
        <p>{{$comment->content}}</p>
    @empty
        <p>Комментариев нет</p>
    @endforelse
@endsection
