@extends('layout')

@section('title', 'Contact us')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">Error!</div>
    @endif

    <form action="{{ route('new-contact') }}" method="post">
        @csrf

        <div class="mb-4">
            <label for="name" class="form-label">{{ __('validation.attributes.name') }}</label>
            <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="form-label">{{ __('validation.attributes.email') }}</label>
            <input type="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror" aria-describedby="emailHelp" name="email">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="phone" class="form-label">{{ __('validation.attributes.phone') }}</label>
            <input type="text" value="{{ old('phone') }}" class="form-control  @error('phone') is-invalid @enderror" name="phone">
            @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
