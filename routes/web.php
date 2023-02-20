<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController')->name('index');

Route::group([
    'as' => 'catalog.',
    'prefix' => 'catalog',
], function () {

    Route::get('index', 'CatalogController@index')
        ->name('index');

    Route::get('brand/{brand:slug}', 'CatalogController@brand')
        ->name('brand');

    Route::get('product/{product:slug}', 'CatalogController@product')
        ->name('product');

    Route::get('search', 'CatalogController@search')
        ->name('search');
    Route::get('contact', 'CatalogController@contact')
        ->name('contact');
});

Route::group([
    'as' => 'basket.',
    'prefix' => 'basket',
], function () {

    Route::get('index', 'BasketController@index')
        ->name('index');

    Route::get('checkout', 'BasketController@checkout')
        ->name('checkout');

    Route::post('profile', 'BasketController@profile')
        ->name('profile');

    Route::post('saveorder', 'BasketController@saveOrder')
        ->name('saveorder');

    Route::get('success', 'BasketController@success')
        ->name('success');

    Route::post('add/{id}', 'BasketController@add')
        ->where('id', '[0-9]+')
        ->name('add');

    Route::post('plus/{id}', 'BasketController@plus')
        ->where('id', '[0-9]+')
        ->name('plus');

    Route::post('minus/{id}', 'BasketController@minus')
        ->where('id', '[0-9]+')
        ->name('minus');

    Route::post('remove/{id}', 'BasketController@remove')
        ->where('id', '[0-9]+')
        ->name('remove');

    Route::post('clear', 'BasketController@clear')
        ->name('clear');
});

Route::name('user.')->prefix('user')->group(function () {
    Auth::routes();
});

Auth::routes(['verify' => true]);


Route::group([
    'as' => 'user.',
    'prefix' => 'user',
    'middleware' => ['auth']
], function () {

    Route::get('index', 'UserController@index')->name('index');
    Route::resource('profile', 'ProfileController');
    Route::get('order', 'OrderController@index')->name('order.index');
    Route::get('order/{order}', 'OrderController@show')->name('order.show');
});

Route::group([
    'as' => 'auth.',
    'prefix' => 'auth',
], function () {
    Route::get('register', 'Auth\RegisterController@register')
        ->name('register');
    Route::post('register', 'Auth\RegisterController@create')
        ->name('create');
    Route::get('login', 'Auth\LoginController@login')
        ->name('login');
    Route::post('login', 'Auth\LoginController@authenticate')
        ->name('auth');

    Route::get('logout', 'Auth\LoginController@logout')
        ->name('logout');

    Route::get('forgot-password', 'Auth\ForgotPasswordController@form')
        ->name('forgot-form');
    // письмо на почту
    Route::post('forgot-password', 'Auth\ForgotPasswordController@mail')
        ->name('forgot-mail');

    Route::get(
        'reset-password/token/{token}/email/{email}',
        'Auth\ResetPasswordController@form'
    )->name('reset-form');

    Route::post('reset-password', 'Auth\ResetPasswordController@reset')
        ->name('reset-password');

    Route::get('verify-message', 'Auth\VerifyEmailController@message')
        ->name('verify-message');

    Route::get('verify-email/token/{token}/id/{id}', 'Auth\VerifyEmailController@verify')
        ->where('token', '[a-f0-9]{32}')
        ->where('id', '[0-9]+')
        ->name('verify-email');
});

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'admin']
], function () {

    Route::get('index', 'IndexController')->name('index');
    Route::resource('brand', 'BrandController');
    Route::resource('product', 'ProductController');
    Route::resource('order', 'OrderController', ['except' => [
        'create', 'store', 'destroy'
    ]]);
    Route::resource('user', 'UserController', ['except' => [
        'create', 'store', 'show', 'destroy'
    ]]);

});
