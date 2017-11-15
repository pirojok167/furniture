@extends('layouts.master')
@section('header')
    <content class="d-lg-none">
        <input id="hamburger" class="hamburger" type="checkbox"/>
        <label class="hamburger m-0" for="hamburger">
            <i></i>
            <text>
                <close>close</close>
                <open>меню</open>
            </text>
        </label>
        <section class="drawer-list">
            <ul>
                <li><a href="/">Главная</a></li>
                <li><a href="/repair">Перетяжка</a></li>
                <li><a href="/making">Изготовление</a></li>
            </ul>
        </section>
    </content>
    <nav id="header" class="navbar navbar-expand-lg navbar-light bg-green">
        <div class="container">
            <a class="navbar-brand mx-auto ml-lg-0 mr-lg-4" href="/">
                <img alt="Перетяжка и ремонт мягкой мебели в Воронеже" height="40" src="../images/templates/logo.png">
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerEx">
                <ul class="navbar-nav mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/#services">Услуги<span
                                    class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#materials">Материалы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/#order">Как заказать</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/#footer">Оставить заявку</a>
                    </li>
                </ul>
                <a class="btn btn-green btn-sm ml-3" href="{{ route('repair') }}">Перетяжка</a>
                <a class="btn btn-green btn-sm ml-2" href="{{ route('making') }}">Изготовление</a>
                <div class="ml-auto mr-2">
                    <p class="m-0">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle-thin text-white fa-stack-2x"></i>
                          <i class="fa fa-phone fa-stack-1x text-white"></i>
                        </span>
                    </p>
                </div>
                <div>
                    <p class="m-0 text-white">{{ $contacts->phone_1 ?? '' }}</p>
                    <p class="m-0 text-white">{{ $contacts->phone_2 ?? '' }}</p>
                </div>
            </div>
        </div>
    </nav>
@endsection
@section('content')
    <div class="container-fluid bg">
        <div class="container pb-5 pt-4 bg-wrapper">
            <h1 class="text-center mb-4" style="font-family: 'Alice', serif;">Изготовление мягкой мебели</h1>
            <ul id="og-grid" class="og-grid">
                @if(!$makings->isEmpty())
                    @foreach($makings as $making)
                        <li>
                            <a href="#" data-name="{{ $making->name }}" class="btn-making-gallery"
                               id="{{ $making->id }}">
                                <img alt="{{ $making->name }}" style="height: 250px;width: 250px;object-fit: cover"
                                     src="{{ asset("images/$making->image") }}"/>
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <script>
        $(function () {
            Grid.init();
        });
    </script>
@endsection