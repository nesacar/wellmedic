let mix = require('laravel-mix');
require('laravel-mix-purgecss');

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

mix.js('resources/assets/js/app.js', 'public/js')
  .js('resources/assets/frontend/js/index.js', 'public/themes/wellmedic/js')
  .js('resources/assets/frontend/js/home.js', 'public/themes/wellmedic/js/home.js')

mix.sass('resources/assets/sass/app.scss', 'public/css')
  .sass('resources/assets/frontend/sass/index.scss', 'public/themes/wellmedic/css')
  .purgeCss();