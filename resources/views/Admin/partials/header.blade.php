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
        <li><a class="{{ (Route::CurrentRouteName() === 'admin.admin') || Route::CurrentRouteName() === 'admin.edit_admin_home' ? 'bg-beige' : '' }}"  href="{{ route('admin.admin') }}">Главная</a></li>
        <li><a class="{{ (Route::CurrentRouteName() === 'admin.orders') ? 'bg-beige' : '' }}"  href="{{ route('admin.orders') }}">Заявки</a></li>
        <li><a class="{{ (Route::CurrentRouteName() === 'admin.repair.index' || Route::CurrentRouteName() === 'admin.repair.create') ? 'bg-beige' : '' }}" href="{{ route('admin.repair.index') }}">Перетяжка</a></li>
        <li><a class="{{ (Route::CurrentRouteName() === 'admin.making.index' || Route::CurrentRouteName() === 'admin.making.edit' || Route::CurrentRouteName() === 'admin.making.create') ? 'bg-beige' : '' }}" href="{{ route('admin.making.index') }}">Изготовление</a></li>
        <li><a class="{{ (Route::CurrentRouteName() === 'admin.services.index' || Route::CurrentRouteName() === 'admin.services.edit' || Route::CurrentRouteName() === 'admin.services.create') ? 'bg-beige' : '' }}" href="{{ route('admin.services.index') }}">Услуги</a></li>
        <li><a class="{{ (Route::CurrentRouteName() === 'admin.materials.index' || Route::CurrentRouteName() === 'admin.materials.create') ? 'bg-beige' : '' }}" href="{{ route('admin.materials.index') }}">Материалы</a></li>
        <li><a class="{{ (Route::CurrentRouteName() === 'admin.contacts.index') ? 'bg-beige' : '' }}" href="{{ route('admin.contacts.index') }}">Контакты</a></li>
        <li><a class="{{ (Route::CurrentRouteName() === 'admin.getProfile') ? 'bg-beige' : '' }}" href="{{ route('admin.getProfile') }}">Профиль</a></li>
    </ul>
    <div class="clearfix"></div>
</div>
