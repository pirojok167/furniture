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
                    <a class="btn btn-show" href="{{ route('admin.materials.create') }}">Добавить материал</a>
                    <div class="row">
                        @if(!$materials->isEmpty())
                            @foreach($materials as $material)
                                <div class="col-lg-4 col-sm-6 col-12 mt-3">
                                    <div class="p-2" style="background-color: #f0f0f0;border-radius: 2px">
                                        <p class="text-center mb-2">{{ $material->name }}</p>
                                        <img class="w-100" style="height: 194px;object-fit: cover" src="{{ asset("images/$material->image")}}">
                                        <form action="{{ route('admin.materials.destroy', ['id' => $material->id]) }}"
                                              method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <input type="submit" name="delete" id="" value="Удалить"
                                                           class="btn btn-block btn-sm btn-remove">
                                                </div>
                                                <div class="col-6">
                                                    <a class="btn btn-block btn-sm btn-edit"
                                                       href="{{ route('admin.materials.edit', ['id' => $material->id]) }}">Редактировать</a>
                                                </div>
                                            </div>
                                        </form>
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