@extends('layouts.main')

@section('title')
    @parent Рубрики
@endsection

@section('content')
    @foreach($rubrics as $value)
        <div>
            <a href='{{route('news::rubricsNews', ['rubricsId' => $value->id])}}'>{{$value->name}}</a>
        </div>
    @endforeach
@endsection
