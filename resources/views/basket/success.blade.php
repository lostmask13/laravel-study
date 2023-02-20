@extends('layout.site', ['title' => 'Order is placed'])

@section('content')
    <h1>Order is place</h1>

    <p>Order is placed</p>

    <h2>Order</h2>
    <table class="table table-bordered">
        <tr>
            <th>№</th>
            <th>Name</th>
            <th>Price</th>
            <th>Amount/th>
            <th>Price</th>
        </tr>
        @foreach($order->items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ number_format($item->price, 2, '.', '') }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ number_format($item->cost, 2, '.', '') }}</td>
        </tr>
        @endforeach
        <tr>
            <th colspan="4" class="text-right">Итого</th>
            <th>{{ number_format($order->amount, 2, '.', '') }}</th>
        </tr>
    </table>

    <h2>Profile information</h2>
    <p>Name, surname: {{ $order->name }}</p>
    <p>Email: <a href="mailto:{{ $order->email }}">{{ $order->email }}</a></p>
    <p>Phone: {{ $order->phone }}</p>
    <p>Address: {{ $order->address }}</p>
    @isset ($order->comment)
        <p>Comments: {{ $order->comment }}</p>
    @endisset
@endsection
