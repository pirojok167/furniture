<div class="container-fluid bg-metall">
    <div class="container p-2 d-flex">
        <a class="text-white" href="/">Вернуться на сайт</a>
        <div class="ml-auto">
            <img style="height: 24px;" src="../images/templates/logo.png" alt="">
        </div>
        <form class="ml-auto" action="{{ route('logout') }}" method="POST">
            <input class="btn btn-danger btn-sm" type="submit" value="Выйти">
            {{ csrf_field() }}
        </form>
        {{--<div class="dropdown show ml-auto">--}}
            {{--<a class=" dropdown-toggle text-white pointer" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--{{ Auth::user()->name }}--}}
            {{--</a>--}}
            {{--<div class="dropdown-menu" style="z-index:4000" aria-labelledby="dropdownMenuLink">--}}
                {{--<a class="dropdown-item" href="{{ route('profile') }}">Профиль</a>--}}
                {{--<a class="dropdown-item" href="{{ route('get_purchases') }}">Покупки</a>--}}
                {{--<a class="dropdown-item" href="{{ route('get_reviews') }}">Мои отзывы</a>--}}
                {{--<div class="dropdown-divider"></div>--}}
                {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                   {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                    {{--Выйти--}}
                {{--</a>--}}
                {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                    {{--{{ csrf_field() }}--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
</div>
<div class="container">
    <ul class="admin-main-menu">
        <li><a href="{{ route('admin.admin') }}">Главная</a></li>
        <li><a href="{{ route('admin.orders') }}">Заявки</a></li>
        <li><a href="{{ route('admin.repair.index') }}">Перетяжка</a></li>
        <li><a href="{{ route('admin.making.index') }}">Изготовление</a></li>
        <li><a href="{{ route('admin.services.index') }}">Услуги</a></li>
        <li><a href="{{ route('admin.materials.index') }}">Материалы</a></li>
        <li><a href="{{ route('admin.contacts.index') }}">Контакты</a></li>
        <li><a href="{{ route('admin.getProfile') }}">Профиль</a></li>
    </ul>
    <div class="clearfix"></div>
</div>