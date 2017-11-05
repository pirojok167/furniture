@extends('layouts.master')
@section('header')
    <a href="/">ЛОГО</a>
    <h1>Вход</h1>
@endsection
@section('content')
    <form action="{{ route('login') }}" method="post">
        {{ csrf_field() }}
        <input type="text" name="email">
        <input type="text" name="password">
        <input class="btn" type="submit">
        {{--{{ bcrypt('pirojok167') }}--}}
        <label class="custom-control custom-checkbox pointer">
            <input class="custom-control-input" type="checkbox"
                   name="remember" {{ old('remember') ? 'checked' : '' }}>
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description text-white ">Запомнить</span>
        </label>
        <a class="fr" href="{{ route('password.request') }}">
            Забыли пароль?
        </a>
    </form>
@endsection
@section('footer')
@endsection