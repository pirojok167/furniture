@extends('layouts.master')
@section('header')

@endsection
@section('content')
    <div style="height: 100vh;width: 100vw;position: relative" class="orange-to-purple">
        <div class="w-100 h-100 d-flex" style="">
            <div class="m-auto" style="position: relative">
                <div class="bg-blur" style="width: 400px;height: 274px"></div>
                <div class="p-5 d-inline-block" style="position: absolute;top:0;left: 0;right: 0">
                    <form action="{{ route('login') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" type="text" name="email">
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
                        <a class="fr" href="{{ route('password.request') }}">
                            Забыли пароль?
                        </a>
                            <input value="Войти" class="btn btn-yellow-outline-custom" type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')

@endsection