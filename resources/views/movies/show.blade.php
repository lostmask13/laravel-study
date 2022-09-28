@extends('layout')

@section('title', $movie->title)

@section('content')
    <div class="row g-4 py-5 text-center">
        <div class="col-lg-6 mx-auto">
            <h3 class="fs-2">{{ $movie->title }}</h3>
            <h2 class="fs-2">{{ $movie->year }}</h2>
            <p class="lead mb-4">{{ $movie->description }}</p>
        </div>
    </div>
@endsection
