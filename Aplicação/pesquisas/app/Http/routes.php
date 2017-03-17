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



Route::get('/','ResearchController@index');

Route::get('/home','ResearchController@index');

Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);

Route::get('/nova','ResearchController@nova');

Route::post('/criar','ResearchController@create');

Route::get('/editar/{id}','ResearchController@edit')->where('id','[0-9]+');

Route::post('/update/{id}','ResearchController@update')->where('id','[0-9]+');

Route::get('/remove/{id}','ResearchController@remove')->where('id','[0-9]+');

Route::get('/question/new','QuestionController@nova');

Route::post('/question/criar','QuestionController@create');

Route::get('/question/index','QuestionController@index');

Route::get('/question/edit/{id}','QuestionController@edit')->where('id','[0-9]+');