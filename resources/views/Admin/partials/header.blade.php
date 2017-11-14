<div class="container-fluid bg-metall">
    <div class="container p-2 d-flex">
        <a class="text-white" href="/">Вернуться на сайт</a>
        <div class="ml-auto">
            <img class="d-none d-md-block" style="height: 24px;" src="../images/templates/logo.png" alt="">
        </div>
        <form class="ml-auto d-none d-md-block" action="{{ route('logout') }}" method="POST">
            <input class="btn btn-remove btn-sm" type="submit" value="Выйти">
            {{ csrf_field() }}
        </form>
    </div>
</div>
<div class="container-fluid bg-beige d-flex">
        <button class="admin-toggle-menu d-md-none mr-auto border-0 pointer mt-2 outline-n" style="background-color: transparent;">
            <hr class="mb-1 mt-1" style="background-color: #464646;width: 15px;">
            <hr class="mb-1 mt-1" style="background-color: #464646;width: 15px;">
            <hr class="mb-1 mt-1" style="background-color: #464646;width: 15px;">
            меню
        </button>
</div>
<div class="container">
    <ul class="admin-main-menu d-none d-md-block">
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
