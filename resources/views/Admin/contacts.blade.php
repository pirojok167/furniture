@extends('admin.layouts.master')
@section('content')
    <h2>Контакты</h2>
    <form action="{{ route('admin.contacts.update', ['id' => $contacts->id ?? 1]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <p>Контакты</p>
        <input type="text" name="phone_1" id="" value="{{ old('phone_1') ?? $contacts->phone_1 ?? '' }}" placeholder="Телефон 1">
        <input type="text" name="phone_2" id="" value="{{ old('phone_2') ?? $contacts->phone_2 ?? '' }}" placeholder="Телефон 2">
        <p>Email</p>
        <input type="email" name="email" id="" value="{{ old('email') ?? $contacts->email ?? '' }}" placeholder="Email">
        <input type="submit" name="submit" id="" value="Сохранить">
    </form>
@endsection