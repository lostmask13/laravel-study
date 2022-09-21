<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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


Route::group(['prefix' => '/movies', 'as' => 'movie.'], function () {
    Route::get('', [MovieController::class, 'list'])->name('list');

    Route::get('/create', [MovieController::class, 'addMovie'])->name('create.form');

    Route::get('/{movie}', [MovieController::class, 'show'])->name('show');

    Route::get('/{movie}/edit', [MovieController::class, 'editMovie'])->name('edit.form');

    Route::post('/create', [MovieController::class, 'create'])->name('create');

    Route::post('/{movie}/edit', [MovieController::class, 'edit'])->name('edit');

    Route::post('/{movie}/delete', [MovieController::class, 'delete'])->name('delete');
});
