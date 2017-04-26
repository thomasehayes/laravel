@extends('layouts.master')

@section('content')

    <h1>Create a Student</h1>

	<form method="POST" action="{{ action('StudentsController@store' )}}">

		@include('partials.students-form')
        
		<input type="submit" class="btn btn-default" value="Create Student">
	</form>

@stop