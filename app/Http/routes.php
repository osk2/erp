<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/components', 'ComponentController@index');

Route::get('/models', 'ModelController@index');

Route::get('/models/{codename}', 'ModelController@show');

Route::group(['prefix' => 'api'], function() {
	//Group up URI with prefix 'api', e.g.: api/components/5/moq

	Route::put('components/{cid}/{column}', 'ComponentController@update');

	Route::delete('components/{cid}/', 'ComponentController@destroy');
	
	Route::put('components/{cid}/recovery', 'ComponentController@undestroy');
});