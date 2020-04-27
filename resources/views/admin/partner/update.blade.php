@extends('layouts.main')

@section('title')
    @parent Админка: редактирование
@endsection

@section('content')
    <h3>Редактор</h3>
    <hr>
    <form action="{{route('admin::partner::saveUpdate', ['id' => $cardPartners->id])}}" method="post">
        @csrf
        <input type="text" name="name" value="{{$cardPartners->name}}">
        <input type="text" name="description" value="{{$cardPartners->description}}">
        <input type="text" name="link" value="{{$cardPartners->link}}">
        <input type="submit" value="Сохранить">
    </form>
@endsection
