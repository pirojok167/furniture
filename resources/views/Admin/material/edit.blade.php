@extends('Admin.layouts.master')
@section('content')
    <h2>Материалы</h2>
    @if(!empty($material))
        <form action="{{ route('admin.materials.update', ['id' => $material->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <p>Наименование</p>
            <input type="text" name="name" id="" value="{{ old('name') ?? $material->name }}" placeholder="Ткань">
            <img style="max-width: 160px" src="{{ asset("images/$material->image")}}">
            <input type="file" name="image" id="">
            <input type="submit" id="" value="Добавить">
            <a href="{{ route('admin.materials.index') }}">Отменить</a>
        </form>
    @endif
@endsection