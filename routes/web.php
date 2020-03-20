<?php

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

Route::get('/', 'HomeController@index')
    ->name('home');

Route::group([
    'prefix' => '/news/rubrics',
    'as' => 'news::'
], function () {
    Route::get('/', 'NewsController@rubrics')
        ->name('rubrics');

    Route::get('/{name}', 'NewsController@rubricsNews')
        ->name('rubricsNews')
        ->where('name', '[A-Za-z]+');

    Route::get('/{name}/{title}', 'NewsController@cardNews')
        ->name('cardNews')
        ->where('name', '[A-Za-z]+');
});

Route::get('/auth', 'AuthController@index')
    ->name('auth');
