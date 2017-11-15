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
        <div class="container ">
            <a class="navbar-brand mx-auto ml-lg-0 mr-lg-4" href="/">
                <img height="40" src="../images/templates/logo.png">
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerEx">
                <ul class="navbar-nav mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Услуги<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#materials">Материалы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#order">Как заказать</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">Оставить заявку</a>
                    </li>
                </ul>
                <a class="btn btn-green btn-sm ml-3" href="{{ route('repair') }}">Наши работы</a>
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
    <div class="container-fluid bg p-0 pl-sm-3 pr-sm-3">
        <div class="container bg-wrapper pt-4">
            <h1 class="text-center mb-5" style="font-family: 'Alice', serif;">Перетяжка и изготовление мягкой мебели в
                Воронеже</h1>
            <div class="row">
                <div class="col-lg-6 col-12 order-lg-1" style="font-size: 1.3rem">
                    Перетяжка мягкой мебели: диваны, кресла,
                    кухонные уголки, офисная мебель, стулья, пуфики. Замена: обивочной ткани, поролона, искусственного
                    наполнителя (холлофайбер и поролоновая крошка), пружинных блоков и механизмов трансформации. Ремонт
                    каркаса. Мы работаем в Воронеже и Воронежской области.
                </div>
                <div class="col-lg-6 col-12 order-first order-lg-2">
                    <img class="img" src="../images/templates/sofa.png" alt="Диван">
                </div>
                <div class="col-12 mt-4 order-3">
                    <div class="row">
                        <div class="col-sm-6 col-12 d-flex">
                            <a class="btn btn-green mx-auto mx-sm-0 ml-sm-auto" href="{{ route('repair') }}">
                                Посмотреть наши работы
                            </a>
                        </div>
                        <div class="col-sm-6 col-12 d-flex">
                            <a class="btn mt-3 mt-sm-0 btn-green-outline btn-order mx-auto mx-sm-0 mr-sm-auto"
                               href="#footer">
                                Оставить заявку
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post" id="services">
                <div class="text-center mt-5 mb-4">
                    <p class="text-white special-title bg-green d-inline-block pb-1 pr-4 pl-4 h2">Наши услуги</p>
                </div>
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-lg-6 col-12 mb-3 services-block">
                            <div class="w-100 p-2 bg-gray">
                                <div class="services-overflow">
                                    <img class="w-100" alt="{{ $service->name }}"
                                         style="height: 400px;object-fit: cover"
                                         src="{{ asset("images/$service->image") }}">
                                    <div class="services-overflow-img-layer"></div>
                                    <div class="pl-2 pb-2 pr-2 services-overflow-decs">{{ $service->description }}</div>
                                </div>
                                <h2 class="pt-2 mb-1 text-center h5">{{ $service->name }}</h2>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="post" id="materials">
                <div class="text-center mt-5 mb-4">
                    <p class="text-white special-title bg-green d-inline-block pb-1 pr-4 h2 pl-4">Материалы, которые мы
                        используем</p>
                </div>
                <div class="row mt-5 mb-5">
                    @foreach($materials_chunk as $k => $materials)
                        @if($k === 0)
                            @foreach($materials as $material)
                                <div class="col-md-4 col-sm-6 col-12 col-lg-3 mb-3">
                                    <div class="p-2" style="background-color: #f0f0f0;border-radius: 2px">
                                        <p class="text-center mb-2">{{ $material->name }}</p>
                                        <div class="img-materials" style="position: relative">
                                            <img class="w-100" alt="{{ $material->name }}"
                                                 style="height: 194px;object-fit: cover;border-radius: 2px"
                                                 src="{{ asset("images/$material->image") }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                    @if(count($materials_chunk) >= 2)
                        <div class="collapse" style="padding-left: 15px;padding-right: 15px" id="collapse1">
                            <div class="row">
                                @foreach($materials_chunk as $k => $materials)
                                    @foreach($materials as $material)
                                        @if($k > 0)
                                            <div class="col-md-4 col-sm-6 col-12 col-lg-3 mb-3">
                                                <div class="p-2" style="background-color: #f0f0f0;">
                                                    <p class="text-center mb-2">{{ $material->name }}</p>
                                                    <div class="img-materials" style="position: relative">
                                                        <img class="w-100" alt="{{ $material->name }}"
                                                             style="height: 194px;object-fit: cover"
                                                             src="{{ asset("images/$material->image") }}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if(count($materials_chunk) >= 2)
                        <div class="col-12 d-flex">
                            <button class="mx-auto border-0 pointer collapsed show-more-material"
                                    style="background-color: transparent;outline: none" type="button"
                                    data-toggle="collapse" data-target="#collapse1" aria-expanded="false"
                                    aria-controls="collapse1">
                                <img alt="Развернуть" class="icon icons8-Развернуть" width="50" height="50"
                                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAABv0lEQVRoQ+3YP0vEMBjH8e+BoC9NJ3ETQXFRF910dHLUTRd1EQVxEyd9aQqCkqMHMeZ/8oRwpNO116b9PL88bemMJVlmS+JgQHpLciQyEhGqwJhaQoXNHnYkkl06oQNHIkKFzR7WTGQFeALegJfsUWUP3AY2gV3ge3EqHbIKvAIbwA+w0yFGIZ5h/o74DmwBXwqjQ9YmyPqk7A2jI9QlfkyQTxOi1m2YfeBRdrYER98DHrTC/0HYID1igggXpCdMFMIH6QETjQhBXJgj4D44q8t2OABufT1hDh/zZLfdACQxyYiYRBZwE6O2HwokoxB3WrX/3Z1cQcck0gqTjUhJxIc5AW7KWoJj4DonCdsrSuy12KZZCaYYkZNI7WSqIEogtluz2paSTDVEKcSFOQOuAvP0FLgs6Ymc50iod2w948NUR9RIxNczNowIoiYkZpqJIWpDXJjzKbaLmj0h0SPmmLae0feJfu0INaf+f8orSsq4LowIQmJq6VgTI4aQhug9o36rLx7zDwUSi9TUMpNR62KIFolIFN86ZotEmmAGpEmZE04yEkkoVpNdRyJNypxwkpFIQrGa7DoSaVLmhJP8AosydjMRIKnxAAAAAElFTkSuQmCC">
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="post pb-5" id="order" class="pb-5">
                <div class="text-center mt-4 mb-4">
                    <p class="text-white special-title h2 bg-green d-inline-block pb-1 pr-4 pl-4">Как мы выполняем Ваш
                        заказ</p>
                </div>
                <div class="row mt-5 mb-5">
                    <div class="ml-lg-auto col-lg-2 col-md-3 col-sm-4 col-6">
                        <p class="text-center">Шаг 1.</p>
                        <img class="w-100 img-steps" src="../images/templates/circle_1.png" alt="заявка на ремонт">
                        <div class="text-center mt-2">Позвоните нам или оставьте заявку, и мы свяжемся с вами
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                        <p class="text-center">Шаг 2.</p>
                        <img class="w-100 img-steps" src="../images/templates/circle_2.png" alt="замеры дивана">
                        <div class="text-center mt-2">Произведём замеры</div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-3 mt-sm-0">
                        <p class="text-center">Шаг 3.</p>
                        <img class="w-100 img-steps" src="../images/templates/circle_3.png" alt="стоимость ремонта дивана">
                        <div class="text-center mt-2">Определим стоимость работ и материалов</div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-3 mt-md-0">
                        <p class="text-center">Шаг 4.</p>
                        <img class="w-100 img-steps" src="../images/templates/circle_4.png" alt="ремонт дивана">
                        <div class="text-center mt-2">Отремонтируем Ваш диван
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mr-lg-auto mt-3 mt-lg-0">
                        <p class="text-center">Шаг 5.</p>
                        <img class="w-100 img-steps" src="../images/templates/circle_5.png" alt="оплата ремонта дивана">
                        <div class="text-center mt-2">Акт о приёмке выполненных работ и оплата</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
