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

Auth::routes(['verify' => true]);

Route::middleware('guest')->group(function () {
    Route::get('/', 'WelcomeController@index')->name('welcome');
    Route::get('/blog', ['uses' => 'PostController@index', 'as' => 'posts.index']);
});

Route::get('logout', function () {
    abort(404);
});

//Register WG
Route::get('register/wg', ['uses' => 'RegisterWgController@wg', 'as' => 'register.wg'])->middleware('hasNoFlat');
Route::post('invite', 'InviteController@process')->name('process');
Route::get('register/{token?}', 'InviteController@accept')->name('accept');

Route::middleware('verified', 'hasFlat', 'user')->group(function () {

    //Home
    Route::get('/home', 'NewsController@index')->name('home');

    //Shopping
    Route::get('/shopping', function () {
        return view('backend.shopping.index');
    })->name('shopping');

    //Events
    Route::get('/events', ['uses' => 'EventController@index', 'as' => 'event.index']);
    Route::get('/events/create', ['uses' => 'EventController@create', 'as' => 'event.create']);
    Route::get('/events/{event}/edit', ['uses' => 'EventController@edit', 'as' => 'event.edit']);
    Route::get('/events/{event}', ['uses' => 'EventController@show', 'as' => 'event.show']);

    //Cleaning
    Route::get('/cleaning', ['uses' => 'CleaningController@index', 'as' => 'cleaning.index']);
    Route::get('/cleaning/pdf', ['uses' => 'CleaningController@pdf', 'as' => 'cleaning.pdf']);

});

Route::middleware('admin')->group(function (){
    Route::get('/admin', ['uses' => 'AdminController@index', 'as' => 'admin.index']);
});

