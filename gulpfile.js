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
elixir.config.sourcemaps = false;

elixir(function(mix) {

    // FRONT STYLESHEET
    mix.sass([
        'front/bootstrap.min.css',
        'front/font-awesome.min.css',
        'front/style.css',
        'front/custom.scss'
    ], 'public/assets/front/css/all.css');

    // FRONT SCRIPT
    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'jquery.inputmask.bundle.min.js',
        'bootstrap-confirmation.js',
        'script.js'
    ], 'public/assets/front/js/script.js', 'resources/assets/js/front');

});
