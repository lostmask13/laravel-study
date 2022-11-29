@extends('layout')

@section('title', 'Sign In')

@section('content')
    <form action="{{ route('sign-in') }}" method="post">
        @csrf

        <div class="mb-4">
            <label for="email" class="form-label">{{ __('validation.attributes.email') }}</label>
            <input id="email" type="email" value="{{ old('email') }}" placeholder="Email" name="email"
                   class="form-control @error('email') is-invalid @enderror">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="form-label">{{ __('validation.attributes.password') }}</label>
            <input id="password" type="password" value="{{ old('password') }}" placeholder="Password"
                   name="password" class="form-control @error('password') is-invalid @enderror">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
@endsection
