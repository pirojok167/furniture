@extends('Admin.layouts.master')
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
                    @if(!empty($material))
                        <form action="{{ route('admin.materials.update', ['id' => $material->id]) }}" method="post"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label>Нименование:
                                    <input class="form-control" type="text" value="{{ old('name') ?? $material->name }}"
                                           placeholder="Ткань" name="name">
                                </label>
                            </div>
                            <div class="form-group">
                                <p>Изображение:</p>
                                <img style="height: 194px; width: 230px;object-fit: cover"
                                     src="{{ asset("images/$material->image")}}">
                            </div>
                            <div class="form-group">
                                    <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-edit" type="submit" id="" value="Изменить">
                                <a class="btn btn-remove" href="">Удалить</a>
                                <a class="btn btn-show" href="{{ route('admin.materials.index') }}">Отмена</a>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection