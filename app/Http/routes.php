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

Route::group(['prefix' => 'scoresbyte'], function () {
	Route::get('/', function () {
	    return view('scoresbyte.index');
	});

	Route::get('r/{region}/{country}','ScoresByteController@index');
	Route::get('{region}/{country}/{sport}','ScoresByteController@sport');
	Route::post('search','ScoresByteController@navCountry');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/soon', function(){
    return view('news.soon');
});

Route::post('search','ByteController@navCountry');
Route::get('r/{region}/{country}','ByteController@index');
Route::get('article/{regoin}/{country}/{id}/{lang}','ByteController@article');
	//Route::get('article/{regoin}/{country}/{lang}','ByteController@lang');
Route::get('{region}/{country}/{lang}','ByteController@lang');
Route::get('find/{regoin}/{country}/q/','ByteController@searchNews');

Route::get('preview/{id}', function () {
    return view('news.preview');
});

Route::get('/about',function(){
    return view('about');
});

Route::get('/contact',function(){
    return view('contact');
});

Route::post('/contact','ByteController@contact');
