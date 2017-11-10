@extends('layouts.master')
@section('header')
    <nav id="header" class="navbar navbar-expand-lg navbar-light bg-green">
        <button style="position: absolute;left: 16px;top:8px;" class="navbar-toggler outline-n pointer" type="button" data-toggle="collapse" data-target="#navbarTogglerEx" aria-controls="navbarTogglerEx" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container" >
            <a class="navbar-brand ml-auto ml-lg-0" href="/">
                <img  height="40" src="../images/templates/logo.png">
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerEx">
                <ul class="navbar-nav mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white"  href="/#services">Услуги<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="/#materials">Материалы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/#order">Как заказать</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white"  href="/#footer">Оставить заявку</a>
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
            <h1 class="text-center mb-5" style="font-family: 'Alice', serif;">Изготовление</h1>
            <ul id="og-grid" class="og-grid">
                @if(!$makings->isEmpty())
                    @foreach($makings as $making)
                        <li>
                            <a href="#" data-name="{{ $making->name }}" class="btn-making-gallery" id="{{ $making->id }}">
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