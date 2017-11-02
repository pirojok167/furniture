<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('template.includes')
    <title>Перетяжка и изготовление мягкой мебели в Воронеже</title>
</head>
<body>
@if(Auth::user())
    <a href="/admin">Админка</a>
@endif
@yield('header')
@yield('content')
@include('partials.footer')
@include('template.scripts')
</body>
</html>