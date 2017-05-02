@extends('layouts.master')

@section('content')
	<div class="container col-sm-12">
		<h1 class="text-center">All Posts</h1>
		<table class="table">
			<tr>
				<th class="col-sm-2"></a>Title:</th>
				<th class="col-sm-2">Content:</th>
				<th class="col-sm-2">URL:</th>
				<th class="col-sm-2"> Written by: </th>
				<th class="col-sm-2"> Written on: </th>
			</tr>
			@foreach($posts as $post) 
				<tr>
					<td><a href="{{action('PostsController@show', $post->id)}}"> {{ $post->title}} </a></td>
					<td> {{ $post->content}}</td>
					<td> {{ $post->url}}</td>
					<td>{{ $post->user->name}}</td>
					<td>{{ $post->created_at->setTimeZone('America/Chicago')}}</td>
				</tr>
			@endforeach
		</table>
		
		@if(\Auth::check())
			<form method="get" action="{{ action('PostsController@create') }}">
				{!! csrf_field()!!}
				<input type="submit" class="btn btn-default" value="Create Posts">
			</form>
		@endif
			{!! $posts->render() !!}
	</div>

@stop