@extends('Admin.layouts.master')
@section('content')
    <h2>Ремонт и перетяжка</h2>
    <a href="{{ route('admin.repair.create') }}">Добавить работу</a>
    @if(!$repairs->isEmpty())
        @foreach($repairs as $repair)
            <p>До</p>
            <img style="max-width:500px" src="{{ asset("images/$repair->image_1") }}" alt="До">
            <form action="{{ route('admin.repair.update', ['id' => $repair->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input name="image_1" type="file" value="Изменить изображение">
                <input type="submit" value="Изменить">
            </form>
            <p>После</p>
            <img style="max-width:500px" src="{{ asset("images/$repair->image_2") }}" alt="После">
            <form action="{{ route('admin.repair.update', ['id' => $repair->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input name="image_2" type="file" value="Изменить изображение">
                <input type="submit" value="Изменить">
            </form>
            <form action="{{ route('admin.repair.destroy', ['id' => $repair->id]) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input class="btn btn-danger" type="submit" value="Удалить">
            </form>
        @endforeach
    @endif
@endsection