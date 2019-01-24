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

Route::middleware('admin')->group(function (){
    Route::get('/admin', ['uses' => 'AdminController@index', 'as' => 'admin.index']);
});
Route::middleware('guest')->group(function () {
    Route::get('/', 'WelcomeController@index')->name('home');
    Route::get('/blog', ['uses' => 'PostController@index', 'as' => 'blog']);
});

//Register
Route::get('register/{token?}', 'InviteController@accept')->name('accept');
Route::middleware('auth')->group(function(){
    Route::get('/register/wg/', ['uses' => 'RegisterWgController@wg', 'as' => 'register.wg'])->middleware('hasNoFlat');
    Route::post('/invite/', 'InviteController@process')->name('process');
});

Route::middleware('verified', 'hasFlat', 'user')->group(function () {
    Route::get('/{any}/', function (){
       return view('backend.welcome');
    })->where('any', '.*');
});



