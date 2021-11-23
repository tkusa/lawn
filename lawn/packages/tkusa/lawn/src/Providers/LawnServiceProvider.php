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
        app()->bind('RequestBuilder', \Tkusa\Lawn\Builders\RequestBuilder::class);
        app()->bind('ModelBuilder', \Tkusa\Lawn\Builders\ModelBuilder::class);
        app()->bind('MigrationBuilder', \Tkusa\Lawn\Builders\MigrationBuilder::class);
        app()->bind('FactoryBuilder', \Tkusa\Lawn\Builders\FactoryBuilder::class);
        app()->bind('SeederBuilder', \Tkusa\Lawn\Builders\SeederBuilder::class);
        app()->bind('RouteBuilder', \Tkusa\Lawn\Builders\RouteBuilder::class);
        app()->bind('ViewBuilder', \Tkusa\Lawn\Builders\ViewBuilder::class);
        app()->bind('UnitTestBuilder', \Tkusa\Lawn\Builders\UnitTestBuilder::class);
        app()->bind('FeatureTestBuilder', \Tkusa\Lawn\Builders\FeatureTestBuilder::class);
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
