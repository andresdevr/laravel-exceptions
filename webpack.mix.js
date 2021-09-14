const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.js('resources/js/app.js', 'public/js/exceptions.bundle.js')
    .vue()
    .sass('resources/scss/app.scss', 'public/css/exceptions.bundle.css')
    .options({
        processCssUrls: true,
        postCss: [tailwindcss('./tailwind.config.js')],
    })
    .copyDirectory('node_modules/mavon-editor/dist/font', 'public/fonts/vendor/mavon-editor/dist');


if (mix.inProduction()) {
    mix.version();
}