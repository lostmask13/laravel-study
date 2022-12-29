<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Movie\CreateRequest;
use App\Http\Requests\Api\Movie\EditRequest;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use App\Services\MovieService;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    public function __construct(private MovieService $movieService)
    {
    }

    public function create(CreateRequest $request): MovieResource
    {
        $data = $request->validated();
        $user = $request->user();
        $movie = $this->movieService->create($data, $user);

        return new MovieResource($movie);
    }

    public function list()
    {
        $movies = Movie::query()->with(['user', 'genres', 'actors'])->latest()->paginate(3);

        return MovieResource::collection($movies);
    }

    public function show(Movie $movie): MovieResource
    {
        return new MovieResource($movie);
    }

    public function edit(Movie $movie, EditRequest $request): MovieResource
    {
        $data = $request->validated();
        $this->movieService->edit($movie, $data);

        return new MovieResource($movie);
    }

    public function delete(Movie $movie): Response
    {
        $this->movieService->delete($movie);

        $data = [
            'message' => 'Successfully deleted!'
        ];

        return response($data, 200);
    }
}
