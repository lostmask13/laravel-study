@extends('layout.site', ['title' => 'Profile'])

@section('content')
    <h1>My cabinet</h1>
    <p>Hello, {{ auth()->user()->name }}!</p>
    <p>My cabinet</p>
    <ul>
        <li><a href="{{ route('user.profile.index') }}">Profiles</a></li>
        <li><a href="{{ route('user.order.index') }}">Orders</a></li>
    </ul>
    <form action="{{ route('user.logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Log out</button>
    </form>
@endsection
