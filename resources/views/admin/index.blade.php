@extends('layout.admin')

@section('content')
    <h1>Admin-panel</h1>
    <p>Hi! {{ auth()->user()->name }}</p>
    <p>Admin-panel.</p>
    <form action="{{ route('user.logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Log out</button>
    </form>
@endsection
