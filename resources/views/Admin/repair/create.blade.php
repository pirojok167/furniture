@extends('Admin.layouts.master')
@section('content')
    <h2>Ремонт и перетяжка</h2>
    <form action="{{ route('admin.repair.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <p>Изображение ДО</p>
        <input name="image_1" type="file" value="Добавить">
        <p>Изображение ПОСЛЕ</p>
        <input name="image_2" type="file" value="Добавить">
        <input type="submit" value="Сохранить">
    </form>
@endsection