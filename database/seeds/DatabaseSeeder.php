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

    	factory(App\Models\Category::class, 3)->create()->each(function($u) 
    	{
        	$u->save();
    	});

    	factory(App\Models\Thread::class, 3)->create()->each(function($u) 
    	{
        	$u->save();
    	});

    	factory(App\Models\Post::class, 10)->create()->each(function($u) 
    	{
        	$u->save();
    	});

    	factory(App\Models\Guide::class, 1)->create()->each(function($u) 
    	{
        	$u->save();
    	});

    	factory(App\Models\Tutorial::class, 4)->create()->each(function($u) 
    	{
        	$u->save();
    	});
    }
}
