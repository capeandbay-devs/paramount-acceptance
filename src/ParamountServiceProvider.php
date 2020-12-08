<?php

namespace CapeAndBay\Paramount;

use Illuminate\Support\ServiceProvider;

class ParamountServiceProvider extends ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/paramount.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('paramount.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'paramount'
        );

        $this->app->bind('paramount', function () {
            return new Paramount();
        });
    }
}
