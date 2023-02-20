@extends('layout.site', ['title' => 'Orders'])

@section('content')
    <h1>Orders</h1>
    @if($orders->count())
        <table class="table table-bordered">
        <tr>
            <th>№</th>
            <th>Date</th>
            <th>Status</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Details</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                <td>{{ $statuses[$order->status] }}</td>
                <td>{{ $order->name }}</td>
                <td><a href="mailto:{{ $order->email }}">{{ $order->email }}</a></td>
                <td>{{ $order->phone }}</td>
                <td>
                    <a href="{{ route('user.order.show', ['order' => $order->id]) }}">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </table>
        {{ $orders->links() }}
    @else
        <p>Orders don't exist</p>
    @endif
@endsection
