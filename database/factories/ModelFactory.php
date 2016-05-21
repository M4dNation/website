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
		'path'		=> '/path/to/image',
		'created_at' => Carbon\Carbon::now(),
		'updated_at' => Carbon\Carbon::now(),
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
		'remember_token' 	=> str_random(10),
		'created_at' 		=> Carbon\Carbon::now(),
		'updated_at' 		=> Carbon\Carbon::now(),
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
		'created_at' => Carbon\Carbon::now(),
		'updated_at' => Carbon\Carbon::now(),
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
