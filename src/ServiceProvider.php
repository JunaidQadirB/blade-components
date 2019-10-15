<?php

namespace MoonBear\BladeComponents;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views/components', 'moonbear/blade-components');
        $this->publishes([
            __DIR__.'/resources/views/components' => resource_path('views/vendor/moonbear/blade-components'),
        ], 'moonbear-blade-components');
    }
}
