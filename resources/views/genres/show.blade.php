@extends('layout')

@section('title', 'Genre')

@section('content')
    <div class="row g-4 py-5 text-center">
        <div class="col-lg-6 mx-auto">
            <h3 class="fs-2">Genre's id: {{ $genre->id }}</h3>
            <h3 class="fs-2">Genre's name: {{ $genre->name }}</h3>
        </div>
    </div>

@endsection
