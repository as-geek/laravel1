@extends('layouts.main')

@section('title')
    @parent Админка: редактирование
@endsection

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
    <h3>Редактор</h3>
    <hr>
    <form action="{{route('admin::news::saveUpdate', ['id' => $cardNews->id])}}" method="post">
        @csrf
        <input type="text" name="title" value="{{$cardNews->title}}">
        <textarea name="content" cols="50" rows="20">{{$cardNews->content}}</textarea>
        <select name="rubrics_id">
            @foreach($rubrics as $value)
                @if($cardNews->rubrics_id == $value->id)
                    <option selected value="{{$value->id}}">{{$value->name}}</option>
                @else
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endif
            @endforeach
        </select>
        <input type="datetime" dataformatas="Y-m-d H:i:s" name="publish_date" value="{{date('Y-m-d H:i:s', strtotime
        ("+3 hours"))}}">
        <input type="submit" value="Сохранить">
    </form>
@endsection
