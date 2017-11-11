@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid bg-beige pt-4" style="padding-bottom: 100px; min-height: 100vh">
        <div class="container">
            <div class="bg-metall admin-main">
                <div class="admin-main-title">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    Управление профилем
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
                    @if(!empty($profile))
                        <form action="{{ route('admin.changeProfile') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Email:
                                    <input class="form-control" type="email" name="email" id=""
                                           value="{{ $profile->email ?? '' }}">
                                </label>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-yellow-custom" type="submit" name="" id="" value="Изменить">
                            </div>
                        </form>
                        <form action="{{ route('admin.changePassword') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Пароль:
                                    <input class="form-control mb-2" type="password" name="old_password" id=""
                                           placeholder="Старый пароль">
                                    <input class="form-control mb-2" type="password" name="new_password" id=""
                                           placeholder="Новый пароль">
                                    <input class="form-control mb-2" type="password" name="confirm_password" id=""
                                           placeholder="Повторите пароль">
                                </label>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-yellow-custom" type="submit" name="" id="" value="Изменить">
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection