@extends('layouts.main')

@section('title')
    @parent Админка: создать
@endsection

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
    <h3>Создать новость</h3>
    <hr>
    <form action="{{route('admin::news::saveCreate')}}" method="post">
        @csrf
        <input type="text" name="title" placeholder="Заголовок" value="{{old('title')}}">
        <textarea name="content" id="news-content" cols="30" rows="10">{{old('content')}}</textarea>
        <select name="rubrics_id">
            @foreach($rubrics as $value)
                @if($value->id == old('rubrics_id'))
                    <option selected value="{{$value->id}}">{{$value->name}}</option>
                @else
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endif
            @endforeach
        </select>
        <input type="datetime" dataformatas="Y-m-d H:i:s" name="publish_date" value="{{date('Y-m-d H:i:s', strtotime
        ("+3 hours"))}}">
        <input type="submit" value="Создать">
    </form>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        };

        CKEDITOR.replace('news-content', options);
    </script>
@endsection
