@extends('layouts.main')

@section('title')
    @parent Новости
@endsection

@section('content')
    <h3>{{$title}}</h3>
    <p>{{$item}}</p>
@endsection

@section('comments')
    <hr>
    <h3>Комментарии</h3>
    @forelse($comments as $key => $value)
        <h3>{{$key}}</h3>
        <p>{{$value}}</p>
    @empty
        <p>Комментариев нет</p>
    @endforelse
@endsection

@section('addComment')
    <form action="{{route('comments')}}" method="post">
        @csrf
        <input type="text" name="userName" placeholder="Имя">
        <textarea name="text" cols="30" rows="10"></textarea>
        <input type="hidden" name="name" value={{$name}}>
        <input type="hidden" name="title" value={{$title}}>
        <input type="submit">
    </form>
@endsection
