var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');

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

elixir(function(mix) {
    mix.sass('app.scss')
        .styles( [
                    'sweetalert.css',
                    'animate.css',
                    'dropzone.css',
                    'lity.css',
                    'jquery.datetimepicker.min.css',
                    'slick.css',
                    'slick-theme.css'
        ])
        .scripts([
                    'libs/dropzone.js',
                    'libs/lity.js',
                    'libs/datetimepicker.js',
                    'libs/slick.js'
        ])
        .browserify('main.js');
});
