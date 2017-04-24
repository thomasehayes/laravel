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

Route::get('/sayhello/{name?}', function($name) {
	$data = array('name' => $name);
	return view('my-first-view', $data);
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

Route::get('/rolldice/{guess?}', function($guess = 0) {
	 $random = mt_rand(1,6);
	
	 if ($guess == $random) {
 		$message = "Good Guess";
	} else if(($guess) > ($random)) {
 		$message = "Guess Lower";
	}  else {
 		$message = "Guess Higher";
 	}
	
	 $data = ['random' => $random, 'guess' => $guess, 'message' => $message];
	 return view('roll-dice', $data);
});





