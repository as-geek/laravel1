@extends('layouts.main')

@section('title')
    @parent Рубрики
@endsection

@section('content')
    @foreach($rubrics as $value)
        <div>
            <a href='{{route('news::parsing', ['rubrics' => $value->description])}}'>{{$value->description}}</a>
        </div>
    @endforeach
@endsection
