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

        if (file_exists(base_path('database/migrations/lawn'))) {
            $this->loadMigrationsFrom(base_path('database/migrations/lawn'));
        }
        if (file_exists(base_path('routes/lawn.php'))) {
            $this->loadRoutesFrom(base_path('routes/lawn.php'));
        }

        $this->publishes([
            __DIR__.'/../Config/'.Config::CONF_NAME => config_path(Config::CONF_NAME),
        ], 'lawn-config');

        $this->publishes([
            //controller
            __DIR__.'/../'.Config::CONTROLLER_PATH => app_path('Http/Controllers/Lawn'),
            //request
            __DIR__.'/../'.Config::REQUEST_PATH => app_path('Http/Requests/Lawn'),
            //model
            __DIR__.'/../'.Config::MODEL_PATH => app_path('Models/Lawn'),
            //migration
            __DIR__.'/../'.Config::MIGRATION_PATH => database_path('migrations/lawn'),
            //factory
            __DIR__.'/../'.Config::FACTORY_PATH => database_path('factories/lawn'),
            //seeder
            __DIR__.'/../'.Config::SEEDER_PATH => database_path('seeders/lawn'),
            //route
            __DIR__.'/../'.Config::ROUTE_PATH. 'lawn.php' => base_path('routes/lawn.php'),
            //view
            __DIR__.'/../'.Config::VIEW_PATH => resource_path('views/lawn'),
            //test
            __DIR__.'/../'.Config::TEST_PATH => base_path('tests/lawn'),

            //resources
            __DIR__.'/../'.Config::RESOURCE_IMG_PATH => public_path('img/lawn'),
            __DIR__.'/../'.Config::RESOURCE_CSS_PATH => public_path('css/lawn'),
        ], 'lawn-build');
    }


    private function package_path($path = null)
    {
        return __DIR__ . '/../' . $path;
    }



}
