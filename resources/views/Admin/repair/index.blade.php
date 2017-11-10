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
                    <div class="row">
                        <div class="col-12 mb-3">
                            <a class="btn btn-yellow-custom ml-auto" href="{{ route('admin.repair.create') }}">Добавить
                                работу</a>
                        </div>
                        @if(!$repairs->isEmpty())
                            @foreach($repairs as $repair)
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <img class="w-100" style="height: 100px; object-fit: cover"
                                                 src="{{ asset("images/$repair->image_1") }}" alt="До">
                                            <form action="{{ route('admin.repair.update', ['id' => $repair->id]) }}"
                                                  method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <div class="form-group mt-2 mb-2">
                                                    <label class="custom-file">
                                                        <input type="file" name="image_1" class="custom-file-input">
                                                        <span class="custom-file-control"></span>
                                                    </label>
                                                </div>
                                                <input class="btn btn-yellow-custom btn-block" type="submit"
                                                       value="Изменить">
                                            </form>
                                        </div>
                                        <div class="col-6">
                                            <img class="w-100" style="height: 100px; object-fit: cover"
                                                 src="{{ asset("images/$repair->image_2") }}"
                                                 alt="После">
                                            <form action="{{ route('admin.repair.update', ['id' => $repair->id]) }}"
                                                  method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <div class="form-group mt-2 mb-2">
                                                    <label class="custom-file">
                                                        <input type="file" name="image_2" class="custom-file-input">
                                                        <span class="custom-file-control"></span>
                                                    </label>
                                                </div>
                                                <input class="btn btn-yellow-custom btn-block" type="submit"
                                                       value="Изменить">
                                            </form>
                                        </div>
                                        <div class="col-12 mt-3 d-flex">
                                            <form class="d-inline-block ml-auto"
                                                  action="{{ route('admin.repair.destroy', ['id' => $repair->id]) }}"
                                                  method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input class="btn btn-danger" type="submit" value="Удалить">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection