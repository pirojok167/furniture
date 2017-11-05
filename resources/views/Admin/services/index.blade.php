@extends('admin.layouts.master')
@section('content')
    <h2>Услуги</h2>
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
@endsection