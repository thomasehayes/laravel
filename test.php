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