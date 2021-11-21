<?php

namespace Tkusa\Lawn\Providers;

use Illuminate\Support\ServiceProvider;
use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Console\Commands\BuildCommand;

class LawnServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind('Parser', \Tkusa\Lawn\Parser::class);
        app()->bind('ControllerBuilder', \Tkusa\Lawn\Builders\ControllerBuilder::class);
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                BuildCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__.'/../Config/'.Config::CONF_NAME => config_path(Config::CONF_NAME),
        ]);
    }


    private function package_path($path = null)
    {
        return __DIR__ . '/../' . $path;
    }



}
