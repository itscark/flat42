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
//Register
Route::get('register/{token?}', 'InviteController@accept')->name('accept');
Route::middleware('auth')->group(function(){
    Route::get('/wg/register', ['uses' => 'RegisterWgController@wg', 'as' => 'register.wg'])->middleware('hasNoFlat');
    Route::post('/invite/', 'InviteController@process')->name('process');
});

Route::middleware('admin')->group(function (){
    Route::get('/admin', ['uses' => 'AdminController@index', 'as' => 'admin.index']);
    //Admin
    Route::delete('admin/users/{user}', ['uses' => 'AdminController@destroyUser', 'as' => 'user.destroy']);
    Route::delete('admin/flat/{flat}', ['uses' => 'AdminController@destroyFlat', 'as' => 'flat.destroy']);
    Route::patch('admin/user/{user}', ['uses' => 'AdminController@updateUser', 'as' => 'user.update']);
    Route::patch('admin/flat/{flat}', ['uses' => 'AdminController@updateFlat', 'as' => 'flat.update']);
    Route::post('admin/blog' , 'BlogController@store');
    Route::get('admin/welcome' ,'AdminController@contentIndex');
    Route::get('admin/users' , 'AdminController@usersIndex');
    Route::get('admin/flats' , 'AdminController@flatsIndex');
    Route::patch('admin/welcome/{welcome}' , 'AdminController@contentStore');
});
Route::middleware('guest')->group(function () {
    Route::get('/', 'WelcomeController@index')->name('home');
});
Route::middleware('verified', 'hasFlat', 'user')->group(function () {
    Route::get('/{any}/', function (){
       return view('backend.welcome');
    })->where('any', '.*');
});



