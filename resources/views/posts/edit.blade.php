@extends('layouts.master')

@section('content')

    <h1>Edit Post</h1>
    
	<form method="POST" action="{{ action('PostsController@update', [$post->id] )}}">
        
        @include('partials.posts-form')

		<input type="submit" class="col-sm-3 btn btn-default" value="Update Post">
        {{ method_field('PUT') }}


	</form>
	
	<form method="POST" action="{{ action('PostsController@destroy', [$post->id]) }}">
		{!! csrf_field() !!} 
        <input type="submit" class="col-sm-3 btn btn-danger" value="Delete Post">
        {{ method_field('DELETE') }}
    </form>

@stop