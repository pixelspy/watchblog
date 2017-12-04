var elixir = require('laravel-elixir');
require('laravel-elixir-vue-2');


elixir(function(mix) {
    mix.less("app.less");
    mix.sass("app.scss")
        .webpack('app.js');

    mix.scripts([
        'vendor/vue.js',
        'vendor/vue-resource.js'
    ], 'public/js/vendor.js')
});