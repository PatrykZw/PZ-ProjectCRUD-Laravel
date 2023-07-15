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
    .js('resources/js/delete.js', 'public/js')
    .js('resources/js/welcome.js', 'public/js')
    .js('resources/js/modify.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .postCss('resources/css/cart.css', 'public/css')
    .postCss('resources/css/welcome.css', 'public/css')
    .postCss('resources/css/users.css', 'public/css')
    .postCss('resources/css/cars.css', 'public/css')
    .postCss('resources/css/borrow.css', 'public/css')

    mix.options({
        hmrOptions: {
          host: 'localhost',
          port: 8000
        }
      });
      mix.browserSync({
        proxy: 'localhost:8000',
        port: 3000
      });