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

	<input type="submit" class="btn btn-default" value="Add Student">

@stop