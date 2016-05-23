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
        'lib/font-awesome.min.css'
    ], 'public/css/lib/libraries.css');

    // Auth CSS
    mix.styles(
    [
        'auth/login.css',
    ], 'public/css/auth/auth.css');

    // Homepage CSS
    mix.styles(
    [
        'homepage/homepage.css',
    ], 'public/css/homepage/homepage.css');

    // Dashboard CSS
    mix.styles(
    [
        'dashboard/dashboard.css',
    ], 'public/css/dashboard/dashboard.css')

     // Errors CSS
    mix.styles(
    [
        'errors/404.css',
    ], 'public/css/errors/errors.css')

    // Lib Javascript
 	mix.scripts(
 	[
 		'lib/jquery.min.js',
 		'lib/bootstrap.min.js'
 	], 'public/js/lib/libraries.js');

    
    // Copying fonts to public
 	mix.copy(
        'resources/assets/css/lib/fonts',
        'public/build/css/fonts'
    );

    // Copying image to public
    mix.copy(
        'resources/assets/images',
        'public/images'
    );

 	mix.version(
 	[
 		'public/css/lib/libraries.css',
        'public/css/auth/auth.css',
 		'public/css/homepage/homepage.css',
        'public/css/dashboard/dashboard.css',
        'public/css/errors/errors.css',
        'public/js/lib/libraries.js',
 	]);
});
