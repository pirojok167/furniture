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
                    <div class="row">
                        @if(isset($making) && !empty($making))
                            <div class="col-md-6 col-12">
                                <form action="{{ route('admin.making.update', ['id' => $making]) }}" method="post"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="form-group">
                                        <label>Нименование:
                                            <input class="form-control" type="text" name="name"
                                                   value="{{ old('name') ?? $making->name }}">
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-0">Заменить изображения</label>
                                        <br>
                                            <input type="file" name="images[]" multiple class="custom-file-input">

                                            <input type="file" name="images[]" multiple >
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-edit" type="submit" value="Изменить"
                                               name="submit" id="">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 col-12">
                                <p>Изображения:</p>
                                <form action="{{ route('admin.makingDeletImage') }}" method="post">
                                    {{ csrf_field() }}
                                    @foreach($making->images as $image)
                                        <div style="position: relative; height: 100px; width: 150px;" class="fl mr-2">
                                            <img class="w-100 h-100" style="object-fit: cover"
                                                 src="{{ asset("images/$image") }}" alt="{{ $making->name }}">
                                            <input type="hidden" name="image" id="" value="{{ $image }}">
                                            <button class="p-1 border-0 pointer"
                                                    style="background-color: rgba(0,0,0,.5);top:0;right: 0;position: absolute"
                                                    type="submit">
                                                <img class="icon icons8-Удалить" width="24" height="24"
                                                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAq0lEQVRIS81V2w3AIAiEjTqKI3WkjtKNaEg0UatymmLaTwt3PA5gcv7YGZ/2EojIRUQnM98rmYnIEf1D8i8yiAZKEmZJer6vEq2QjHyaPZghsWy7TbYctcaIzVBFIwAEXIMwZdoCQsEhgroUUX6w0swMkp6zqPUJlvE/CPKaf14i1ya7yhSRImKzf1UgUdWrHF52K+CNOSlmpL4Hvgdn5YpZPvAkW0C9/+4ED+u8oBkpkt28AAAAAElFTkSuQmCC">
                                            </button>
                                        </div>
                                    @endforeach
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            <div class="col-12 mt-3 d-flex">
                                <form class="d-inline-block ml-auto"
                                      action="{{ route('admin.making.destroy', ['id' => $making->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-remove" type="submit" name="submit" id="" value="Удалить">
                                    <a class="btn btn-show" href="{{ route('admin.making.index') }}">Назад</a>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection