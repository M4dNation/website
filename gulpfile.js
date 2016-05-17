var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix)
{
	// Lib CSS
    mix.styles(
    [
    	'lib/bootstrap.min.css',
    	'lib/utils.min.css',
    ], 'public/css/lib/libraries.css');

    // Lib Javascript
 	mix.scripts(
 	[
 		'lib/jquery.min.js',
 		'lib/bootstrap.min.js'
 	], 'public/js/lib/libraries.js');

    // Homepage CSS
    mix.styles(
    [
    	'lib/jquery.fullPage.css',
        'homepage/homepage.css'
    ], 'public/css/homepage/homepage.css');

 	// Homepage Javascript
	mix.scripts(
 	[
 		'homepage/homepage.js',
        'lib/jquery.fullPage.min.js'
 	], 'public/js/homepage/homepage.js');


 	mix.copy(
   'resources/assets/css/lib/fonts',
   'public/build/fonts'
    );

 	mix.version(
 	[
 		'public/css/lib/libraries.css',
 		'public/js/lib/libraries.js',
 		'public/css/homepage/homepage.css',
 		'public/js/homepage/homepage.js'
 	]);
});
