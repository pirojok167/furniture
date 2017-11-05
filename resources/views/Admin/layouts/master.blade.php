<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('template.includes')
    <title>Администраторская панель</title>
</head>
<body>
@include('Admin.partials.header')
@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        {{ $error }}'
    @endforeach
@endif

@if(Session::has('result') && !is_array(Session::get('result')))
    {{ Session::get("result") }}
@endif
@yield('content')
@if(isset($paginate) && !empty($paginate))
    {!! $paginate !!}
@endif
@include('template.scripts')
</body>
</html>