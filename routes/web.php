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
});


