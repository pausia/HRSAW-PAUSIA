const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
      // Add any PostCSS plugins or options here
   ])
   .sass('resources/sass/app.scss', 'public/css')
   .sourceMaps(); // Enable source maps for better debugging

if (mix.inProduction()) {
   mix.version();
}
 
