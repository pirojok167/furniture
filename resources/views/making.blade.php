@extends('layouts.master')
@section('header')
    <nav id="header" class="navbar navbar-expand-lg navbar-light bg-light">
        <button style="position: absolute;left: 16px;top:8px;" class="navbar-toggler outline-n pointer" type="button" data-toggle="collapse" data-target="#navbarTogglerEx" aria-controls="navbarTogglerEx" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container " >
            <a class="navbar-brand ml-auto ml-lg-0" href="/">ЛОГО</a>
            <div class="collapse navbar-collapse" id="navbarTogglerEx">
                <ul class="navbar-nav mt-2 mt-lg-0">
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
                <a class="btn btn-info ml-3" href="{{ route('repair') }}">Перетяжка</a>
                <a class="btn btn-info ml-2" href="{{ route('making') }}">Изготовление</a>
                <div class="ml-auto">
                    <p class="m-0">8-919-246-83-18</p>
                    <p class="m-0">8-919-246-83-18</p>
                </div>
            </div>
        </div>
    </nav>
@endsection
@section('content')
    <div class="container-fluid bg-wrapper">
        <div class="container pb-5 pt-4">
            <h1 class="text-center mb-5" style="font-family: 'Alice', serif;">Изготовление</h1>
            <ul id="og-grid" class="og-grid">
                @if(!$makings->isEmpty())
                    @foreach($makings as $making)
                        <li>
                            <a href="#" data-largesrc="{{ asset("images/$making->image") }}">
                                <img style="height: 250px;width: 250px;object-fit: cover" src="{{ asset("images/$making->image") }}" alt="img01"/>
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <script>
        $(function() {
            Grid.init();
        });
    </script>
@endsection