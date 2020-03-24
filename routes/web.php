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

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')
    ->name('home');

Route::group([
    'prefix' => '/news/rubrics',
    'as' => 'news::'
], function () {
    Route::get('/', 'NewsController@rubrics')
        ->name('rubrics');

    Route::get('/{rubricsId}', 'NewsController@rubricsNews')
        ->name('rubricsNews')
        ->where('rubricsId', '[0-9]+');

    Route::get('/{rubricsId}/{id}', 'NewsController@cardNews')
        ->name('cardNews')
        ->where('id', '[0-9]+');
});

Route::get('/auth', 'AuthController@index')
    ->name('auth');

Route::match(['get', 'post'], '/addComments', 'CommentsController@addComment')
    ->name('comments');
