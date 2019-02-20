@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid bg-beige pt-4" style="padding-bottom: 100px; min-height: 100vh">
        <div class="container">
            <div class="bg-metall admin-main">
                <div class="admin-main-title">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                    Управление изготовлениями
                </div>
                <div class="admin-table-block">
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
                    <form action="{{ route('admin.making.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Нименование:
                                <input class="form-control" type="text" name="name">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="mb-0">Изображения:</label>
                            <input type="file" name="images[]" multiple>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-show" type="submit" name="submit" id="" value="Добавить">
                            <a class="btn btn-remove" href="{{ route('admin.making.index') }}">Отменa</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
