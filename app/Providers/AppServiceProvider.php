<?php

namespace WatchBlog\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Laracasts\Generators\GeneratorsServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        // $this->app->register(GeneratorsServiceProvider::class);

      if ($this->app->environment() == "local") {
       $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
    }
    }
}
