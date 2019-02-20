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
<div class="slidebar-menu bg-metall d-md-none">
    <ul class="">
        <li class="text-center mb-3 mt-3"><img style="height: 32px" src="../images/templates/logo.png" alt=""></li>
        <li><a href="{{ route('admin.admin') }}"><i class="fa fa-home" aria-hidden="true"></i>Главная</a></li>
        <li><a href="{{ route('admin.orders') }}"><i class="fa fa-handshake-o" aria-hidden="true"></i>Заявки</a></li>
        <li><a href="{{ route('admin.repair.index') }}"><i class="fa fa-wrench" aria-hidden="true"></i>Перетяжка</a></li>
        <li><a href="{{ route('admin.making.index') }}"><i class="fa fa-wrench" aria-hidden="true"></i>Изготовление</a></li>
        <li><a href="{{ route('admin.services.index') }}"><i class="fa fa-sticky-note-o" aria-hidden="true"></i>Услуги</a></li>
        <li><a href="{{ route('admin.materials.index') }}"><i class="fa fa-stack-overflow" aria-hidden="true"></i>Материалы</a></li>
        <li><a href="{{ route('admin.contacts.index') }}"><i class="fa fa-phone" aria-hidden="true"></i>Контакты</a></li>
        <li class=""><a href="{{ route('admin.getProfile') }}"><i class="fa fa-user" aria-hidden="true"></i>Профиль</a></li>
        <li>        <form class="m-3" action="{{ route('logout') }}" method="POST">
                <input class="btn btn-remove btn-block btn-sm" type="submit" value="Выйти">
                {{ csrf_field() }}
            </form></li>
    </ul>
</div>
<div class="container-fluid admin-main-fluid p-0 m-0">
    @include('admin.partials.header')
    @yield('content')
</div>
@section('paginate')
    @if(isset($paginate) && !empty($paginate))
        {!! $paginate !!}
    @endif
@show
@include('admin.template.scripts')
</body>
</html>