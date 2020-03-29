@extends('layouts.main')

@section('title')
    @parent Админка: редактирование
@endsection

@section('content')
    <h3>Редактор</h3>
    <hr>
    <form action="{{route('admin::comments::update', ['id' => $commentsItem->id])}}" method="post">
        @csrf
        <input type="text" name="name" value="{{$commentsItem->name}}">
        <textarea name="content" cols="50" rows="20">{{$commentsItem->content}}</textarea>
        <input type="submit" value="Сохранить">
    </form>
@endsection
