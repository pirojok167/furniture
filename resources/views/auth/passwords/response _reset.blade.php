@extends('layouts.master')
@section('header')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <p>Ссылка для сброс пароля отправлена на ваш Email</p>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
@endsection
@section('footer')
@endsection
