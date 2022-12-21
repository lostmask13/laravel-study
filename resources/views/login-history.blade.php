@extends('layout')

@section('title-block', 'Login history List')

@section('content')
<div class="container">
    <h1>Login history</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">User ID</th>
            <th scope="col">User Ip</th>
            <th scope="col">Login time</th>
        </tr>
        </thead>
        <tbody>
        @foreach($logins as $login)
        <tr>
            <th scope="col">{{ $login->user_id }}</th>
            <th scope="col">{{ $login->ip }}</th>
            <th scope="col">{{ $login->created_at }}</th>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
