@extends('Admin.layouts.master')
@section('content')
    <div class="container-fluid bg-beige pt-4" style="padding-bottom: 100px; min-height: 100vh">
        <div class="container">
            <div class="bg-metall admin-main">
                <div class="admin-main-title">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                    Ремонт и перетяжка
                </div>
                <div class="admin-table-block">
                    <form action="{{ route('admin.repair.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-6">
                                <p>Изображение <b>ДО</b>:</p>
                                <label class="custom-file">
                                    <input type="file" name="image_1" class="custom-file-input">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                            <div class="col-6">
                                <p>Изображение <b>ПОСЛЕ</b>:</p>
                                <label class="custom-file">
                                    <input type="file" name="image_2" class="custom-file-input">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                            <div class="col-12 mt-4">
                                <input class="pointer btn btn-yellow-custom" type="submit" value="Сохранить">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection