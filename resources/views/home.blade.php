@extends('layouts.master')
@section('header')
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler outline-n pointer" type="button" data-toggle="collapse" data-target="#navbarTogglerEx" aria-controls="navbarTogglerEx" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container " style="position: relative;">
                <a class="navbar-brand ml-auto ml-lg-0" href="/">ЛОГО</a>
                <div class="collapse navbar-collapse" id="navbarTogglerEx">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Услуги<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Материалы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Как заказать</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Как заказать</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Оставить заявку</a>
                        </li>
                    </ul>
                    <a class="btn" href="{{ route('repair') }}">Наши работы</a>
                </div>
            </div>
        </nav>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="container">
            <h2 class="text-center">Перетяжка и изготовление мягкой мебели в Воронеже</h2>
            <div class="row">
                <div class="col">
                    Перетяжка мягкой мебели: диваны, кресла,
                    кухонные уголки, офисная мебель, стулья, пуфики. Замена: обивочной ткани, поролона, искусственного наполнителя                   (холлофайбер и поролоновая крошка), пружинных блоков и механизмов трансформации. Ремонт каркаса.
                </div>
                <div class="col">
                    <img class="img" src="" alt="">
                </div>
                <div class="col-12 d-flex">
                    <a class="btn btn-danger ml-auto" href="">
                        Посмотреть наши работы
                    </a>
                    <a class="btn btn-outline-danger ml-3 mr-auto" href="">
                        Оставить заявку
                    </a>
                </div>
            </div>
            <h1 class="text-center">Наши работы</h1>
            <div class="row">
                <div class="col-6 bg-light">
                    <img class="img" src="" alt="">
                    <p>Перетяжка мягкой мебели</p>
                </div>
                <div class="col-6 bg-light">
                    <img class="img" src="" alt="">
                    <p>Ремонт каркаса, замена механизмов  трансформации</p>
                </div>
                <div class="col-6 bg-light">
                    <img class="img" src="" alt="">
                    <p>Ремонт каркаса, замена механизмов  трансформации</p>
                </div>
                <div class="col-6 bg-light">
                    <img class="img" src="" alt="">
                    <p>Ремонт каркаса, замена механизмов  трансформации</p>
                </div>
            </div>
            <h1 class="text-center">Материалы которые мы используем</h1>
            <div>
                <p>sdvds sdv sdv sdv svd sdfbhgd bs dhdh sdh dsfh hsdfh dfh dfh dfh dfhah</p>
                <img src="" alt="">
                <a class="btn btn-danger"  href="{{ route('repair') }}">Посмотреть наши работы</a>
                <a href="#order">Оставить заявку</a>
            </div>
            <div id="services">
                <h2>Наши услуги</h2>
                @foreach($services as $service)
                    <div>
                        <h3>{{ $service->name }}</h3>
                        <p>{{ $service->description }}</p>
                        <img style="max-width:500px;" src="{{ asset("images/$service->image") }}">
                    </div>
                @endforeach
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
        </div>
    </div>
@endsection
