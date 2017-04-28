<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class UserTableSeeder extends Seeder
{
	
	public function run()
	{
		$faker = Faker\Factory::create();

    	$limit = 100;

    	for ($i = 0; $i < $limit; $i++) {
    		$user = new \App\User();
        	$user->name = $faker->userName;
        	$user->email = $faker->safeEmail;
        	$user->password = Hash::make($faker->password);
        	$user->save();
    	}
	}
}