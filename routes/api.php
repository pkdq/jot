<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->group(function() {

    Route::get('/contacts', 'ContactsController@index');
    Route::post('/contacts', 'ContactsController@store');
    Route::get('/contacts/{contact}', 'ContactsController@show');
    Route::patch('/contacts/{contact}', 'ContactsController@update');
    Route::delete('/contacts/{contact}', 'ContactsController@destory');

    Route::get('/birthdays', 'BirthdaysController@index');

    Route::post('/search', 'SearchController@index');

});
