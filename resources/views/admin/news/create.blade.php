@extends('layouts.main')

@section('title')
    @parent Админка: создать
@endsection

@section('content')
    <h3>Создать новость</h3>
    <hr>
    <form action="{{route('admin::news::create')}}" method="post">
        @csrf
        <input type="text" name="title" placeholder="Заголовок">
        <textarea name="content" cols="30" rows="10"></textarea>
        <select name="rubrics_id">
            @foreach($rubrics as $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
        </select>
        <input type="datetime" dataformatas="Y-m-d H:i:s" name="publish_date" value="{{date('Y-m-d H:i:s', strtotime
        ("+3 hours"))}}">
        <input type="submit">
    </form>
@endsection
