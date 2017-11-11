@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid bg-beige pt-4" style="padding-bottom: 100px; min-height: 100vh">
        <div class="container">
            <div class="bg-metall admin-main">
                <div class="admin-main-title">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    Управление контактами
                </div>
                <div class="admin-table-block">
                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{{ $error }}</div>
                        @endforeach
                    @endif
                    @if(Session::has('result') && !is_array(Session::get('result')))
                        <div class="alert alert-dark" role="alert">
                            {{ Session::get("result") }}
                        </div>
                    @endif
                    <form action="{{ route('admin.contacts.update', ['id' => $contacts->id ?? 1]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>Контакты:
                                <input class="phone form-control mb-2" type="text" name="phone_1" id=""
                                       value="{{ old('phone_1') ?? $contacts->phone_1 ?? '' }}" placeholder="Телефон 1">
                                <input class="phone form-control" type="text" name="phone_2" id=""
                                       value="{{ old('phone_2') ?? $contacts->phone_2 ?? '' }}" placeholder="Телефон 2">
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Email:
                                <input class="form-control" type="email" name="email" id=""
                                       value="{{ old('email') ?? $contacts->email ?? '' }}" placeholder="E-mail">
                            </label>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-yellow-custom" type="submit" name="submit" id="" value="Сохранить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection