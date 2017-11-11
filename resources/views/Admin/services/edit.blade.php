@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid bg-beige pt-4" style="padding-bottom: 100px; min-height: 100vh">
        <div class="container">
            <div class="bg-metall admin-main">
                <div class="admin-main-title">
                    <i class="fa fa-sticky-note-o" aria-hidden="true"></i>
                    Управление услугами
                </div>
                <div class="admin-table-block">
                    @if(!empty($service))
                        <form action="{{ route('admin.services.update', ['id' => $service->id]) }}" method="post"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label>Наименование:
                                    <input type="text" class="form-control" name="name" value="{{ $service->name }}"
                                           placeholder="Название услуги">
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Описание:
                                    <textarea class="form-control" name="description" placeholder="Описание услуги"
                                              id="" cols="40" rows="6">{{ $service->description }}</textarea>
                                </label>
                            </div>
                            <div class="form-group">
                                <p class="">Изображение:</p>
                                <img style="height: 200px; width:300px; object-fit: cover"
                                     src="{{ asset("images/$service->image") }}"
                                     alt="{{ $service->name }}">
                            </div>
                            <div class="form-group">
                                <label class="custom-file">
                                    <input type="file" name="image" class="custom-file-input">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-yellow-custom fl" type="submit" value="Изменить">
                            </div>
                        </form>
                        <form style="margin-left: 103px"
                              action="{{ route('admin.services.destroy', ['id' => $service->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Удалить" class="btn btn-danger">
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection