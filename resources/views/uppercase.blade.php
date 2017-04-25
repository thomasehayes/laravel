@extends('layouts.master')

@section('content')
	<a href="{{ action('HomeController@showWelcome') }}">Home</a>
	<a href="{{ action('HomeController@increment') }}">Increment</a>
	<h1>{{ $str }}</h1>
@stop