@extends('layout')

@section('title', $genre->name)

@section('content')
    <div class="row">
        <h5>Edit Genre</h5>
        <form action="{{ route('genres.edit', ['genre' => $genre->id]) }}" method="post">
            @csrf
            <div class="form-group my-2">
                <label for="name" class="visually-hidden">{{ __('validation.attributes.name') }}</label>
                <input id="name" type="text" placeholder="Genre Name" name="name" value="{{ $genre->name }}"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary my-2" type="submit">Edit</button>
        </form>
    </div>
@endsection
