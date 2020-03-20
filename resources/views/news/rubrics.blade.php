@extends('layouts.main')

@section('title')
    @parent Рубрики
@endsection

@section('content')
    @foreach($rubrics as $key => $value)
        <div>
            <a href='{{route('news::rubricsNews', ['name' => $key])}}'>{{$value}}</a>
        </div>
    @endforeach
@endsection
