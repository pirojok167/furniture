@extends('layouts.master')
@section('header')

@endsection
@section('content')
    <div class="container-fluid d-flex" style="height: 100vh; background-color: #f8f6f1;">
        <div class="m-auto d-inline-block bg-metall" style="box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);">
            <p class="big p-2 text-white text-center m-0" style="background-color: rgba(0,0,0,.2);">Сброс пароля</p>
            @if(Session::has('status'))
                <div class="pb-5 pl-5 pr-5 pt-4">
                    <p style="font-size: 18px" class="text-white">{{ Session::get('status') }}</p>
                    <p class="text-center m-0" ><a class="text-white" href="/">Вернуться на сайт</a></p>
                </div>
            @else
            <form class="pb-5 pl-5 pr-5 pt-4 form-horizontal" id="form-login" action="{{ route('password.email') }}" method="post">
                {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" placeholder="E-mail" class="form-control" name="email"
                               value="{{ $email or old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group m-0">
                        <button type="submit" class="pointer btn btn-block btn-yellow-outline-custom">
                            Сбросить пароль
                        </button>
                    </div>
            </form>
            @endif
        </div>
    </div>
@endsection
@section('footer')
@endsection
