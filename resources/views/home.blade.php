@extends('layouts.master')
@section('header')
    <ul>
        <li><a href="#services">Услуги</a></li>
        <li><a href="#materials">Материалы</a></li>
        <li><a href="#logic">Как заказать</a></li>
        <li><a href="#order">Оставить заявку</a></li>
        <li class="btn"><a href="{{ route('repair') }}">Наши работы</a></li>
    </ul>
    <a href="/">ЛОГО</a>
    <h1>Перетяжка и изготовление мягкой мебели в Воронеже</h1>
@endsection
@section('content')
    <div>
        <p>sdvds sdv sdv sdv svd sdfbhgd bs dhdh sdh dsfh hsdfh dfh dfh dfh dfhah</p>
        <img src="" alt="">
        <a class="btn btn-danger"  href="{{ route('repair') }}">Посмотреть наши работы</a>
        <a href="#order">Оставить заявку</a>
    </div>
   <div id="services">
       <h2>Наши услуги</h2>
       <div>
           Квадрат
           <img src="" alt="мягкая мебель">
       </div>
   </div>
    <div id="materials">
        <h2>Матералы, которые мы используем</h2>
        <div>
            Прямоугольник
        </div>
    </div>
    <div>
        <h2>Как мы выполняем ваш заказ</h2>
        <div>
            Круглешок
        </div>
    </div>
@endsection
