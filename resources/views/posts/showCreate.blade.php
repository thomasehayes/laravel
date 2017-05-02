@extends('layouts.master')

@section('content')
	<div class="container col-sm-12"> 
		<h1>{{ $post->title }}</h1>
		<p>{{ $post->content }}</p>
		<p>{{ $post->url }}</p>
		<p>{{ $post->user->name }}</p>
		<p>{{ $post->user->created_at }}</p>
	</div>

@stop