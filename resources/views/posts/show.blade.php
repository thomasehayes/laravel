@extends('layouts.master')

@section('content')

	<h1>{{ $post->title }}</h1>
	<p>{{ $post->content }}</p>
	<p>{{ $post->url }}</p>
	@if (\Auth::id() === $post->created_by)
		<form method="POST" action="{{ action('PostsController@destroy', [$post->id]) }}">
			{!! csrf_field() !!} 
    		<input type="submit" class="col-sm-3 btn btn-danger" value="Delete Post">
    		{{ method_field('DELETE') }}
    	</form>
	@endif

@stop