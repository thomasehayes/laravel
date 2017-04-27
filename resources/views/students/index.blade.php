@extends('layouts.master')

@section('content')

	<table class="table">
		<tr>
			<th class="col-sm-4">First Name</th>
			<th class="col-sm-4">School Name</th>
			<th class="col-sm-4">Written on</th>
		</tr>
		@foreach($students as $student)
			<tr>
				<td>{{ $student->first_name }}</td>
				<td>{{ $student->school_name }}</td>
				<td>{{ $student->created_at->setTimeZone('America/Chicago')}}</td>
			</tr>
		@endforeach
	</table>

		<form method="get" action="{{ action('StudentsController@create') }}">
			{!! csrf_field()!!}
			<input type="submit" class="btn btn-default" value="Add New Student">
		</form>

	{!! $students->render() !!}
	
@stop
