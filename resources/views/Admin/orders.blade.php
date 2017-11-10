@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid bg-beige pt-4" style="padding: 30px 30px 100px 30px; min-height: 100vh">

            <div class="bg-metall admin-main">
                <div class="admin-main-title">
                    <i class="fa fa-sticky-note-o" aria-hidden="true"></i>
                    Управление заявками
                </div>
                <div class="admin-table-block">
                    <form class="d-inline-block mb-3" action="{{ route('admin.search_orders') }}" method="get">
                        <div class="input-group">
                            <input class="form-control rounded-0" type="search" name="q" placeholder="Поиск">
                            <button class="input-group-addon rounded-0 pointer" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </form>
                    @if(!empty($orders) && !is_string($orders))
                        <table border="1" bordercolor="#ddddd">
                            <tr>
                                <th>№</th>
                                <th>Имя</th>
                                <th>Email</th>
                                <th>Телефон</th>
                                <th>Комментарий</th>
                                <th>Дата</th>
                                <th>Действия</th>
                                <th>Заметки</th>
                            </tr>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->num }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td style="max-width: 500px">{{ $order->comment ?? 'Нет комментария' }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td><a class="btn btn-danger btn-sm pointer" href="{{ route('admin.deleteOrder', ['id' => $order->id]) }}">Удалить</a></td>
                                    <td>
                                        <form action="{{ route('admin.addNote', ['id' => $order->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group m-2">
                                                <textarea class="form-control" name="note" rows="3" placeholder="Заметка">{{ $order->note }}</textarea>
                                            </div>
                                            <div class="form-group text-center">
                                                <input class="btn btn-yellow-custom " type="submit" value="{{ $order->note ? 'Изменить' : 'Добавить' }}">
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @elseif(is_string($orders))
                        <p>{{ $orders }}</p>
                    @endif
                </div>
            </div>
    </div>
@endsection