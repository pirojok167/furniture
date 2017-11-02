@extends('admin.layouts.master')
@section('content')
    <h2>Услуги</h2>
    <a href="{{ route('admin.services.create') }}">Добавить услугу</a>
@endsection