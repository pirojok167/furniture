@extends('layouts.master')
@section('header')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Ссылка для сброс пароля отправлена на ваш Email</h1>
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
