<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    $url = action('gimage');
	return View::make('hello')->with('url', $url);
});

Route::get('/done', [
    'as' => 'done', 'uses' => 'ImageController@done'
]);

Route::get('/image', [
    'as' => 'gimage', 'uses' => 'ImageController@showImage'
]);

Route::post('/image', [
    'as' => 'pimage', 'uses' => 'ImageController@processImage'
]);