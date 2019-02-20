@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
            <p>{{ $home_info->title ?? 'Заголовок отсутствует' }}</p>
            <p>{{ $home_info->text ?? 'Текст на главной отсутствует' }}</p>
            <p>Изображение:</p>
            <img src="{{ $home_info !== null ? asset("images/{$home_info->image}") : null  }}" alt="Заголовок">
            <a href="{{ route('admin.edit_admin_home') }}">Редактировать</a>
    </div>
@endsection