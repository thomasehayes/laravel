@extends('layouts.master')

@section('content')

	<h1>Make a Post</h1>

	<form method="POST" action="{{ action('PostsController@store') }}">

		@include('partials.posts-form')

		<input type="submit" class="btn btn-default" value="Post">
	</form>
	<form method="GET" action="{{ action('PostsController@index') }}">
		<input type="submit" class="btn btn-default" value="Home">
	</form>

@stop
