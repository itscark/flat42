const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sourceMaps()
    .sass('resources/sass/app.scss', 'public/css').options({
    postCss: [
        require('postcss-sorting')({
            'properties-order': 'alphabetical'
        })
    ]
})
    .copy('resources/assets/images/', 'public/images/')
    .copy('resources/assets/svg/', 'public/svg/');