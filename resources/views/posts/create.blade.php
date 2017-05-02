@extends('layouts.master')

@section('content')

	<h1>Make a Post</h1>

	<form method="POST" action="{{ action('PostsController@store') }}">

		@include('partials.posts-form')

		<input type="submit" class="btn btn-primary" value="Post">
	</form>

@stop
