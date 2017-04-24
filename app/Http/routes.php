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

Route::get('/', 'HomeController@showWelcome');

Route::get('/sayhello/{name}', 'HomeController@sayHello');

Route::get('/uppercase/{name?}', 'HomeController@uppercase');

Route::get('/increment/{number?}', 'HomeController@increment');

Route::get('/add/{num1}/{num2}', 'HomeController@add');

Route::get('/rolldice/{guess?}', 'HomeController@rollDice');





