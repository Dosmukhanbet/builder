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

elixir(function(mix) {
    mix.sass('app.scss')
        .styles(['sweetalert.css', 'dropzone.css', 'lity.css', 'jquery.datetimepicker.min.css'])
        .scripts(['libs/dropzone.js', 'libs/lity.js', 'libs/datetimepicker.js'])
        .browserify('main.js');
});
