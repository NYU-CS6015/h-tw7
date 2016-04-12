<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function () {
    Route::auth();
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/', 'TimelineController@index');

    Route::get('/posts', 'PostController@index');
    Route::post('/posts', 'PostController@create');

    Route::get('/users/{user}', 'UserController@index')->name('user.index');
    Route::get('/users/{user}/follow', 'UserController@follow')->name('user.follow');
    Route::get('/users/{user}/unfollow', 'UserController@unfollow')->name('user.unfollow');

});
