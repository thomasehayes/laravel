@extends('layouts.master')

@section('content')
<div class="container">
	<h1 class="text-center">Start <a href="{{ action('PostsController@create') }}">Post </a>here!</h1>
</div>
<div id="video-wrap">
    <iframe width="100%" height="500px" src="https://www.youtube.com/embed/jG7dSXcfVqE?autoplay=1&controls=0&showinfo=0" frameborder="0" allowfullscreen></iframe>                   
</div>
@stop
