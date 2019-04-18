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
    .sass('resources/sass/app.scss', 'public/css');

mix.copy('node_modules/sweetalert/dist/sweetalert.min.js', 'public/js');

mix.styles([
    'templates/css/style.css',
    'templates/vendors/css/vendor.bundle.base.css',
], 'public/css/templates.css');

mix.scripts([
    'templates/vendors/js/vendor.bundle.base.js',
    'templates/vendors/js/vendor.bundle.addons.js',
    'templates/js/chart.js',
    'templates/js/dashboard.js',
    'templates/js/file-upload.js',
    'templates/js/misc.js',
    'templates/js/off-canvas.js'
], 'public/js/templates.js');
