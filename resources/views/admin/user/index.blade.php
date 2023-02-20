@extends('layout.admin', ['title' => 'Users'])

@section('content')
    <h1 class="mb-4">Users</h1>

    <table class="table table-bordered">
        <tr>
            <th>№</th>
            <th>Date of registration</th>
            <th>Name, surname</th>
            <th>Email</th>
            <th>Orders</th>
            <th>Edit></th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                <td>{{ $user->name }}</td>
                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                <td>{{ $user->orders->count() }}</td>
                <td>
                    <a href="{{ route('admin.user.edit', ['user' => $user->id]) }}">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $users->links() }}
@endsection

