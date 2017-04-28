<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

/**
* 
*/
class StudentTableSeeder extends Seeder
{
	
	public function run()
	{
		$faker = Faker\Factory::create();
    	$limit = 100;
    	for ($i = 0; $i < $limit; $i++) {
    		$student = new Student();
        	$student->first_name = $faker->name;
        	$student->description = $faker->safeEmail;
        	$student->school_name = $faker->company;
        	$student->save();
    	}
	}
}