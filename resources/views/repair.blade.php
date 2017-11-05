@extends('layouts.master')
@section('header')
    <a href="/">ЛОГО</a>
    <ul>
        <li><a href="#services">Услуги</a></li>
        <li><a href="#materials">Материалы</a></li>
        <li><a href="#logic">Как заказать</a></li>
        <li><a href="#order">Оставить заявку</a></li>
        <li class="btn"><a href="{{ route('repair') }}">Перетяжка</a></li>
        <li class="btn"><a href="{{ route('making') }}">Изготовление</a></li>
    </ul>
    <h1>Ремонт и перетяжка мягкой мебели</h1>
    @if(!$repairs->isEmpty())
        @foreach($repairs as $repair)
            <div style="background-color: #636b6f">
                <img style="max-width: 200px" src="{{ asset("images/$repair->image_1") }}" alt="До">
                <p>-></p>
                <img style="max-width: 200px" src="{{ asset("images/$repair->image_2") }}" alt="После">
            </div>
            <br><br>
        @endforeach
    @endif
@endsection
@section('content')

@endsection