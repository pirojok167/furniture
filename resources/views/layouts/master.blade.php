<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('template.includes')
    <title>Перетяжка и изготовление мягкой мебели в Воронеже</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script></head>
<body data-spy="scroll" data-target="#header" data-offset="70">
@if(Auth::user())
    <a href="/admin">Админка</a>
@endif
@yield('header')
@yield('content')
@section('paginate')
@if(isset($paginate) && !empty($paginate))
    {!! $paginate !!}
@endif
@show
@section('footer')
    @include('partials.footer')
@show
@include('template.scripts')
</body>
</html>