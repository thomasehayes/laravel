@extends('layouts.master')

@section('content')
	<a href="{{ action('HomeController@showWelcome') }}">Home</a>
	<h1> {{ $num1 + $num2 }}</h1>

@stop