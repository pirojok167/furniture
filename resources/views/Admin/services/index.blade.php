@extends('admin.layouts.master')
@section('content')
    <h2>Услуги</h2>
    <a href="{{ route('admin.services.create') }}">Добавить услугу</a>
    @foreach($services as $service)
        <div>
        <h3>{{ $service->name }}</h3>
        <p>{{ $service->description }}</p>
            <img style="max-width:500px;" src="{{ asset("images/$service->image") }}">
        </div>
    @endforeach
@endsection