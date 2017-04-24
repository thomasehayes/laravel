@extends('layouts.master')

@section('content')
	<a href="{{ action('HomeController@uppercase') }}">Uppercase</a>
	<h1>{{ $inc }}</h1>
@stop