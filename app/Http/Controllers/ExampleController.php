<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExampleController extends Controller
{
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
