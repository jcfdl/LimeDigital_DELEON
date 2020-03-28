const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css').version();

// fonts
mix.styles([
	'resources/css/font-awesome.css',
	'resources/css/material-design-iconic-font.css',
], 'public/css/fonts.css').version();

// core css
mix.styles([	
	'resources/css/app.min.css',
], 'public/css/core.app.css').version();

// custom styles
mix.styles([	
	'resources/css/custom.css',
	'resources/css/misc-pages.css',
], 'public/css/admin-custom.css').version();

// custom styles
mix.styles([	
	'resources/css/home-custom.css',
], 'public/css/home-custom.css').version();

// core js
mix.scripts([
	'resources/js/core.min.js',
], 'public/js/core.app.js').version();

// breakpoints
mix.scripts([
	'resources/js/breakpoints.min.js',
], 'public/js/app.breakpoints.js').version();

// app js
mix.scripts([
	'resources/js/app.min.js',
], 'public/js/min.app.js').version();

// custom
mix.scripts([
	'resources/js/custom.js',
], 'public/js/admin-custom.js').version();