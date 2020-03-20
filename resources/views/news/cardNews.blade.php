@extends('layouts.main')

@section('title')
    @parent Новости
@endsection

@section('content')
    <h3>{{$title}}</h3>
    <p>{{$item}}</p>
@endsection
