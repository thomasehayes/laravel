# May 1st notes
Accessors/Mutators are functions on models that run automatically for certain conditions

Get created_at timestamp from the DB and make sure to always output it in a format with the full name of the day

created_at YYYY-MM-DD:H:i:s

created_at data -> function -> output Wednesday, June 5th

Accessor is a function on a model that accesses data from that model's table and transforms it. This function is called automatically.

Mutator is a function on a model that fires a function automatically on a given property of the object in order to save a transformed version to the db table. 

Hash::make("my-crummy-password");

Accessors run (automatically) on data after we  access it frmo the DB
Mutators run (automatically) on data before we insert/update it into the DB

------

public function getCreatedAtAttribute($value)
{
    $utc = \Carbon\Carbon::createFromFormat($this->getDateFormat(), $value);
    return $utc->setTimezone('America/Chicago');
}

How to build relationships

Step 1: Stop and think and talk about the things you're relating

1:1
username/password

1:Many
One User has many Posts
Each post belongs to one and only one user
(the table that is the many is the one that has the foreign key)

Many to Many
A single blog Post has many Tags
A single Tag has many blog posts
(the table that has foreign keys to both tags and posts is a new table called post_tag)

Step 2:
Add necessary foreign keys and then specify them as such in migrations

Step 3:
Go to the models and add relationship functions

// on User.php
public function posts() 
{
	return $this->hasMany('App\Models\Post', 'created_by');
}

//on Post.php
public function user()
{
	return $this->belongsTo('App\User', 'created_by'); 
}

Punchline:

$post->user gets you the user object of that post

$user->posts gets you a collection of the posts from that particular user

# April 28th notes 
# Laravel Review

## Concepts

## Best Practices

## Vocabulary Terms
	MVC - model, view, controller
		- .NET, ruby on rails, django on python, iOS, etc...

	Routes - defines the ways into your application, listens for specified request types (get/post) and the URLs those requests went to. When we hit a route, we fire a function.
	
	Controllers - logic for handling requests and providing responses

	Views - html/php necessary to output the content and present UI

	Artisan - command line tools for your Laravel app
	Composer - dependency management tool (used to install laravel and other PHP libraries)
	
	Migrations - systematically create/modify/delete tables and table columns... allows us to version control our db structure

	Eloquent - Laravel's ORM (Object Relational Mapper)
		- pseudo language(tiny-language) for SQL commands
		- User::all() vs. select * from user;
		- User::find(1) vs select * from user where id = 1;
<?php

// 1. Organize code, similar type of classes
// all models in \App\Models
// all controller \App\HTTP\Controllers
//
// 2. Avoid name collisions
// Classes with the same name -> Laravel's Event Class
// Fully-Qualified Names -> FQN

// File System -> root folder -> /

// root namespace has '\' hence -> \Session

// root namespace declaration is optional
namespace MeetupClone{  // root namespace
	
	class Event {
	

	}
}

namespace GithubApiClient {
	class Event {

	}
}

use MeetupClone\Event as MeetupEvent;
use GithubApiClient\Event as githubEvent;

$meetup = new MeetupEvent();
$github = new githubEvent;


$event = new \MeetupClone\Event(); // FQN
$githubEvent = new \GithubApiClient\Event(); // FQN