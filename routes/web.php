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

//Route::get('/', function () {
//    return view('allList');
//});

Route::group(['prefix' => 'flights'], function (){
    Route::get('/',['as' => 'app.flights.index', 'uses' => 'flightsController@index']);
    Route::get('/create', ['as' => 'app.flights.create', 'uses' => 'flightsController@create']);
    Route::post('/create', [ 'uses' => 'flightsController@store']);
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/',['as' => 'app.flights.show', 'uses' => 'flightsController@show']);
        Route::get('/edit', ['as' => 'app.flights.edit', 'uses' => 'flightsController@edit']);
        Route::post('/edit', [  'uses' => 'flightsController@update']);
        Route::delete('/delete', ['as' => 'app.flights.destroy', 'uses' => 'flightsController@destroy']);
    });
});


Route::group(['prefix' => 'airlines'], function (){
    Route::get('/',['as' => 'app.airlines.index', 'uses' => 'airlinesController@index']);
    Route::get('/create', ['as' => 'app.airlines.create', 'uses' => 'airlinesController@create']);
    Route::post('/create', [ 'uses' => 'airlinesController@store']);
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/',['as' => 'app.airlines.show', 'uses' => 'airlinesController@show']);
        Route::get('/edit', ['as' => 'app.airlines.edit', 'uses' => 'airlinesController@edit']);
        Route::post('/edit', [  'uses' => 'airlinesController@update']);
        Route::delete('/delete', ['as' => 'app.airlines.destroy', 'uses' => 'airlinesController@destroy']);
    });
});


Route::group(['prefix' => 'airports'], function (){
    Route::get('/',['as' => 'app.airports.index', 'uses' => 'airportsController@index']);
    Route::get('/create', ['as' => 'app.airports.create', 'uses' => 'airportsController@create']);
    Route::post('/create', [ 'uses' => 'airportsController@store']);
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/',['as' => 'app.airports.show', 'uses' => 'airportsController@show']);
        Route::get('/edit', ['as' => 'app.airports.edit', 'uses' => 'airportsController@edit']);
        Route::post('/edit', [  'uses' => 'airportsController@update']);
        Route::delete('/delete', ['as' => 'app.airports.destroy', 'uses' => 'airportsController@destroy']);
    });
});


Route::group(['prefix' => 'contries'], function (){
    Route::get('/',['as' => 'app.contries.index', 'uses' => 'contriesController@index']);
    Route::get('/create', ['as' => 'app.contries.create', 'uses' => 'contriesController@create']);
    Route::post('/create', [ 'uses' => 'contriesController@store']);
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/',['as' => 'app.contries.show', 'uses' => 'contriesController@show']);
        Route::get('/edit', ['as' => 'app.contries.edit', 'uses' => 'contriesController@edit']);
        Route::post('/edit', [  'uses' => 'contriesController@update']);
        Route::delete('/delete', ['as' => 'app.contries.destroy', 'uses' => 'contriesController@destroy']);
    });
});
