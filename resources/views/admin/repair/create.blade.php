@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid bg-beige pt-4" style="padding-bottom: 100px; min-height: 100vh">
        <div class="container">
            <div class="bg-metall admin-main">
                <div class="admin-main-title">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                    Ремонт и перетяжка
                </div>
                <div style="overflow: hidden" class="admin-table-block">
                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{{ $error }}</div>
                        @endforeach
                    @endif
                    @if(Session::has('result') && !is_array(Session::get('result')))
                        <div class="alert alert-dark" role="alert">
                            {{ Session::get("result") }}
                        </div>
                    @endif
                    <form action="{{ route('admin.repair.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <p>Изображение <b>ДО</b>:</p>
                                <input type="file" name="image_1">
                            </div>
                            <div class="col-md-6 col-12 mt-3 mt-md-0">
                                <p>Изображение <b>ПОСЛЕ</b>:</p>
                                <input type="file" name="image_2">
                            </div>
                            <div class="col-12 mt-4">
                                <input class="pointer btn btn-show" type="submit" value="Добавить">
                                <a class="btn btn-remove ml-2" href="{{ route('admin.repair.index') }}">Отмена</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection