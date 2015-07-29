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

Route::get('/components/deleted', 'ComponentController@deleted');

Route::get('/models', 'ModelController@index');

Route::get('/models/{codename}', 'ModelController@show');

Route::group(['prefix' => 'api'], function() {
	/** 
	 *	Group up URI with prefix 'api', e.g.: api/components/5/moq
	 *	
	 *	for more detailed info of controller, visit http://maxoffsky.com/code-blog/laravel-first-framework-chapter-5-understanding-controllers/
	 */

	// Resource controllers
	Route::put('components/{cid}/{column}', 'ComponentController@update')
			->where('cid', '/[0-9]+/g');

	Route::put('components/recovery/{cid}', 'ComponentController@undestroy');

	Route::delete('components/{cid}/', 'ComponentController@destroy');

	Route::get('components/{cid}', 'ComponentController@show');

});