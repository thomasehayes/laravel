<!DOCTYPE html>
<html lang="en">
<head>
	<meta content=“width=device-width, initial-scale=1” name=“viewport”>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <title>Reddit</title>
</head>

<body>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
	    	<div class="navbar-header">
	    		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	      		</button>
	      		<a class="navbar-brand" href="{{action('HomeController@showWelcome')}}">Home</a>
	    	</div>
	
	    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

	    		<ul class="nav navbar-nav">

	        		<li {!! \Illuminate\Support\Str::endsWith(action('PostsController@index'), Request::path()) ? ' class="active"' : null !!}><a href="{{action('PostsController@index')}}">Posts <span class="sr-only">(current)</span></a></li>

		     <!--    	<li {!! \Illuminate\Support\Str::endsWith(action('StudentsController@index'), Request::path()) ? ' class="active"' : null !!} ><a href="{{action('StudentsController@index')}}">Students</a></li>
 -->
		        	<li class="dropdown">
		        		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account <span class="caret"></span></a>

		          		<ul class="dropdown-menu" role="menu">
		          			@if(\Auth::check())
		            			<li><a href="{{ action('UsersController@index')}}">My Posts</a></li>
		            		@endif
		            		
		            		<li><a href="{{ action('PostsController@create') }}">Create Post</a></li>
							
							@if(\Auth::check())
		            		<li class="divider"></li>
		            			<li><a href="{{ action('UsersController@show', \Auth::id()) }}">Account Info</a></li>
		            		@endif

		        		</ul>

		        	</li>

	      		</ul>


	      		<ul class="nav navbar-nav navbar-right">

	        		
        			@if(!\Auth::check()) 
        				<li><a href="{{ action('Auth\AuthController@getLogin')}}">Login</a></li>
        				<li><a href="{{ action('Auth\AuthController@postRegister')}}">Register</a></li>
        			@else 
        				<li style="padding-top: 15px;"> Welcome {{ Auth::user()->name}}</li>
        				<li><a href="{{ action('Auth\AuthController@getLogout')}}">Logout</a></li>
        			@endif
	        		
	      		</ul>
	    		<div class="navbar-form navbar-right" role="search" id="search">
					
					<form action="{{ action('PostsController@index')}}" method="GET" id="search">

		        		<div class="form-group">
		          			<input type="text" class="form-control" placeholder="Search" name="search" >
		        		<button type="submit" class="btn btn-default">Submit</button>
		        		</div>
		        		
					</form>


	      		</div>

	    	</div>
	  	</div>
	</nav>

	<main class="container">
    	@if(Session::has('successMessage'))
    		<div class="alert alert-success">{{ session('successMessage') }}</div>
    	@endif
    	@if (Session::has('errorMessage'))
    		<div class="alert alert-warning">{{ session('errorMessage') }}</div>
    	@endif
    	@yield('content')
		
	</main>
	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>