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
                    <a class="btn btn-yellow-custom mb-3" href="{{ route('admin.services.create') }}">Добавить услугу</a>
                    <div class="row">
                        @if(!empty($services))
                            @foreach($services as $service)
                                <div class="col-6">
                                        <h4>{{ $service->name }}</h4>
                                        <p>{{ $service->description }}</p>
                                        <img class="w-100" src="{{ asset("images/$service->image") }}">
                                    <form class=" d-flex mt-3" action="{{ route('admin.services.destroy', ['id' => $service->id]) }}"
                                          method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a class="btn btn-yellow-custom ml-auto" href="{{ route('admin.services.edit', ['id' => $service->id]) }}">Редактировать</a>
                                        <input type="submit" value="Удалить" class="btn btn-danger ml-2">
                                    </form>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection