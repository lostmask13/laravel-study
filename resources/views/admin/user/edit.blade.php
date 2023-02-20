@extends('layout.admin', ['title' => 'User edit'])

@section('content')
    <h1 class="mb-4">User edit</h1>
    <form method="post" action="{{ route('admin.user.update', ['user' => $user->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name, surname"
                   required maxlength="255" value="{{ old('name') ?? $user->name ?? '' }}">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email"
                   required maxlength="255" value="{{ old('email') ?? $user->email ?? '' }}">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="change_password"
                   id="change_password">
            <label class="form-check-label" for="change_password">
            </label>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="password" maxlength="255"
                   placeholder="New password" value="">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="password_confirmation" maxlength="255"
                   placeholder="Confirm password" value="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@endsection
