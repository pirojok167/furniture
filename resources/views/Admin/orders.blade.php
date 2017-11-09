@extends('admin.layouts.master')
@section('content')
    <h2>Заявки</h2>
    <form action="{{ route('admin.search_orders') }}" method="get">
        <input type="search" name="q" id="">
        <input type="submit" id="" value="Найти">
    </form>
    <br>
    @if(!empty($orders) && !is_string($orders))
        <table border="1px" cellspacing="10px" cellpadding="5px">
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
                    <td>{{ $order->comment ?? 'Нет комментария' }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td><a class="btn btn-danger" href="{{ route('admin.deleteOrder', ['id' => $order->id]) }}">Удалить</a></td>
                    <td>
                        <form action="{{ route('admin.addNote', ['id' => $order->id]) }}" method="post">
                            {{ csrf_field() }}
                            <input name="note" type="text" value="{{ $order->note }}" placeholder="заметка">
                            <input class="btn btn-primary" type="submit" value="{{ $order->note ? 'Изменить' : 'Добавить' }}">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @elseif(is_string($orders))
        <p>{{ $orders }}</p>
    @endif
@endsection