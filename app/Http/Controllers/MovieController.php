<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movie\CreateRequest;
use App\Http\Requests\Movie\EditRequest;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use App\Services\MovieService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function __construct(private MovieService $movieService)
    {
    }

    public function addMovie()
    {
        $genres = Genre::all();
        $actors = Actor::all();
        return view('movies.add', compact('genres', 'actors'));
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $user = $request->user();
        $movie = $this->movieService->create($data, $user);

        session()->flash('success', 'Success!');

        return redirect()->route('movie.show', ['movie' => $movie->id]);
    }

    public function edit(Movie $movie, EditRequest $request)
    {
        $data = $request->validated();
        $movie = $this->movieService->edit($movie, $data);
        session()->flash('success', 'Success!');

        return redirect()->route('movie.show', ['movie' => $movie->id]);
    }

    public function editMovie(Movie $movie)
    {
        $genres = Genre::all();
        $actors = Actor::all();
        return view('movies.edit', compact('movie', 'genres', 'actors'));
    }

    public function list(Request $request)
    {
        $movies = Movie::query()->paginate(3);

        return view('movies.list', compact('movies'));
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function delete(Movie $movie)
    {
        $movie->delete();

        session()->flash('success', 'Movie deleted!');

        return redirect()->route('movie.list');
    }
}
