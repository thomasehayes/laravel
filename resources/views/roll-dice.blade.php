@extends('layouts.master')
@section('content')
	<a href="{{ action('HomeController@showWelcome') }}">Home</a>
    <h1>Guess: <?= $guess; ?> </h1>
    <h1>Random: <?= $random; ?></h1>
    <h1>Answer: <?= $message; ?></h1>
@stop