@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid bg-beige pt-4" style="padding-bottom: 100px; min-height: 100vh">
        <div class="container d-flex">
            <div class="bg-metall admin-main m-auto">
                <div class="admin-main-title">
                    <i class="fa fa-stack-overflow" aria-hidden="true"></i>
                    Управление материалами
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
                    <form action="{{ route('admin.materials.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Нименование:
                                <input class="form-control" type="text" value="{{ old('name') ?? '' }}"
                                       placeholder="Ткань" name="name">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="mb-0">Изображения:</label>
                            <br>
                                <input type="file" name="image">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-show" type="submit" id="" value="Добавить">
                            <a class="btn btn-remove" href="{{ route('admin.materials.index') }}">Отменить</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection