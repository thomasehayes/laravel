@extends('layouts.master')

@section('content')
	<div class="container">
		<h1 class="text-center">All Posts</h1>
		<table class="table">
			<tr>
				<th class="col-sm-4"></a>Title:</th>
				<th class="col-sm-4">Content:</th>
				<th class="col-sm-4">URL:</th>
			</tr>
			@foreach($posts as $post) 
				<tr>
					<td><a href="{{action('PostsController@show', $post->id)}}"> {{ $post->title}} </a></td>
					<td> {{ $post->content}}</td>
					<td> {{ $post->url}}</td>
				</tr>
			@endforeach
		</table>

		<form method="get" action="{{ action('PostsController@create') }}">
			{!! csrf_field()!!}
			<input type="submit" class="btn btn-default" value="Create Posts">
		</form>
		{!! $posts->render() !!}
	</div>

@stop