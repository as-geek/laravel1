@extends('layouts.main')

@section('title')
    @parent Новости
@endsection

@section('content')
    @foreach($rubricsNews as $value)
        <div>
            <a href='{{route('news::cardNews', [
                'rubricsId' => $value->rubrics_id,
                'id' => $value->id
            ])}}'>{{$value->title}}</a>
        </div>
    @endforeach
@endsection
