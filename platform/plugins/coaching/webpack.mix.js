let mix = require('laravel-mix')

const path = require('path')
let directory = path.basename(path.resolve(__dirname))

const source = 'platform/plugins/' + directory
const dist = 'public/vendor/core/plugins/' + directory

mix
    .sass(source + '/resources/assets/sass/coaching.scss', dist + '/css')
    .js(source + '/resources/assets/js/coaching.js', dist + '/js')

    .sass(source + '/resources/assets/sass/coaching-public.scss', dist + '/css')
    .js(source + '/resources/assets/js/coaching-public.js', dist + '/js')

if (mix.inProduction()) {
    mix
        .copy(dist + '/css/coaching.css', source + '/public/css')
        .copy(dist + '/css/coaching-public.css', source + '/public/css')
        .copy(dist + '/js/coaching.js', source + '/public/js')
        .copy(dist + '/js/coaching-public.js', source + '/public/js')
}
