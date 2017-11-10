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
                    <a href="{{ route('admin.services.create') }}">Добавить услугу</a>
                    @if(!empty($services))
                        @foreach($services as $service)
                            <div>
                                <h3>{{ $service->name }}</h3>
                                <p>{{ $service->description }}</p>
                                <img style="max-width:500px;" src="{{ asset("images/$service->image") }}">
                            </div>
                            <a href="{{ route('admin.services.edit', ['id' => $service->id]) }}">Редактировать</a>
                            <form action="{{ route('admin.services.destroy', ['id' => $service->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="submit" value="Удалить" class="btn btn-danger">
                            </form>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection