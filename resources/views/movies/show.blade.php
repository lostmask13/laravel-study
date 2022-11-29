@extends('layout')

@section('title', $movie->title)

@section('content')
    <div class="row g-4 py-5 text-center">
        <div class="col-lg-6 mx-auto">
            <h3 class="fs-1">{{ $movie->title }}, {{ $movie->year }}</h3>
            @foreach($movie->genres as $genre)
                <h3 class="fs-2">{{ $genre->name }}</h3>
            @endforeach
            @foreach($movie->actors as $actor)
                <h4 class="fs-2" >{{ $actor->first_name }} {{ $actor->last_name }}</h4>
            @endforeach
            <p class="lead fs-5 mb-4">{{ $movie->description }}</p>
            <h3 class="fs-4">{{ $movie->user->name }}</h3>

        </div>
    </div>
@endsection
