@extends('Admin.layouts.master')
@section('content')
    <h2>Изготовление</h2>
    <a class="btn btn-primary" href="{{ route('admin.making.create') }}">Добавить изделие</a>
    @if(!$makings->isEmpty())
        @foreach($makings as $making)
            <p>{{ $making->name }}</p>
            <img style="max-width: 500px" src="{{ asset("images/$making->image") }}" alt="{{ $making->name }}">
            <a href="{{ route('admin.making.edit', ['id' => $making->id]) }}">Редактировать</a>
        @endforeach
    @endif
@endsection