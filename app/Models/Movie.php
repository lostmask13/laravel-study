<?php

namespace App\Models;

use App\Observers\MovieObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'year',
    ];

    protected $dates = [
        'publish_at',
        'update_at',
    ];

    public static function boot(): void
    {
        parent::boot();
        self::observe(MovieObserver::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genres');
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'movie_actors');
    }
}
