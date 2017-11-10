@extends('Admin.layouts.master')
@section('content')
    <div class="container-fluid bg-beige pt-4" style="padding-bottom: 100px; min-height: 100vh">
        <div class="container">
            <div class="bg-metall admin-main">
                <div class="admin-main-title">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                    Управление изготовлениями
                </div>
                <div class="admin-table-block">
                    <a class="btn btn-yellow-custom" href="{{ route('admin.making.create') }}">Добавить изделие</a>
                    <div class="row">
                        @if(!$makings->isEmpty())
                            @foreach($makings as $making)
                                <div class="col-6">
                                    <p class="text-center">{{ $making->name }}</p>
                                <img class="w-100" style="height: 200px; object-fit: cover" src="{{ asset("images/$making->image") }}" alt="{{ $making->name }}">
                                <a class="btn btn-yellow-custom mt-3" href="{{ route('admin.making.edit', ['id' => $making->id]) }}">Редактировать</a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection