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

Route::get('/add/{num1}/{num2}', 'ExampleController@add');

Route::get('/rolldice/{guess?}', 'ExampleController@rollDice');

// // CRUD operation for posts
// Route::get('/posts', 'PostsController@index'); // Show all the posts
// Route::get('/posts/create', 'PostsController@create'); // show the form to create a post
// Route::post('/posts', 'PostsController@store'); // save the new post
// Route::get('/posts/{posts}', 'PostsController@show'); // show a specific post(by id)
// Route::get('/posts/{posts}/edit', 'PostsController@edit'); // show the form to edit a post
// Route::put('/posts/{posts}', 'PostsController@update'); // update the post in the database
// Route::delete('/posts/{posts}', 'PostsController@destroy'); // delete a post

// same as the 7 lines above. This is the shorthand for it. 
Route::resource('posts', 'PostsController'); // A resource controller

Route::resource('students', 'StudentsController');

Route::get('orm-test', function ()
{
	// $user = new \App\User();
 //    $user->name = "Thomas";
 //    $user->email = "thomashayes7889@gmail.com";
 //    $user->password = "password";
 //    $user->save();

 //    $post = new \App\Models\Post();
 //    $post->title = "My first post";
 //    $post->content = "Random content";
 //    $post->url = "http://codeup.com";
 //    $post->created_by = $user->id;
 //    $post->save();

});

// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');


