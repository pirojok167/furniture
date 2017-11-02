@extends('admin.layouts.master')
@section('content')
    <h2>Услуги</h2>
    <form action="{{ route('admin.services.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <p>Наименование</p>
        <input type="text" name="name" placeholder="Новая услуга">
        <p>Описание</p>
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <p>Изображение</p>
        <input type="file" name="image">
        <br>
        <br>
        <input type="submit">
    </form>
@endsection