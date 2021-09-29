const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]).vue();

mix.extract([
    'vue',
    'lodash',
    'alpine',
    'postcss',
    'sweetalert2',
    'autoprefixer',
    'tailwindcss',
    'laravel-mix',
    'vue2-dropzone',
    'vue-datetime',
    'vue-multiselect',
    '@chenfengyuan/vue-carousel',
])

mix.copy('node_modules/sweetalert2/src/sweetalert2.scss', 'public/css/sweetalert2.css')
mix.copy('node_modules/vue-multiselect/dist/vue-multiselect.min.css', 'public/css/vue-multiselect.min.css')
mix.copy('node_modules/vue-datetime/dist/vue-datetime.css', 'public/css/vue-datetime.css')


mix.webpackConfig({
    plugins: [
    ],
    watchOptions: {
        ignored: /node_modules/
    },
    output: {
        chunkFilename: 'js/components/[name].js?id=[chunkhash]',
    },
    resolve: {
        /*alias: {
            '@c': path.resolve('resources/js/components'),
        }*/
    }
    /*resolve: {
        alias: {
            'vue$': 'node_modules/vue/dist/vue' // 'vue/dist/vue.common.js' for webpack 1
        }
    }*/
})

mix.webpackConfig({
    externals: {
        'vue-server-renderer/basic': 'vue-server-renderer/basic'
    },
})

if (mix.inProduction()) {
    mix.version();
}

if (! mix.inProduction()) {
    mix.browserSync({
        proxy: 'http://localhost:8000',
        open: false,
        snippetOptions: {
            rule: {
                match: /<\/body>/i,
                fn: function (snippet, match) {
                    return snippet + match;
                }
            }
        }
    });
}


