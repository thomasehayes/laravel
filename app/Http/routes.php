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
    return view('welcome');
});

Route::get('/uppercase/{name?}', function($name = "Hello")
{	
	$str = strtoupper($name);
	return "Hello, $str!";
});

Route::get('/increment/{number?}', function($number = 0) {
	$inc = $number + 1;
	return $inc;
});

Route::get('/add/{num1}/{num2}', function($num1, $num2) {
	$add = $num1 + $num2;
	return $add;
});