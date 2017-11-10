@extends('layouts.master')
@section('header')
    <nav id="header" class="navbar navbar-expand-lg navbar-light bg-green">
        <button style="position: absolute;left: 16px;top:8px;" class="navbar-toggler outline-n pointer" type="button" data-toggle="collapse" data-target="#navbarTogglerEx" aria-controls="navbarTogglerEx" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container " >
            <a class="navbar-brand ml-auto ml-lg-0" href="/">
                <img  height="40" src="../images/templates/logo.png">
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerEx">
                <ul class="navbar-nav mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link"  href="#services">Услуги<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#materials">Материалы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#order">Как заказать</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#footer">Оставить заявку</a>
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
    <div class="container-fluid bg">
        <div class="container bg-wrapper pt-4">
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
                    <a class="btn btn-green ml-auto" href="{{ route('repair') }}">
                        Посмотреть наши работы
                    </a>
                    <a class="btn btn-green-outline btn-order ml-3 mr-auto" href="#footer">
                        Оставить заявку
                    </a>
                </div>
            </div>
            <div class="post" id="services">
                <div class="text-center mt-5 mb-4">
                    <h2 class="text-white special-title bg-green d-inline-block pb-1 pr-4 pl-4">Наши услуги</h2>
                </div>
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-6 mb-3 services-block">
                            <div class="w-100 p-2 bg-gray">
                                <div class="services-overflow">
                                    <img class="w-100" style="height: 400px;object-fit: cover" src="{{ asset("images/$service->image") }}">
                                    <div class="services-overflow-img-layer"></div>
                                    <div class="pl-2 pb-2 pr-2 services-overflow-decs">{{ $service->description }}</div>
                                </div>
                                <p class="pt-2 mb-1 text-center">{{ $service->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="post" id="materials">
                <div class="text-center mt-5 mb-4">
                    <h2 class="text-white special-title bg-green d-inline-block pb-1 pr-4 pl-4">Материалы, которые мы используем</h2>
                </div>
                <div class="row mt-5 mb-5">
                    @foreach($materials_chunk as $k => $materials)
                        @if($k === 0)
                            @foreach($materials as $material)
                                <div class="col-3 mb-3">
                                    <div class="p-2" style="background-color: #f0f0f0;border-radius: 2px">
                                        <p class="text-center mb-2">{{ $material->name }}</p>
                                        <div class="img-materials" style="position: relative">
                                            <img class="w-100 " style="height: 194px;object-fit: cover;border-radius: 2px" src="{{ asset("images/$material->image") }}">
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
                                            <div class="col-3 mb-3">
                                                <div class="p-2" style="background-color: #f0f0f0;">
                                                    <p class="text-center mb-2">{{ $material->name }}</p>
                                                    <div class="img-materials" style="position: relative">
                                                        <img class="w-100" style="height: 194px;object-fit: cover"
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
                            <button class="mx-auto border-0 pointer collapsed show-more-material" style="background-color: transparent;outline: none" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                <img class="icon icons8-Развернуть" width="50" height="50" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAABv0lEQVRoQ+3YP0vEMBjH8e+BoC9NJ3ETQXFRF910dHLUTRd1EQVxEyd9aQqCkqMHMeZ/8oRwpNO116b9PL88bemMJVlmS+JgQHpLciQyEhGqwJhaQoXNHnYkkl06oQNHIkKFzR7WTGQFeALegJfsUWUP3AY2gV3ge3EqHbIKvAIbwA+w0yFGIZ5h/o74DmwBXwqjQ9YmyPqk7A2jI9QlfkyQTxOi1m2YfeBRdrYER98DHrTC/0HYID1igggXpCdMFMIH6QETjQhBXJgj4D44q8t2OABufT1hDh/zZLfdACQxyYiYRBZwE6O2HwokoxB3WrX/3Z1cQcck0gqTjUhJxIc5AW7KWoJj4DonCdsrSuy12KZZCaYYkZNI7WSqIEogtluz2paSTDVEKcSFOQOuAvP0FLgs6Ymc50iod2w948NUR9RIxNczNowIoiYkZpqJIWpDXJjzKbaLmj0h0SPmmLae0feJfu0INaf+f8orSsq4LowIQmJq6VgTI4aQhug9o36rLx7zDwUSi9TUMpNR62KIFolIFN86ZotEmmAGpEmZE04yEkkoVpNdRyJNypxwkpFIQrGa7DoSaVLmhJP8AosydjMRIKnxAAAAAElFTkSuQmCC">
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="post pb-5" id="order" class="pb-5">
                <div class="text-center mt-4 mb-4">
                    <h2 class="text-white special-title bg-green d-inline-block pb-1 pr-4 pl-4">Как мы выполняем Ваш заказ</h2>
                </div>
                <div class="row mt-5 mb-5">
                    <div class="ml-auto col-2">
                        <p class="text-center">Шаг 1.</p>
                        <img class="w-100" src="../images/templates/circle_1.png" alt="">
                        <div class="text-center mt-2" >Позвоните нам или оставьте заявку, и мы свяжемся с вами
                        </div>
                    </div>
                    <div class="col-2">
                        <p class="text-center">Шаг 2.</p>
                        <img class="w-100" src="../images/templates/circle_2.png" alt="">
                        <div class="text-center mt-2">Произведём замеры</div>
                    </div>
                    <div class="col-2">
                        <p class="text-center">Шаг 3.</p>
                        <img class="w-100" src="../images/templates/circle_3.png" alt="">
                        <div class="text-center mt-2">Определим стоимость работ и материалов</div>
                    </div>
                    <div class="col-2">
                        <p class="text-center">Шаг 4.</p>
                        <img class="w-100" src="../images/templates/circle_4.png" alt="">
                        <div class="text-center mt-2">Отремонтируем Ваш диван
                        </div>
                    </div>
                    <div class="col-2 mr-auto">
                        <p class="text-center">Шаг 5.</p>
                        <img class="w-100" src="../images/templates/circle_5.png" alt="">
                        <div class="text-center mt-2">Акт о приёмке выполненных работ и оплата</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
