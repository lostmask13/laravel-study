@extends('layout')

@section('title', 'Sign Up')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">Error!</div>
    @endif

    <form action="{{ route('sign-up') }}" method="post">
        @csrf

        <div class="mb-4">
            <label for="name" class="form-label">{{ __('validation.attributes.name') }}</label>
            <input id="name" input type="text" placeholder="Name" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="form-label">{{ __('validation.attributes.email') }}</label>
            <input id="email" input type="email" value="{{ old('email') }}" placeholder="Email" name="email" class="form-control @error('email') is-invalid @enderror">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="form-label">{{ __('validation.attributes.password') }}</label>
            <input id="password" input type="password" placeholder="Password" value="{{ old('password') }}" name="password" class="form-control @error('password') is-invalid @enderror">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="form-label">{{ __('validation.attributes.password_confirmation') }}</label>
            <input type="password" placeholder="Confirm password" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
            @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="checkbox" class="form-check-input @error('checkbox') is-invalid @enderror">
            <label class="form-check-label" for="checkbox">{{ __('validation.attributes.checkbox') }}</label>
            @error('checkbox')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
@endsection
