@extends('admin.layouts.master')
@section('content')
    <h2>Услуги</h2>
    @if(!empty($service))
        <form action="{{ route('admin.services.update', ['id' => $service->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <p>Наименование</p>
            <input type="text" name="name" value="{{ $service->name }}">
            <p>Описание</p>
            <textarea name="description" id="" cols="30" rows="10">{{ $service->description }}</textarea>
            <p>Изображение</p>
            <img style="max-width: 500px" src="{{ asset("images/$service->image") }}" alt="{{ $service->name }}">
            <input type="file" name="image">
            <br>
            <br>
            <input type="submit">
        </form>
        <form action="{{ route('admin.services.destroy', ['id' => $service->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="submit" value="Удалить" class="btn btn-danger">
        </form>
    @endif
@endsection