<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\SignUpController;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ActorController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/sign-up', [SignUpController::class, 'signUp']);

Route::post('/sign-in', [AuthController::class, 'signIn']);

Route::group(['prefix' => '/movies', 'middleware' => ['auth:api']], function () {

    Route::get('', [MovieController::class, 'list']);

    Route::post('/create', [MovieController::class, 'create'])->middleware('can:create,' . Movie::class);

    Route::group(['prefix' => '/{movie}'], function () {

        Route::get('', [MovieController::class, 'show']);

        Route::put('/edit', [MovieController::class, 'edit'])->middleware('can:edit,movie');

        Route::delete('/delete', [MovieController::class, 'delete'])->middleware('can:delete,movie');
    });
});

Route::get('/genres', [GenreController::class, 'list'])->middleware('auth:api');

Route::get('/actors', [ActorController::class, 'list'])->middleware('auth:api');
