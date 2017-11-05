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
                <a class="btn btn-info ml-2" href="{{ route('repair') }}">Изготовление</a>
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
            <h1 class="text-center mb-5" style="font-family: 'Alice', serif;">Перетяжка</h1>
            <div class="row repairs-blocks">
                @if(!$repairs->isEmpty())
                    @foreach($repairs as $repair)
                        <div class="col-6 mb-3 repairs-block">
                            <div class="row">
                                <div class="col-5 ">
                                    <img class="w-100" style="height: 180px; object-fit: cover" src="{{ asset("images/$repair->image_1") }}" alt="До">
                                </div>
                                <div class="col-2 d-flex">
                                    <img class="m-auto icon icons8-Стрелка-Filled" width="32" height="32" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAABV0lEQVRYR+2WTVKDQBSEe4YF3kZvYNzGn8gN4Aaw0WSlu+hKvEE8gcEq0WWOEG6QI4RFssu0RUpSUTEwFIHSgi3vzfuqp5uHQMOPaHg+WoBWgf+hwF3QHYOgyaXjWZO5TrIqUWAYdCcC4hjkTBLWlRVOi0JUC5BMJeaU9AYX4agIRPUA6VRyZHLp5V3J/gDWanAqCWfXlXwBGD6fdQxjxSLSbdcoJXwIcZTZR8yFoZzr87dx1vsNwP3LqUviQXe4Rr3f77163+s3AMOgeysgbjQO1C8lp6SyBtb7LG2uF+AzJZI8SX3RAABjSXSaAohMtehsR7NGE/Kx3wvdX02YvEhiqO8sQEj6AA6zY8hYGLRzY1hmcNqz2QU/D4moVpfbrt+pQFmILAACTwdq4db/KSZjSrhNLaNIKtq1r+P1DwkAUy3tPMn34oGy3kn6KlnHLUCrwJ9W4AP06KIh27uXRQAAAABJRU5ErkJggg==">
                                </div>
                                <div class="col-5">
                                    <img class="w-100" style="height: 180px; object-fit: cover" src="{{ asset("images/$repair->image_2") }}" alt="После">
                                </div>
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