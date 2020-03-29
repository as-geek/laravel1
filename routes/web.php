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

/**
 * Главная страница
 */
Route::get('/', 'HomeController@index')
    ->name('home');

/**
 * Новости
 */
Route::group([
    'prefix' => '/news',
    'as' => 'news::'
], function () {
    Route::get('/rubrics', 'NewsController@rubrics')
        ->name('rubrics');

    Route::get('/rubrics/{rubricsId}', 'NewsController@listNews')
        ->name('listNews')
        ->where('rubricsId', '[0-9]+');

    Route::get('/card/{id}', 'NewsController@cardNews')
        ->name('cardNews')
        ->where('id', '[0-9]+');
});

/**
 * Меню Админки
 */
Route::get('/admin', 'Admin\HomeController@menu')
    ->name('admin');

/**
 * Админка новостей
 */
Route::group([
    'prefix' => '/admin/news',
    'namespace' => 'Admin',
    'as' => 'admin::news::'
], function(){
    Route::get('/', 'NewsController@index')
        ->name('index');

    Route::match(['get', 'post'],'/create', 'NewsController@create')
        ->name('create');

    Route::match(['get', 'post'],'/update/{id}', 'NewsController@update')
        ->name('update');

    Route::get('/delete/{id}', 'NewsController@delete')
        ->name('delete');
});

/**
 * Админка комментариев
 */
Route::group([
    'prefix' => '/admin/comments',
    'namespace' => 'Admin',
    'as' => 'admin::comments::'
], function(){
    Route::get('/', 'CommentsController@index')
        ->name('index');

    Route::match(['get', 'post'],'/update/{id}', 'CommentsController@update')
        ->name('update');

    Route::get('/delete/{id}', 'CommentsController@delete')
        ->name('delete');
});
/**
 * Авторизация
 */
Route::get('/auth', 'AuthController@index')
    ->name('auth');

/**
 * Добавление комментариев
 */
Route::match(['get', 'post'], '/addComments', 'CommentsController@addComment')
    ->name('comments');
