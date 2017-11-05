@extends('admin.layouts.master')
@section('content')
    <h2>Профиль</h2>
    <h3>Данные Email и пароль используются для входа в Админ-панель</h3>
    @if(!empty($profile))
        <form action="{{ route('admin.changeProfile') }}" method="post">
            {{ csrf_field() }}
            <p>Email</p>
            <input type="email" name="email" id="" value="{{ $profile->email ?? '' }}">
            <input type="submit" name="" id="" value="Изменить">
        </form>
        <hr>
        <form action="{{ route('admin.changePassword') }}" method="post">
            {{ csrf_field() }}
            <p>Пароль</p>
            <input type="password" name="old_password" id="" placeholder="Старый пароль">
            <br><br>
            <input type="password" name="new_password" id="" placeholder="Новый пароль">
            <br><br>
            <input type="password" name="confirm_password" id="" placeholder="Повторите пароль">
            <br><br>
            <input type="submit" name="" id="" value="Изменить">
        </form>
    @endif
@endsection