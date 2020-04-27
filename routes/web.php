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

    Route::get('/partner', 'PartnerNewsController@partnerRubrics')
        ->name('partnerRubrics');

    Route::get('/partner/list', 'PartnerNewsController@listPartnerNews')
        ->name('listPartnerNews');

    Route::get('/parsing/{rubrics}', 'PartnerNewsController@parsing')
        ->name('parsing');
});

/**
 * Профиль пользователя
 */
Route::group([
    'prefix' => '/profile',
    'as' => 'profile::',
    'middleware' => ['auth']
], function () {
    Route::get('/', 'ProfileController@index')
        ->name('index');

    Route::get('/update', 'ProfileController@update')
        ->name('update');

    Route::post('/saveUpdate', 'ProfileController@saveUpdate')
        ->name('saveUpdate')
        ->middleware('hashPassword.check')
        ->middleware('profilePassword.validate');
});

/**
 * Меню Админки
 */
Route::get('/admin', 'Admin\HomeController@menu')
    ->name('admin')
    ->middleware('auth')
    ->middleware('isAdmin.check');

/**
 * Админка
 */
Route::group([
    'prefix' => '/admin',
    'namespace' => 'Admin',
    'as' => 'admin::',
    'middleware' => ['auth', 'isAdmin.check']
], function() {
    Route::group([
        'prefix' => '/news',
        'as' => 'news::',
    ], function () {
        Route::get('/', 'NewsController@index')
            ->name('index');

        Route::get('/create', 'NewsController@create')
            ->name('create');

        Route::post('/saveCreate', 'NewsController@saveCreate')
            ->name('saveCreate')
            ->middleware('news.validate');

        Route::get('/update/{id}', 'NewsController@update')
            ->name('update');

        Route::post('/saveUpdate/{id}', 'NewsController@saveUpdate')
            ->name('saveUpdate')
            ->middleware('news.validate');

        Route::get('/delete/{id}', 'NewsController@delete')
            ->name('delete');
    });
    Route::group([
        'prefix' => '/comments',
        'as' => 'comments::',
    ], function () {
        Route::get('/', 'CommentsController@index')
            ->name('index');

        Route::get('/update/{id}', 'CommentsController@update')
            ->name('update');

        Route::post('/saveUpdate/{id}', 'CommentsController@saveUpdate')
            ->name('saveUpdate')
            ->middleware('comments.validate');

        Route::get('/delete/{id}', 'CommentsController@delete')
            ->name('delete');
    });
    Route::group([
        'prefix' => '/profile',
        'as' => 'profile::',
    ], function () {
        Route::get('/', 'ProfileController@index')
            ->name('index');

        Route::get('/update/{id}', 'ProfileController@update')
            ->name('update');

        Route::post('/saveUpdate/{id}', 'ProfileController@saveUpdate')
            ->name('saveUpdate');
    });
    Route::group([
        'prefix' => '/partner',
        'as' => 'partner::',
    ], function () {
        Route::get('/', 'PartnerNewsController@index')
            ->name('index');

        Route::get('/create', 'PartnerNewsController@create')
            ->name('create');

        Route::post('/saveCreate', 'PartnerNewsController@saveCreate')
            ->name('saveCreate');

        Route::get('/update/{id}', 'PartnerNewsController@update')
            ->name('update');

        Route::post('/saveUpdate/{id}', 'PartnerNewsController@saveUpdate')
            ->name('saveUpdate');

        Route::get('/delete/{id}', 'PartnerNewsController@delete')
            ->name('delete');
    });
});

/**
 * Добавление комментариев
 */
Route::post('/addComments', 'CommentsController@addComment')
    ->name('comments')
    ->middleware('comments.validate');

Auth::routes();

//Соцсети
Route::group([
    'prefix' => 'social',
    'namespace' => 'Auth',
    'as' => 'social::',
], function () {
    Route::get('/login', 'SocialController@loginVk')
        ->name('login-vk');
    Route::get('/response', 'SocialController@responseVk')
        ->name('response-vk');
});

