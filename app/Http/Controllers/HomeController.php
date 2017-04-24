<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function showWelcome()
    {
        return redirect()->action('HomeController@sayHello', array('Hello'));
    }

    public function sayHello($name)
    {
        $data = array('name' => $name);
        return view('my-first-view', $data);
    }

    public function increment($number = 0) {
    	$inc = $number + 1;
		$data = [
			'number' => $number,
			'inc' => $inc
		];
		return view('increment', $data);
    }

    public function uppercase($name = 'hello') {
    	$str = strtoupper($name);
		$data = [
			'str' => $str,
			'name' => $name
		];
		return view('uppercase', $data);
    }

    public function add($num1, $num2) {
    	$add = $num1 + $num2;
    	$data = [
    		'add' => $add,
    		'num1' => $num1,
    		'num2' => $num2
    	];
		return view('add', $data);
    }

    public function rollDice($guess = 0) {
    	$random = mt_rand(1,6);
	
		if ($guess == $random) {
	 		$message = "Good Guess";
		} else if(($guess) > ($random)) {
	 		$message = "Guess Lower";
		}  else {
	 		$message = "Guess Higher";
	 	}
		
		 $data = ['random' => $random, 'guess' => $guess, 'message' => $message];
		 return view('roll-dice', $data);
	}	

}