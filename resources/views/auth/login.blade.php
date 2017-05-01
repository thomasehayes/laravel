<!-- resources/views/auth/login.blade.php -->
@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('Auth\AuthController@postLogin') }}">
    {!! csrf_field() !!}

    <div class="form-group">
        Email
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
        @if ($errors->has('email'))
            {{$errors->first('email')}}
        @endif
    </div>

    <div class="form-group">
        Password
        <input type="password" name="password" id="password" class="form-control">
        @if ($errors->has('password'))
            {{$errors->first('password')}}
        @endif
    </div>

    <div class="form-group">
        <input type="checkbox" name="remember"> Remember Me
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
</form>

@stop