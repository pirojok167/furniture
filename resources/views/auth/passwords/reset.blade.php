@extends('layouts.master')
@section('header')

@endsection
@section('content')
    <div class="container-fluid d-flex" style="height: 100vh; background-color: #f8f6f1;">
        <div class="m-auto d-inline-block bg-metall"
             style="box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);">
            <p class="big p-2 text-white text-center m-0" style="background-color: rgba(0,0,0,.2);">Сброс пароля</p>
            <form class="pb-5 pl-5 pr-5 pt-4 form-horizontal" id="form-login" action="{{ route('password.request') }}"
                  method="post">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" placeholder="E-mail" class="form-control" name="email"
                           value="{{ $email or old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" placeholder="Пароль" class="form-control" name="password"
                           required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input id="password-confirm" placeholder="Подтверждение пароля" type="password" class="form-control"
                           name="password_confirmation" required>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="pointer btn btn-block btn-yellow-outline-custom">
                        Сбросить пароль
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('footer')
@endsection
