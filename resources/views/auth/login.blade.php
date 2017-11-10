@extends('layouts.master')
@section('header')

@endsection
@section('content')
    <div class="container-fluid d-flex" style="height: 100vh; background-color: #f8f6f1;">
        <div class="m-auto d-inline-block bg-metall" style="box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);">
            <p class="big p-2 text-white text-center m-0" style="background-color: rgba(0,0,0,.2);">Вход</p>
            <form class="pb-5 pl-5 pr-5 pt-4" id="form-login" action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input class="form-control" placeholder="E-mail" type="text" name="email" autofocus>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Пароль" type="text" name="password">
                </div>
                <label class="custom-control custom-checkbox pointer">
                    <input class="custom-control-input" type="checkbox"
                           name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description text-white ">Запомнить</span>
                </label>
                <a class="fr text-white" href="{{ route('password.request') }}">
                    Забыли пароль?
                </a>
                <div class="clearfix"></div>
                <input value="Войти" class="pointer btn btn-yellow-outline-custom btn-block" type="submit">
            </form>
        </div>
    </div>
@endsection
@section('footer')

@endsection