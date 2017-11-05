@extends('Admin.layouts.master')
@section('content')
    <h2>Ремонт и перетяжка</h2>
    <a href="{{ route('admin.repair.create') }}">Добавить изображения</a>
    @if(!$repairs->isEmpty())
        @foreach($repairs as $repair)
            <img style="max-width:500px" src="{{ $repair->image_1 }}" alt="До">
            <form action="{{ route('update-image') }}"></form>
            <img style="max-width:500px" src="{{ $repair->image_2 }}" alt="После">
        @endforeach
    @endif
@endsection