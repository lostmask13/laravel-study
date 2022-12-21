<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\LoginHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $query = Movie::query()
            ->with(['actors', 'user', 'genres'])
            ->latest();

        if ($request->has('year')) {
            $search = '%' . $request->get('year') . '%';
            $query->where(function ($q) use ($search) {
                $q->where('year', 'like', $search);
            });
        }

        if ($request->has('genres')) {
            $query->whereHas('genres', function ($q) use ($request) {
                $q->whereIn('genres.id', $request->get('genres'));
            });
        }

        if ($request->has('actors')) {
            $query->whereHas('actors', function ($q) use ($request) {
                $q->whereIn('actors.id', $request->get('actors'));
            });
        }

        if ($request->has('title')) {
            $search = '%' . $request->get('title') . '%';
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', $search);
            });
        }

        $movies = $query
            ->paginate(5)->appends($request->query());

        $genres = Genre::all();
        $actors = Actor::all();

        return view('home', compact('movies', 'genres', 'actors'));
    }

    public function about()
    {
        return view('about-us');
    }

    public function LoginHistory(Request $request)
    {
        $logins = LoginHistory::query()->where('user_id', Auth::id())->paginate(5);

        return view('login-history', ['logins' => $logins]);
    }
}
