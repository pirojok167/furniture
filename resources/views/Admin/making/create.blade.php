@extends('Admin.layouts.master')
@section('content')
    <div class="container-fluid bg-beige pt-4" style="padding-bottom: 100px; min-height: 100vh">
        <div class="container">
            <div class="bg-metall admin-main">
                <div class="admin-main-title">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                    Управление изготовлениями
                </div>
                <div class="admin-table-block">
                    <form action="{{ route('admin.making.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Нименование:
                            <input class="form-control" type="text" name="name">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="mb-0">Изображения:</label>
                            <br>
                                <label class="custom-file">
                                    <input type="file" name="images[]" multiple class="custom-file-input">
                                    <span class="custom-file-control"></span>
                                </label>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-yellow-custom" type="submit" name="submit" id="" value="Добавить">
                            <a class="btn btn-danger" href="{{ route('admin.making.index') }}">Отменить</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
