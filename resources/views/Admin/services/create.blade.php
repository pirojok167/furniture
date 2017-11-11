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
                    <form action="{{ route('admin.services.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Наименование:
                                <input type="text" class="form-control" name="name" value="{{ old('name') ?? '' }}"
                                       placeholder="Название услуги">
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Описание:
                                <textarea class="form-control" name="description" placeholder="Описание услуги" id=""
                                          cols="40" rows="6">{{ old('description') ?? '' }}</textarea>
                            </label>
                        </div>
                        <div class="form-group">
                            <p class="m-0">Изображение:</p>
                            <label class="custom-file">
                                <input type="file" name="image" class="custom-file-input">
                                <span class="custom-file-control"></span>
                            </label>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-yellow-custom" type="submit" value="Добавить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection