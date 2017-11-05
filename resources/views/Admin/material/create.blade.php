@extends('Admin.layouts.master')
@section('content')
    <h2>Материалы</h2>
    <form action="{{ route('admin.materials.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <p>Наименование</p>
        <input type="text" name="name" id="" value="{{ old('name') ?? '' }}" placeholder="Ткань">
        <input type="file" name="image" id="">
        <input type="submit" id="" value="Добавить">
        <a href="{{ route('admin.materials.index') }}">Отменить</a>
    </form>
@endsection