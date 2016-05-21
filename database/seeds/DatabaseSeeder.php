<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Models\Image::class, 1)->create()->each(function($u) 
    	{
    		$u->save();
    	});

    	factory(App\Models\User::class, 1)->create()->each(function($u) 
    	{
    		$u->save();
    	});

    	factory(App\Models\Article::class, 2)->create()->each(function($u) 
    	{
        	$u->save();
    	});
    }
}
