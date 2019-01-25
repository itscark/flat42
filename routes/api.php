<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    Route::get('/home/events', 'NewsController@show');

    Route::post('/register/create',  ['uses' => 'RegisterWgController@create', 'as' => 'create.wg']);
    Route::post('/register/join',  ['uses' => 'RegisterWgController@join', 'as' => 'join.wg']);

    //Home Comments
    Route::get('/home/{id}', ['uses' => 'NewsCommentsController@show', 'as' => 'statusComment.show']);
    Route::post('/home/{id}', ['uses' => 'NewsCommentsController@store', 'as' => 'statusComment.store']);
    Route::delete('home/comment/{newsComment}', ['uses' => 'NewsCommentsController@destroy', 'as' => 'comment.destroy']);

    //Home
    Route::get('/home', ['uses' => 'NewsController@apiIndex', 'as' => 'statuses.index']);
    Route::post('/home', ['uses' => 'NewsController@store', 'as' => 'statuses.store']);

    //Items
    Route::resource('items', 'ItemController');

    //Cleaning
    Route::get('/cleaning','CleaningController@indexApi');

    Route::get('/cleaning/details', ['uses' => 'CleaningController@details', 'as' => 'cleaning.details']);
    Route::post('/cleaning', ['uses' => 'CleaningController@store', 'as' => 'cleaning.store']);
    Route::delete('/cleaning/{id}', ['uses' => 'CleaningController@destroy', 'as' => 'cleaning.destroy']);

    //Events
    Route::delete('events/{id}', ['uses' => 'EventController@destroy', 'as' => 'event.destroy']);
    Route::patch('events/{event}', ['uses' => 'EventController@update', 'as' => 'event.update']);
    Route::get('events/show/{id}', ['uses' => 'EventController@showEvent', 'as' => 'event.show']);
    Route::post('events/create', ['uses' => 'EventController@store', 'as' => 'event.store']);

    Route::get('events/prev-events', ['uses' => 'EventController@prevEvent', 'as' => 'event.prev']);
    Route::get('events/del-events', ['uses' => 'EventController@delEvent', 'as' => 'event.del']);

    Route::get('events', 'EventController@indexApi');

    //Shopping
    Route::post('/shopping', 'ItemController@store');
    Route::delete('/shopping/{id}', 'ItemController@destroy');
    Route::put('/shopping/{id}', 'ItemController@update');

    //Shopping-Cart
    Route::post('cart', ['uses' => 'CartController@create', 'as' => 'cart.create']);
    Route::get('cart', ['uses' => 'CartController@index', 'as' => 'cart.index']);
    Route::post('cart/{id}', ['uses' => 'CartController@store', 'as' => 'cart.store']);
    Route::post('cart/item/{id}', ['uses' => 'CartController@update', 'as' => 'cart.update']);

    //Grocery History
    Route::get('/shopping/grocery-history', ['uses' => 'GroceryListController@index', 'as' => 'grocery.index' ]);
    Route::get('/shopping/grocery-history/{id}', ['uses' => 'GroceryListController@show', 'as' => 'grocery.show' ]);

    //WG-Info
    Route::get('/wg-info', ['uses' => 'FlatController@index', 'as' => 'flat.index']);
    Route::post('/wg-info/add-member', ['uses' => 'FlatController@create', 'as' => 'flat.create']);





});

