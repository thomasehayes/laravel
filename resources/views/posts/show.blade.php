@extends('layouts.master')

@section('content')
	<div class="container col-sm-12"> 
		<h1>{{ $post->title }}</h1>
		<p>{{ $post->content }}</p>
		<p>{{ $post->url }}</p>
		<p>{{ $post->user->name }}</p>
		<p>{{ $post->user->created_at }}</p>
	</div>

	@if (\Auth::id() == $post->created_by)
		
		<a class="col-sm-3  btn btn-primary" href="{{action('PostsController@edit', [$post->id])}}">Edit</a>
    	
	@endif

	<div class="col-sm-6"></div> 

	@if (\Auth::id() == $post->created_by)
		<form method="POST" action="{{ action('PostsController@destroy', [$post->id]) }}">
			{!! csrf_field() !!} 
    		<input type="submit" class="col-sm-3 btn btn-danger" value="Delete Post">
    		{{ method_field('DELETE') }}
    	</form>

	@endif


@stop