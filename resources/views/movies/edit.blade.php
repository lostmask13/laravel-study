@extends('layout')

@section('title', $movie->title)

@section('content')
    <div class="row">
        <h5>Edit Movie</h5>
        <form action="{{ route('movie.edit', ['movie' => $movie->id]) }}" method="post">
            @csrf
            <div class="form-group my-2">
                <label for="title" class="form-label">{{ __('validation.attributes.title') }}</label>
                <input id="title" type="text" placeholder="Title" name="title" value="{{ old('title', $movie->title) }}"
                       class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="year" class="form-label">{{ __('validation.attributes.year') }}</label>
                <input id="year" type="text" placeholder="Release Year" name="year"
                       value="{{ old('year', $movie->year) }}"
                       class="form-control @error('year') is-invalid @enderror">
                @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="description" class="form-label">{{ __('validation.attributes.description') }}</label>
                <textarea id="description" placeholder="Description" name="description"
                          value="{{ old('description', $movie->description) }}"
                          class="form-control @error('description') is-invalid @enderror">{{ $movie->description }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group my-2">
                <label for="">{{ __('validation.attributes.genres') }}</label>
                @foreach($genres as $genre)
                    <div class="form-check">
                        <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                               class="form-check-input @error('genres') is-invalid @enderror"
                               @if($movie->genres->contains('id', $genre->id)) checked @endif> {{ $genre->name }}
                    </div>
                @endforeach
            </div>

            <div class="form-group my-2">
                <label for="">{{ __('validation.attributes.actors') }}</label>
                @foreach($actors as $actor)
                    <div class="form-check">
                        <input type="checkbox" name="actors[]" value="{{ $actor->id }}"
                               class="form-check-input @error('actors') is-invalid @enderror"
                               @if($movie->actors->contains('id', $actor->id)) checked @endif> {{ $actor->first_name }} {{ $actor->last_name }}
                    </div>
                @endforeach
            </div>


            <button class="btn btn-primary my-2" type="submit">Edit</button>
        </form>
    </div>
@endsection
