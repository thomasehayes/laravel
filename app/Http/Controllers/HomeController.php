<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function showWelcome()
    {
        return redirect()->action('HomeController@sayHello', array('Hello World'));
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

    

}