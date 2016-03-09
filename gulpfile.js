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
    mix.styles(
    [
    	'bootstrap.min.css',
    	'utils.min.css',
    ], 'public/css/main.css');

    mix.styles(
    [
    	'website.css'
    ], 'public/css/website/main.css');

 	mix.scripts(
 	[
 		'jquery.min.js',
 		'bootstrap.min.js'
 	], 'public/js/main.js');

	mix.scripts(
 	[
 		'website.js',
 	], 'public/js/website/main.js');

 	mix.copy(
   'resources/assets/css/fonts',
   'public/build/fonts'
    );

 	mix.version(['public/css/main.css','public/css/website/main.css','public/js/main.js', 'public/js/website/main.js']);
});
