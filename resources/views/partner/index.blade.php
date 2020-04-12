@extends('layouts.main')

@section('title')
    @parent Новости партнёров
@endsection

@section('content')
    @foreach($news as $item)
        <h3>{{$item->title}}</h3>
        <p>{{$item->description}}</p>
        <a href="{{$item->link}}">Подробнее...</a>
        <hr>
    @endforeach
@endsection
