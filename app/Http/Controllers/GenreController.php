<?php

namespace App\Http\Controllers;

use App\Http\Requests\Genre\CreateRequest;
use App\Http\Requests\Genre\EditRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function addGenre()
    {
        return view('genres.add');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $genre = new Genre($data);
        $genre->save();

        session()->flash('success', 'Successfully added!');

        return redirect()->route('genres.list', ['genre' => $genre->id]);
    }

    public function edit(Genre $genre, EditRequest $request)
    {
        $data = $request->validated();
        $genre->fill($data);
        $genre->save();

        session()->flash('success', 'Successfully edited!');

        return redirect()->route('genres.list', ['genre' => $genre->id]);
    }

        public function editGenre(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

        public function list(Request $request)
    {
        $genres = Genre::query()->paginate(3);

        return view('genres.list', ['genres' => $genres]);
    }

    public function show(Genre $genre)
    {
        return view('genres.show', compact('genre'));
    }

    public function delete(Genre $genre)
    {
        $genre->delete();

        session()->flash('success', 'Successfully deleted!');

        return redirect()->route('genres.list');
    }
}
