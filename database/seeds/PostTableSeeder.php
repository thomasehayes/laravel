<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

/**
* 
*/
class PostTableSeeder extends Seeder
{
	
	public function run()
	{
		$faker = Faker\Factory::create();

    	$limit = 100;

    	for ($i = 0; $i < $limit; $i++) {
    		$post = new Post();
        	$post->title = $faker->catchPhrase;
        	$post->content = $faker->text($maxNbChars = 200);
        	$post->url = $faker->url;
        	$post->created_by = \App\User::all()->random()->id;
        	$post->save();
    	}
	}
}