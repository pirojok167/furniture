@extends('Admin.layouts.master')
@section('content')
    <h2>Материалы</h2>
    <a class="btn btn-primary" href="{{ route('admin.materials.create') }}">Добавить</a>
    @if(!$materials->isEmpty())
        @foreach($materials as $material)
            <p>{{ $material->name }}</p>
            <img style="max-width: 160px" src="{{ asset("images/$material->image")}}">
            <form action="{{ route('admin.materials.destroy', ['id' => $material->id]) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="submit" name="delete" id="" value="Удалить" class="btn btn-danger">
            </form>
            <a class="btn btn-success" href="{{ route('admin.materials.edit', ['id' => $material->id]) }}">Редактировать</a>
        @endforeach
    @endif
@endsection