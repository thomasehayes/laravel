@extends('layouts.master')

@section('content')

    <h1>Edit Student's Information</h1>
    
	<form method="POST" action="{{ action('StudentsController@update' )}}">
        
        @include('partials.students-form')

		<input type="submit" class="btn btn-default" value="Update Student's Information">
        {{ method_field('PUT') }}
	</form>

@stop