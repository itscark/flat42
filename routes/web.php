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


Auth::routes();
Route::get('/blog', ['uses' => 'PostController@index', 'as' => 'posts.index']);

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('frontend.index');
    })->name('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', 'NewsController@index')->name('home');
    Route::post('/home', ['uses' => 'NewsController@store', 'as' => 'news.store']);
    Route::get('/shopping', function () {
        return view('backend.shopping.index');
    });
    Route::post('/shopping', 'ItemController@store');
    Route::delete('/shopping/{id}', 'ItemController@destroy');
    Route::put('/shopping/{id}', 'ItemController@update');

    Route::get('/events', ['uses' => 'EventController@index', 'as' => 'event.index']);
    Route::get('/events/create', ['uses' => 'EventController@create', 'as' => 'event.create']);
    Route::post('/events/create', ['uses' => 'EventController@store', 'as' => 'event.store']);
    Route::post('/events/{id}', ['uses' => 'EventController@join', 'as' => 'event.join']);


});


