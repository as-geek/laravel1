@extends('layouts.main')

@section('title')
    @parent Новости
@endsection

@section('content')
    @foreach($listNews as $value)
        <div>
            <a href='{{route('news::cardNews', ['id' => $value->id])}}'>{{$value->title}}</a>
        </div>
    @endforeach
@endsection
