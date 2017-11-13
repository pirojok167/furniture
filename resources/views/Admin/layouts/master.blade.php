<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('template.includes')
    <title>Администраторская панель</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body >
@include('Admin.partials.header')
@yield('content')
@section('paginate')
    @if(isset($paginate) && !empty($paginate))
        {!! $paginate !!}
    @endif
@show
@include('Admin.template.scripts')
</body>
</html>