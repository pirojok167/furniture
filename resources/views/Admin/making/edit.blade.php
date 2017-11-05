@extends('Admin.layouts.master')
@section('content')
    <h2>Изготовление</h2>
    @if(isset($making) && !empty($making))
        <form action="{{ route('admin.making.update', ['id' => $making]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <p>Нименование</p>
            <input type="text" name="name" value="{{ old('name') ?? $making->name }}">
            <br><br>
            <input type="file" name="images[]" id="" multiple>
            <input type="submit" name="submit" id="">
        </form>
        <br>
        <p>Изображения</p>
        <form action="{{ route('admin.makingDeletImage') }}" method="post">
            {{ csrf_field() }}
            @foreach($making->images as $image)
                <img style="max-width: 360px" src="{{ asset("images/$image") }}" alt="{{ $making->name }}">
                <input type="hidden" name="image" id="" value="{{ $image }}">
                <input class="btn btn-dark" type="submit" value="Удалить изображение">
            @endforeach
        </form>
        <form action="{{ route('admin.making.destroy', ['id' => $making->id]) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" name="submit" id="" value="Удалить">
        </form>
        <a class="btn btn-primary" href="{{ route('admin.making.index') }}">Назад</a>
    @endif
@endsection