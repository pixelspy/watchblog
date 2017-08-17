var elixir = require('laravel-elixir');


elixir(function(mix) {
    mix.less("app.less");
    mix.sass("app.scss");

    mix.scripts([
        'vendor/vue.js',
        'vendor/vue-resource.js'
    ], 'public/js/vendor.js')
});