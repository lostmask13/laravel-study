@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="row mt-8">
        @if($movies->isEmpty())
            <h2>Movies don't found</h2>
        @endif
        @foreach($movies as $movie)

                <article class="mb-1">
                <h3 class="mb-2">{{ $movie->title }}</h3>
                <p class="mb-2 text-muted">{{ $movie->year }}</p>
                <p class="mb-2">
                    @foreach($movie->genres as $genre)
                        <p>{{ $genre->name }}</p>
                    @endforeach
                </p>
            </article>
        @endforeach
        <div class="mov">
            {!! $movies->links() !!}
        </div>
    </div>
    <div class="col-md-6">
        <ul class="list-unstyled">
            <form action="{{ route('main') }}">
                <div class="inp">
                    <input class="form-control my-4" type="text" placeholder="Enter name" name="name"
                           value="{{ request()->get('title') }}">
                </div>

                <div class="inp">
                    <input class="form-control" type="text" placeholder="Enter year of issue" name="year"
                           value="{{ request()->get('year') }}">
                </div>

                <p class="choose">Choose Genre</p>
                @foreach($genres as $genre)
                    <div class="form-check">
                        <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                               @if(in_array($genre->id, request()->get('genres', []))) checked @endif> {{ $genre->name }}
                    </div>
                @endforeach
                <p class="choose">Choose Actor</p>
                @foreach($actors as $actor)
                    <div class="form-check">
                        <input type="checkbox" name="actors[]" value="{{ $actor->id }}"
                               @if(in_array($actor->id, request()->get('actors', []))) checked @endif> {{ $actor->name }} {{ $actor->surname }}
                    </div>

                @endforeach
                <button class="btn btn-primary">Search</button>
            </form>
        </ul>
    </div>
@endsection


