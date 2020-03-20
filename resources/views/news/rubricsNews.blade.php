@extends('layouts.main')

@section('title')
    @parent Новости
@endsection

@section('content')
    @foreach($rubricsNews as $key => $value)
        <div>
            <a href='{{route('news::cardNews', ['name' => $name, 'title' => $key])}}'>{{$key}}</a>
        </div>
    @endforeach
@endsection
