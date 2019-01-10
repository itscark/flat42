<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::middleware('auth:api')->group(function () {

    Route::post('/register/create',  ['uses' => 'RegisterWgController@create', 'as' => 'create.wg']);
    Route::post('/register/join',  ['uses' => 'RegisterWgController@join', 'as' => 'join.wg']);

    //Home
    Route::get('/home/{id}', ['uses' => 'NewsCommentsController@show', 'as' => 'statusComment.show']);
    Route::post('/home/{id}', ['uses' => 'NewsCommentsController@store', 'as' => 'statusComment.store']);
    Route::post('/home', ['uses' => 'NewsController@store', 'as' => 'statuses.store']);

    //Items
    Route::resource('items', 'ItemController');

    //Grocery History
    Route::get('/shopping/grocery-history', ['uses' => 'GroceryListController@index', 'as' => 'grocery.index' ]);
    Route::get('/shopping/grocery-history/{id}', ['uses' => 'GroceryListController@show', 'as' => 'grocery.show' ]);

    //Cleaning
    Route::get('/cleaning/details', ['uses' => 'CleaningController@details', 'as' => 'cleaning.details']);
    Route::post('/cleaning', ['uses' => 'CleaningController@store', 'as' => 'cleaning.store']);
    Route::delete('/cleaning/{id}', ['uses' => 'CleaningController@destroy', 'as' => 'cleaning.destroy']);

    //Events
    Route::delete('events/{id}', ['uses' => 'EventController@destroy', 'as' => 'event.destroy']);
    Route::patch('events/{event}', ['uses' => 'EventController@update', 'as' => 'event.update']);
    Route::get('events/show/{id}', ['uses' => 'EventController@showEvent', 'as' => 'event.show']);
    Route::post('events/create', ['uses' => 'EventController@store', 'as' => 'event.store']);
    Route::get('events', ['uses' => 'EventController@history', 'as' => 'event.history']);
    Route::get('events/prev-events', ['uses' => 'EventController@prevEvent', 'as' => 'event.prev']);
    Route::get('events/del-events', ['uses' => 'EventController@delEvent', 'as' => 'event.del']);

    //WG-Info
    Route::get('/wg-info', ['uses' => 'FlatController@index', 'as' => 'flat.index']);
    Route::post('/wg-info/add-member', ['uses' => 'FlatController@create', 'as' => 'flat.create']);






});

