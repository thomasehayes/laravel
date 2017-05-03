@extends('layouts.master')

@section('content')

	<div class="container col-sm-12">
		<h1>Account Info</h1>
		<h4>Name: </h4><p>{{ $user->name }}</p>
		<h4>Email: </h4><p>{{ $user->email }}</p>
		<h4>Password:</h4><p>**********</p>
		<h4>Last Updated: </h4><p>{{ $user->updated_at }}</p>
		
		
    	<a href="{{ action('UsersController@edit', [$user->id]) }}" class="col-sm-3 btn btn-primary">Edit Account </a>
    	
    </div>
@stop