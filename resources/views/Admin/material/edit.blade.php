@extends('Admin.layouts.master')
@section('content')
    <div class="container-fluid bg-beige pt-4" style="padding-bottom: 100px; min-height: 100vh">
        <div class="container">
            <div class="bg-metall admin-main">
                <div class="admin-main-title">
                    <i class="fa fa-stack-overflow" aria-hidden="true"></i>
                    Управление материалами
                </div>
                <div class="admin-table-block">
                @if(!empty($material))
                    <form action="{{ route('admin.materials.update', ['id' => $material->id]) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>Нименование:
                                <input class="form-control" type="text" value="{{ old('name') ?? $material->name }}" placeholder="Ткань" name="name">
                            </label>
                        </div>
                        <div class="form-group">
                            <p>Изображение:</p>
                            <img style="height: 194px; width: 230px;object-fit: cover" src="{{ asset("images/$material->image")}}">
                        </div>
                        <div class="form-group">
                            <label class="custom-file">
                                <input type="file" name="image" class="custom-file-input">
                                <span class="custom-file-control"></span>
                            </label>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-danger" type="submit" id="" value="Добавить">
                            <a class="btn btn-primary" href="{{ route('admin.materials.index') }}">Отменить</a>
                        </div>
                    </form>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection