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
    .copy('resources/assets/svg/', 'public/svg/');


mix.webpackConfig({
    plugins: [
        new SWPrecacheWebpackPlugin({
            cacheId: 'Flat42',
            filename: 'service-worker.js',
            staticFileGlobs: [
                'public/**/*.{css,eot,svg,ttf,woff,woff2,js,html}',
                'public/favicon.png',
            ],
            /*minify: true,*/
            stripPrefix: 'public/',
            handleFetch: true,
            dynamicUrlToDependencies: {
                '/': ['resources/views/frontend/index.blade.php'],
            },
            staticFileGlobsIgnorePatterns: [/\.map$/, /mix-manifest\.json$/, /manifest\.json$/, /service-worker\.js$/],
            runtimeCaching: [
                {
                    urlPattern: /^https:\/\/fonts\.googleapis\.com\//,
                    handler: 'cacheFirst'
                },
                {
                    urlPattern: /^https:\/\/www\.thecocktaildb\.com\/images\/media\/drink\/(\w+)\.jpg/,
                    handler: 'cacheFirst'
                }
            ]
        })
    ]
});





/*
new SWPrecacheWebpackPlugin({
    cacheId: 'pwa',
    filename: 'service-worker.js',
    /!*  minify: true,*!/
    handleFetch: true,
    navigateFallback: '/',
    staticFileGlobs: [
        './public/css/app.css',
        './public/js/app.js',
        './public/images/!**.*',
        './public/svg/!**.svg',
        './public/favicon.png',
    ],
    mergeStaticsConfig: true,
    staticFileGlobsIgnorePatterns: [/\.map$/],
})*/
