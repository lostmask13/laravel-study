<?php

namespace App\Observers;

use App\Mail\ChangedMovieDate;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MovieObserver
{
    public function updated(Movie $movie)
    {
        $isYearChanged = $movie->year !== $movie->getOriginal('year');

        if ($isYearChanged) {
            $users = User::all()->except($movie->user_id);
            foreach ($users as $user) {
                Mail::to($user->email)->send(new ChangedMovieDate($movie));
            }
        }
    }
}
