<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('title')@show</title>
</head>
<body>
<nav>
    @include('menu')
    <hr>
</nav>
<section>
    @yield('content')
    @yield('comments')
    @yield('addComment')
</section>
</body>
</html>
