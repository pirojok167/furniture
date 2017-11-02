<a href="/"></a>
<h1>Админка</h1>
<a href="/">Вернуться на сайт</a>
<ul>
    <li><a href="{{ route('admin.admin') }}">Главная</a></li>
    <li><a href="{{ route('admin.orders') }}">Заявки</a></li>
    <li><a href="{{ route('admin.repair.index') }}">Перетяжка</a></li>
    <li><a href="{{ route('admin.making.index') }}">Изготовление</a></li>
    <li><a href="{{ route('admin.services.index') }}">Услуги</a></li>
    <li><a href="{{ route('admin.materials.index') }}">Материалы</a></li>
    <li><a href="{{ route('admin.contacts.index') }}">Контакты</a></li>
</ul>
<form action="{{ route('logout') }}" method="POST">
    <input class="" type="submit" value="Выйти">
    {{ csrf_field() }}
</form>