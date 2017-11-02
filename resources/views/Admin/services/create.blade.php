@extends('admin.layouts.master')
@section('content')
    <h2>Услуги</h2>
    <form action="{{ route('admin.services.create') }}" method="post" enctype="multipart/form-data">
        <p>Наименование</p>
        <input type="text" name="name" placeholder="Новая услуга">
        <p>Изображение</p>
        <input type="file" name="images[]" multiple>
        <br>
        <br>
        <input type="submit">
    </form>
@endsection