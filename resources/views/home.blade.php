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
                <a class="btn btn-info ml-3" href="{{ route('repair') }}">Наши работы</a>
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
        <div class="container">
            <h2 class="text-center mb-5" style="font-family: 'Alice', serif;">Перетяжка и изготовление мягкой мебели в Воронеже</h2>
            <div class="row">
                <div class="col" style="font-size: 22px">
                    Перетяжка мягкой мебели: диваны, кресла,
                    кухонные уголки, офисная мебель, стулья, пуфики. Замена: обивочной ткани, поролона, искусственного наполнителя                   (холлофайбер и поролоновая крошка), пружинных блоков и механизмов трансформации. Ремонт каркаса.
                </div>
                <div class="col">
                    <img class="img" src="../images/templates/sofa.png" alt="">
                </div>
                <div class="col-12 d-flex mt-4">
                    <a class="btn btn-danger ml-auto" href="">
                        Посмотреть наши работы
                    </a>
                    <a class="btn btn-outline-danger ml-3 mr-auto" href="">
                        Оставить заявку
                    </a>
                </div>
            </div>
            <div id="services">
                <div class="text-center mt-5 mb-4">
                    <h2 class="text-white special-title bg-primary d-inline-block pb-1 pr-4 pl-4">Наши услуги</h2>
                </div>
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-6 mb-3 services-block">
                            <div class="w-100 p-2" style="background-color: #f0f0f0;">
                                <div class="services-overflow">
                                    <img class="w-100" style="height: 400px;object-fit: cover" src="{{ asset("images/$service->image") }}">
                                    <div class="services-overflow-img-layer"></div>
                                    <div class="pl-2 pb-2 pr-2 services-overflow-decs">{{ $service->description }}</div>
                                </div>
                                <p class="pt-2 text-center">{{ $service->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="materials">
                <div class="text-center mt-5 mb-4">
                    <h2 class="text-white special-title bg-primary d-inline-block pb-1 pr-4 pl-4">Материалы, которые мы используем</h2>
                </div>
                <div class="row">
                    {{--{{ dd($materials_chunk[0]) }}--}}
                    @foreach($materials_chunk as $k => $materials)
                        @if($k === 0)
                            @foreach($materials as $material)
                                <div class="col-3 mb-3">
                                    <div class="p-2" style="background-color: #f0f0f0;">
                                        <p class="text-center">{{ $material->name }}</p>
                                        <img class="w-100" style="height: 194px;object-fit: cover" src="{{ asset("images/$material->image") }}">
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                    @if(count($materials_chunk) >= 2)
                        <div class="collapse" id="collapse1">
                            <div class="row">
                            @foreach($materials_chunk as $k => $materials)
                                @foreach($materials as $material)
                                    @if($k > 0)
                                        <div class="col-3 mb-3">
                                            <div class="p-2" style="background-color: #f0f0f0;">
                                                <p class="text-center">{{ $material->name }}</p>
                                                <img class="w-100" style="height: 194px;object-fit: cover"
                                                     src="{{ asset("images/$material->image") }}">
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                            </div>
                        </div>
                    @endif
                    @if(count($materials_chunk) >= 2)
                        <div class="col-12">
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                Button with data-target
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div id="order" class="mb-5">
                <div class="text-center mt-5 mb-4">
                    <h2 class="text-white special-title bg-primary d-inline-block pb-1 pr-4 pl-4">Как мы выполняем Ваш заказ</h2>
                </div>
                <div class="row">
                    <div class="ml-auto col-2">
                        <p class="text-center">Шаг 1.</p>
                        <img class="w-100" src="../images/templates/circle_1.png" alt="">
                        <div class="text-center mt-2" >Позвоните нам или оставьте заявку и мы свяжемся с вами
                        </div>
                    </div>
                    <div class="col-2">
                        <p class="text-center">Шаг 2.</p>
                        <img class="w-100" src="../images/templates/circle_2.png" alt="">
                        <div class="text-center mt-2">Позвоните нам или оставьте заявку и мы свяжемся с вами</div>
                    </div>
                    <div class="col-2">
                        <p class="text-center">Шаг 3.</p>
                        <img class="w-100" src="../images/templates/circle_3.png" alt="">
                        <div class="text-center mt-2">Позвоните нам или оставьте заявку и мы свяжемся с вами</div>
                    </div>
                    <div class="col-2">
                        <p class="text-center">Шаг 4.</p>
                        <img class="w-100" src="../images/templates/circle_4.png" alt="">
                        <div class="text-center mt-2">Позвоните нам или оставьте заявку и мы свяжемся с вами
                        </div>
                    </div>
                    <div class="col-2 mr-auto">
                        <p class="text-center">Шаг 5.</p>
                        <img class="w-100" src="../images/templates/circle_5.png" alt="">
                        <div class="text-center mt-2">Позвоните нам или оставьте заявку и мы свяжемся с вами</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
