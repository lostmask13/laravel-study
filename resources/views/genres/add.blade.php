@extends('layout')

@section('title', 'Add a Genre')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">Error!</div>
    @endif

    <div class="row">
        <h5>Add a Genre</h5>
        <form action="{{ route('genres.create') }}" method="post">
            @csrf

            <div class="mb-4">
                <label for="name" class="form-label">{{ __('validation.attributes.name') }}</label>
                <input id="name" type="text" placeholder="Genre's name" name="name" value="{{ old('name') }}"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary my-2" type="submit">Add</button>
        </form>
    </div>
@endsection
