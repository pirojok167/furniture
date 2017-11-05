@extends('layouts.master')
@section('header')
    <a href="/">ЛОГО</a>
    <ul>
        <li><a href="#services">Услуги</a></li>
        <li><a href="#materials">Материалы</a></li>
        <li><a href="#logic">Как заказать</a></li>
        <li><a href="#order">Оставить заявку</a></li>
        <li class="btn"><a href="{{ route('repair') }}">Наши работы</a></li>
        <li class="btn"><a href="{{ route('making') }}">Изготовление</a></li>
    </ul>
    <h1>Изготовление мягкой мебели</h1>
@endsection
@section('content')
    @if(!$makings->isEmpty())
        @foreach($makings as $making)
            <p>{{ $making->name }}</p>
            <img style="max-width: 500px" src="{{ asset("images/$making->image") }}" alt="{{ $making->name }}">
        @endforeach
    @endif
@endsection