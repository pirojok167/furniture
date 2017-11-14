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
                <img height="40" src="../images/templates/logo.png">
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
    <div id="modal">

        <div class="w-100 h-100 d-flex" style="position: relative;">
            <div class="modal-content m-auto" style="position: relative">

            </div>
        </div>
    </div>
    <div class="container-fluid bg">
        <div class="container pb-5 pt-4 bg-wrapper">
            <h1 class="text-center mb-5" style="font-family: 'Alice', serif;">Перетяжка</h1>
            <div class="row repairs-blocks">
                @if(!$repairs->isEmpty())
                    @foreach($repairs as $repair)
                        <div class="col-lg-6 col-12 mb-3 repairs-block">
                            <div class="p-2 bg-gray">
                                <div class="row">
                                    <div class="col-sm-5 col-12 pr-sm-0">
                                        <img class="forModal pointer"
                                             style="height: 180px; object-fit: cover; width: 100%;"
                                             src="{{ asset("images/$repair->image_1") }}" alt="До">
                                    </div>
                                    <div class="col-sm-2 col-12 p-sm-0 pt-3 pb-3 d-flex">
                                        <img class="icon icons8-Стрелка-Filled m-auto" style="32" height="32"
                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAABV0lEQVRYR+2WTVKDQBSEe4YF3kZvYNzGn8gN4Aaw0WSlu+hKvEE8gcEq0WWOEG6QI4RFssu0RUpSUTEwFIHSgi3vzfuqp5uHQMOPaHg+WoBWgf+hwF3QHYOgyaXjWZO5TrIqUWAYdCcC4hjkTBLWlRVOi0JUC5BMJeaU9AYX4agIRPUA6VRyZHLp5V3J/gDWanAqCWfXlXwBGD6fdQxjxSLSbdcoJXwIcZTZR8yFoZzr87dx1vsNwP3LqUviQXe4Rr3f77163+s3AMOgeysgbjQO1C8lp6SyBtb7LG2uF+AzJZI8SX3RAABjSXSaAohMtehsR7NGE/Kx3wvdX02YvEhiqO8sQEj6AA6zY8hYGLRzY1hmcNqz2QU/D4moVpfbrt+pQFmILAACTwdq4db/KSZjSrhNLaNIKtq1r+P1DwkAUy3tPMn34oGy3kn6KlnHLUCrwJ9W4AP06KIh27uXRQAAAABJRU5ErkJggg==">
                                    </div>
                                    <div class="col-sm-5 col-12 pl-sm-0">
                                        <img class="forModal pointer"
                                             style="height: 180px; object-fit: cover; width: 100%"
                                             src="{{ asset("images/$repair->image_2") }}" alt="После">
                                    </div>
                                </div>
                                {{--<img class="forModal pointer"--}}
                                     {{--style="height: 180px; object-fit: cover; width: 100%;"--}}
                                     {{--src="{{ asset("images/$repair->image_1") }}" alt="До">--}}
                                {{--<img class="icon icons8-Стрелка-Filled pointer" style="32" height="32"--}}
                                     {{--src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAABV0lEQVRYR+2WTVKDQBSEe4YF3kZvYNzGn8gN4Aaw0WSlu+hKvEE8gcEq0WWOEG6QI4RFssu0RUpSUTEwFIHSgi3vzfuqp5uHQMOPaHg+WoBWgf+hwF3QHYOgyaXjWZO5TrIqUWAYdCcC4hjkTBLWlRVOi0JUC5BMJeaU9AYX4agIRPUA6VRyZHLp5V3J/gDWanAqCWfXlXwBGD6fdQxjxSLSbdcoJXwIcZTZR8yFoZzr87dx1vsNwP3LqUviQXe4Rr3f77163+s3AMOgeysgbjQO1C8lp6SyBtb7LG2uF+AzJZI8SX3RAABjSXSaAohMtehsR7NGE/Kx3wvdX02YvEhiqO8sQEj6AA6zY8hYGLRzY1hmcNqz2QU/D4moVpfbrt+pQFmILAACTwdq4db/KSZjSrhNLaNIKtq1r+P1DwkAUy3tPMn34oGy3kn6KlnHLUCrwJ9W4AP06KIh27uXRQAAAABJRU5ErkJggg==">--}}
                                {{--<img class="forModal pointer"--}}
                                     {{--style="height: 180px; object-fit: cover; width: 100%"--}}
                                     {{--src="{{ asset("images/$repair->image_2") }}" alt="После">--}}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            @if(isset($paginate) && !empty($paginate))
                {!! $paginate !!}
            @endif
        </div>
    </div>
@endsection
@section('paginate')
@endsection