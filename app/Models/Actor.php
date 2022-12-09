<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'patronymic',
        'date_of_birth',
        'growth',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
