const mix = require('laravel-mix');
const SWPrecacheWebpackPlugin = require('sw-precache-webpack-plugin');

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


mix.webpackConfig({
    plugins: [
        new SWPrecacheWebpackPlugin({
            cacheId: 'pwa',
            filename: 'service-worker.js',
            staticFileGlobs: ['public/!**!/!*.{css,eot,svg,ttf,woff,woff2,js,html}'],
            minify: true,
            stripPrefix: '/',
            handleFetch: true,
            dynamicUrlToDependencies: { //you should add the path to your blade files here so they can be cached
                //and have full support for offline first (example below)
                '/': ['resources/views/layouts/master.blade.php'],
                // '/posts': ['resources/views/posts.blade.php']
            },
            staticFileGlobsIgnorePatterns: [/\.map$/, /mix-manifest\.json$/, /manifest\.json$/, /service-worker\.js$/],
            navigateFallback: '/',
            runtimeCaching: [
                {
                    urlPattern: /^https:\/\/fonts\.googleapis\.com\//,
                    handler: 'cacheFirst'
                },
                {
                    urlPattern: /^https:\/\/www\.thecocktaildb\.com\/images\/media\/drink\/(\w+)\.jpg/,
                    handler: 'cacheFirst'
                }
            ],
            // importScripts: ['./js/push_message.js']
        })
    ]
});