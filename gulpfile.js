var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */


elixir(function(mix) {

    mix.sass('app.scss')
    	.scripts([
    		'jquery/dist/jquery.js',
    		'bootstrap-sass/assets/javascripts/bootstrap.js',
    		'angular/angular.js',
    		'angular-ui-router/release/angular-ui-router.js',
    		'angular-bootstrap/ui-bootstrap-tpls.js',
    		'../other_vendors/**/*.js'
    		], 'public/js/vendor.js', 'resources/assets/bower_components/')
    	.scriptsIn('resources/assets/js', 'public/js/app.js');
});
