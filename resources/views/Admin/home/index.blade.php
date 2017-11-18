@extends('Admin.layouts.master')
@section('content')

<div class="container-fluid">
    <p>{{ $home_info->title ?? 'Заголовок отсутствует' }}</p>
    <p>{{ $home_info->text ?? 'Текст на главной отсутствует' }}</p>
    <p>Изображение:</p>
    <img src="{{ asset("images/$home_info->image")  }}" alt="Заголовок">
    <a href="{{ route('admin.edit_admin_home') }}">Редактировать</a>
</div>
@endsection