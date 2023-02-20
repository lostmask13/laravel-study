@extends('layout.site', ['title' => 'Show order'])

@section('content')
    <h1>Information obout order   {{ $order->id }}</h1>

    <p>Order status: {{ $statuses[$order->status] }}</p>

    <h3 class="mb-3">Order</h3>
    <table class="table table-bordered">
        <tr>
            <th>№</th>
            <th>Name</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Total
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
            <th colspan="4" class="text-right">Total</th>
            <th>{{ number_format($order->amount, 2, '.', '') }}</th>
        </tr>
    </table>

    <h3 class="mb-3">Information</h3>
    <p>Name, surname: {{ $order->name }}</p>
    <p>Email: <a href="mailto:{{ $order->email }}">{{ $order->email }}</a></p>
    <p>Phone: {{ $order->phone }}</p>
    <p>Address: {{ $order->address }}</p>
    @isset ($order->comment)
        <p>Comments: {{ $order->comment }}</p>
    @endisset
@endsection


