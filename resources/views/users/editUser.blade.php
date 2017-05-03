@extends('layouts.master')

@section('content')

    <h1>Edit Account Information</h1>
    
	<!-- EDITING/UPDATING POST -->
	<form  method="POST" action="{{ action('UsersController@update', [$user->id]) }}">
		{!! csrf_field() !!}
		<div class="row control-group">
			<div class="form-group col-xs-12 floating-label-form-group controls">
				<label for="name">Name:</label> 
				<input class="form-control" type="text" name="name" value="{{ $user->name }}" placeholder="name">
				@if ($errors->has('name'))
					{{$errors->first('name')}}
				@endif
			</div>
		</div>
		<div class="row control-group">
			<div class="form-group col-xs-12 floating-label-form-group controls">
				<label for="email">email:</label>
				<input class="form-control" type="text" name="email" value="{{ $user->email }}" placeholder="email">
				@if ($errors->has('email'))
					{{$errors->first('email')}}
				@endif
			</div>
		</div>
		<div class="row control-group">
			<div class="form-group col-xs-12 floating-label-form-group controls">
				<label for="content">password:</label>
				<input class="form-control" type="password" name="password" rows="5" cols="40" placeholder="********">
				@if ($errors->has('password'))
					{{$errors->first('password')}}
				@endif
			</div>
		</div>
		{{ method_field('PUT') }}
		<input type="hidden" name="id" value="{{Auth::id()}}">
		<input type="submit" value="Update User" class="btn btn-primary">
	</form>

	<!-- DELETE POST BUTTON-->
	<form  method="POST" action="{{ action('UsersController@destroy', [$user->id]) }}">
		{!! csrf_field() !!}
		<input class="btn btn-danger pull-right" type="submit" value="Delete">
		{{ method_field('DELETE') }}
	</form>
@stop