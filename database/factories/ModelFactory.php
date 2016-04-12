<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/**
* Factory : Image 
* @return {array}
*/

$factory->define(App\Models\Image::class, function(Faker\Generator $faker)
{
	return 
	[
		'name' 		=> 'fake_image_' . str_random(10),
		'format' 	=> 'image/jpeg',
		'path'		=> '/path/to/image'
	];
});

/**
* Factory : User 
* @return {array}
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) 
{
	return 
	[
		'image_id' 			=> 1,
		'username' 			=> "username",
		'email' 			=> $faker->email,
		'password' 			=> bcrypt(str_random(10)),
		'quote'				=> str_random(255),
		'm4dnation_role' 	=> 1,
		'remember_token' 	=> str_random(10)
	];
});

/**
* Factory : Category 
* @return {array}
*/

$factory->define(App\Models\Category::class, function (Faker\Generator $faker)
{
	return
	[
		'parent_id' 	=> null,
		'name' 			=> str_random(20)
	];
});

/**
* Factory : Thread 
* @return {array}
*/

$factory->define(App\Models\Thread::class, function(Faker\Generator $faker)
{
	return 
	[
		'user_id' => 1,
		'category_id' => 1,
		'last_post_id' => null,
		'state' => 0,
		'title' => str_random(50)
	];
});

/**
* Factory : Post 
* @return {array}
*/

$factory->define(App\Models\Post::class, function(Faker\Generator $faker)
{
	return 
	[
		'user_id' => 1,
		'thread_id' => 1,
		'content' => str_random(255)
	];
});

/**
* Factory : UserPost 
* @return {array}
*/

$factory->define(App\Models\UserPost::class, function(Faker\Generator $faker)
{
	return 
	[
		'user_id' => 1,
		'post_id' => 1
	];
});

/**
* Factory : Article 
* @return {array}
*/

$factory->define(App\Models\Article::class, function (Faker\Generator $faker)
{
	return
	[
		'user_id' 	=> 1,
		'title' 	=> str_random(50),
		'content'	=> str_random(500),
	];
});

/**
* Factory : ArticleImage 
* @return {array}
*/

$factory->define(App\Models\ArticleImage::class, function (Faker\Generator $faker)
{
	return
	[
		'article_id' 	=> 1,
		'image_id' 		=> 1
	];
});

/**
* Factory : Guide 
* @return {array}
*/

$factory->define(App\Models\Guide::class, function(Faker\Generator $faker)
{
	return 
	[
		'user_id' 		=> 1,
		'title' 		=> str_random(50),
		'state'			=> 0,
		'visibility' 	=> 1
	];
});

/**
* Factory : Tutorial 
* @return {array}
*/

$factory->define(App\Models\Tutorial::class, function(Faker\Generator $faker)
{
	return 
	[
		'user_id' 		=> 1,
		'guide_id'		=> 1,
		'title' 	=> str_random(50),
		'content'	=> str_random(500),
		'state'			=> 0,
		'visibility' 	=> 1
	];
});

/**
* Factory : TutorialImage 
* @return {array}
*/

$factory->define(App\Models\TutorialImage::class, function(Faker\Generator $faker)
{
	return 
	[
		'tutorial_id' => 1,
		'image_id' => 1
	];
});
