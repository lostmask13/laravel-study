<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SignUpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/about-us', [MainController::class, 'about'])->name('about');
Route::get('/contact-us', [ContactController::class, 'show'])->name('contact');
Route::post('/contact-us', [ContactController::class, 'store'])->name('new-contact');


Route::group(['prefix' => '/movies', 'as' => 'movie.', 'middleware' => 'auth', 'user-verify'], function () {
    Route::get('', [MovieController::class, 'list'])->name('list');
    Route::get('/create', [MovieController::class, 'addMovie'])->name('create.form')
        ->middleware('can:create,' . Movie::class);
    Route::get('/{movie}', [MovieController::class, 'show'])->name('show');
    Route::post('/create', [MovieController::class, 'create'])->name('create')
        ->middleware('can:create,' . Movie::class);
    Route::group(['prefix' => '/{movie}/edit', 'middleware' => 'can:edit,movie'], function () {
        Route::get('', [MovieController::class, 'editMovie'])
            ->name('edit.form');
        Route::post('', [MovieController::class, 'edit'])
            ->name('edit');
    });
    Route::post('/{movie}/delete', [MovieController::class, 'delete'])
        ->name('delete');
});


Route::get('/sign-up', [SignUpController::class, 'signUpForm'])->name('sign-up.form');
Route::post('/sign-up', [SignUpController::class, 'signUp'])->name('sign-up');
Route::get('/verify-email/{id}/{hash}', [SignUpController::class, 'verifyEmail'])->name('verify-email');

Route::get('/sign-in', [AuthController::class, 'signInForm'])
    ->name('login');
Route::post('/sign-in', [AuthController::class, 'signIn'])
    ->name('sign-in');
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/login-history', [MainController::class, 'LoginHistory'])
    ->name('login-history');

Route::group(['prefix' => '/actors', 'as' => 'actors.', 'middleware' => 'auth'], function () {
    Route::get('/create', [ActorController::class, 'addActor'])
        ->name('create.actor')
        ->middleware('can:create,' . Actor::class);;

    Route::post('/create', [ActorController::class, 'create'])
        ->name('create')
        ->middleware('can:create,' . Actor::class);;

    Route::get('', [ActorController::class, 'list'])
        ->name('list');

    Route::group(['prefix' => '/{actor}/edit', 'middleware' => 'can:edit,actor'], function () {
        Route::get('', [ActorController::class, 'editActor'])
            ->name('edit.actor');
        Route::post('', [ActorController::class, 'edit'])
            ->name('edit');
    });

    Route::get('/{actor}', [ActorController::class, 'show'])
        ->name('show');

    Route::post('/{actor}/delete', [ActorController::class, 'delete'])
        ->name('delete');
});

Route::group(['prefix' => '/genres', 'as' => 'genres.', 'middleware' => 'auth'], function () {
    Route::get('/create', [GenreController::class, 'addGenre'])
        ->name('create.genre')
        ->middleware('can:create,' . Genre::class);

    Route::post('/create', [GenreController::class, 'create'])
        ->name('create')
        ->middleware('can:create,' . Genre::class);

    Route::get('', [GenreController::class, 'list'])
        ->name('list');

    Route::group(['prefix' => '/{genre}/edit', 'middleware' => 'can:edit,genre'], function () {
        Route::get('', [GenreController::class, 'editGenre'])
            ->name('edit.genre');
        Route::post('', [GenreController::class, 'edit'])
            ->name('edit');
    });

    Route::get('/{genre}', [GenreController::class, 'show'])
        ->name('show');

    Route::post('/{genre}/delete', [GenreController::class, 'delete'])
        ->name('delete');
});

