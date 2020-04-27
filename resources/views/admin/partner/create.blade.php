@extends('layouts.main')

@section('title')
    @parent Админка: создать
@endsection

@section('content')
    <h3>Добавить партнёра</h3>
    <hr>
    <form action="{{route('admin::partner::saveCreate')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Сайт">
        <input type="text" name="description" placeholder="Рубрика">
        <input type="text" name="link" placeholder="Ссылка">
        <input type="submit" value="Добавить">
    </form>
@endsection
