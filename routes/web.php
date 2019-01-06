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
Route::get('/blog', ['uses' => 'PostController@index', 'as' => 'posts.index']);

Route::middleware('guest')->group(function () {
    Route::get('/', 'WelcomeController@index')->name('welcome');
});

Route::get('logout', function (){
    abort(404);
});

Route::middleware('verified')->group(function () {

    Route::get('register/wg', ['uses' => 'RegisterWgController@wg', 'as' => 'register.wg' ]);

    Route::group(['middleware' => 'hasFlat'], function () {


        //Home
        Route::get('/home', 'NewsController@index')->name('home');

        //Shopping
        Route::get('/shopping', function () {
            return view('backend.shopping.index');
        });

        //Shopping
        Route::post('/shopping', 'ItemController@store');
        Route::delete('/shopping/{id}', 'ItemController@destroy');
        Route::put('/shopping/{id}', 'ItemController@update');

        //Cart
        Route::get('cart', ['uses' => 'CartController@index', 'as' => 'cart.index']);
        Route::post('cart', ['uses' => 'CartController@create', 'as' => 'cart.create']);
        Route::post('cart/item/{id}', ['uses' => 'CartController@update', 'as' => 'cart.update']);
        Route::post('cart/{id}', ['uses' => 'CartController@store', 'as' => 'cart.store']);

        //Events
        Route::get('/events', ['uses' => 'EventController@index', 'as' => 'event.index']);
        Route::get('/events/create', ['uses' => 'EventController@create', 'as' => 'event.create']);
        Route::get('/events/{event}/edit', ['uses' => 'EventController@edit', 'as' => 'event.edit']);


        Route::get('/events/{event}', ['uses' => 'EventController@show', 'as' => 'event.show']);

        //Cleaning
        Route::get('/cleaning', ['uses' => 'CleaningController@index', 'as' => 'cleaning.index']);

        Route::get('/cleaning/pdf', ['uses' => 'CleaningController@pdf', 'as' => 'cleaning.pdf']);

    });


});


