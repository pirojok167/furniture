@extends('Admin.layouts.master')
@section('content')
    <h2>Изготовление</h2>
    <form action="{{ route('admin.making.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <p>Нименование</p>
        <input type="text" name="name">
        <p>Изображения</p>
        <input type="file" name="images[]" id="" multiple>
        <input type="submit" name="submit" id="" value="Добавить">
        <a class="btn btn-yellow" href="{{ route('admin.making.index') }}">Отменить</a>
    </form>
@endsection
