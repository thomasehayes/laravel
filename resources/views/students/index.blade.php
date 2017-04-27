@extends('layouts.master')

@section('content')

	<table class="table">
		<tr>
			<th>First Name</th>
			<th>School Name</th>
		</tr>
		@foreach($students as $student)
			<tr>
				<td>{{ $student->first_name }}</td>
				<td>{{ $student->school_name }}</td>
			</tr>
		@endforeach
	</table>

		<form method="get" action="{{ action('StudentsController@create') }}">
			{!! csrf_field()!!}
			<input type="submit" class="btn btn-default" value="Add New Student">
		</form>
	{!! $students->render() !!}
	
@stop