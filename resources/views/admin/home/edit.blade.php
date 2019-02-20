@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <form action="{{ route('admin.update_admin_home') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="text" name="title" value="{{ $home_info->title ?? '' }}" placeholder="Заголовок">
            <br>
            <textarea name="text" id="" cols="30" rows="10">{{ $home_info->text ?? '' }}</textarea>
            <br>
            <input type="file" name="image" value="" placeholder="Заголовок">
            <img src="{{ $home_info !== null ? asset("images/{$home_info->image}") : null  }}" alt="Заголовок">
            <br>
            <input type="submit" value="Сохранить">
            <a href="{{ route('admin.admin') }}">Назад</a>
        </form>
    </div>
@endsection