<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|127.5.173.2//// - wtf is this?
*/

Route::get('/', function()
{
    $url = action('gimage');
    $title = "Image Rating Landing";
    $data = array('title' => $title, 'url' => $url);
	return View::make('hello', $data);
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
// dev_page

Route::get('/dev_notification', [
    'as' => 'dev_page', 'uses' => 'ImageController@devPage'
]);