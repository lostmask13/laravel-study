@extends('layout')

@section('title', 'Add Movie into library')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">Error!</div>
    @endif

    <div class="row">
        <h3>Add Movie into library</h3>
        <form action="{{ route('movie.create') }}" method="post">
            @csrf

            <div class="mb-4">
                <label for="title" class="form-label">{{ __('validation.attributes.title') }}</label>
                <input id="title" type="text" placeholder="Title" name="title" value="{{ old('title') }}"
                       class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="year" class="form-label">{{ __('validation.attributes.year') }}</label>
                <input id="year" type="text" placeholder="Year" name="year" value="{{ old('year') }}"
                       class="form-control @error('year') is-invalid @enderror">
                @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="form-label">{{ __('validation.attributes.description') }}</label>
                <textarea id="description" placeholder="Description" name="description"
                          class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection
