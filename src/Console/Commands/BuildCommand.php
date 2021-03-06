<?php

namespace Tkusa\Lawn\Console\Commands;

use Illuminate\Console\Command;
use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Parser;
use Illuminate\Support\Facades\File;
use Tkusa\Lawn\Facades\Builders\ControllerBuilder;
use Tkusa\Lawn\Facades\Builders\RequestBuilder;
use Tkusa\Lawn\Facades\Builders\ModelBuilder;
use Tkusa\Lawn\Facades\Builders\MigrationBuilder;
use Tkusa\Lawn\Facades\Builders\FactoryBuilder;
use Tkusa\Lawn\Facades\Builders\SeederBuilder;
use Tkusa\Lawn\Facades\Builders\RouteBuilder;
use Tkusa\Lawn\Facades\Builders\ViewBuilder;
use Tkusa\Lawn\Facades\Builders\UnitTestBuilder;
use Tkusa\Lawn\Facades\Builders\FeatureTestBuilder;

class BuildCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lawn:build';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make your garden covered by Lawn';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line('Initializing...');
        $this->init();
        $this->comment('Done');

        $this->line('Begin to build...');

        $entities = Parser::entities();
        foreach ($entities as $name) {
            $this->comment('Building for ' .$name);
            $res = ControllerBuilder::build($name);
            if ($res) {
                $this->info('Finished to build a Controller');
            } else {
                $this->error('Failed to build a Controller');
            }
            $res = RequestBuilder::build($name);
            if ($res) {
                $this->info('Finished to build a Request');
            } else {
                $this->error('Failed to build a Request');
            }
            $res = ModelBuilder::build($name);
            if ($res) {
                $this->info('Finished to build a Model');
            } else {
                $this->error('Failed to build a Model');
            }
            $res = MigrationBuilder::build($name);
            if ($res) {
                $this->info('Finished to build a Migration');
            } else {
                $this->error('Failed to build a Migration');
            }
            $res = FactoryBuilder::build($name);
            if ($res) {
                $this->info('Finished to build a Factory');
            } else {
                $this->error('Failed to build a Factory');
            }
            $res = SeederBuilder::build($name);
            if ($res) {
                $this->info('Finished to build a Seeder');
            } else {
                $this->error('Failed to build a Seeder');
            }
            $res = RouteBuilder::build($name);
            if ($res) {
                $this->info('Finished to build Routes');
            } else {
                $this->error('Failed to build Routes');
            }
            $res = ViewBuilder::build($name);
            if ($res) {
                $this->info('Finished to build Views');
            } else {
                $this->error('Failed to build Views');
            }
            $res = UnitTestBuilder::build($name);
            if ($res) {
                $this->info('Finished to build a UnitTest');
            } else {
                $this->error('Failed to build a UnitTest');
            }
            $res = FeatureTestBuilder::build($name);
            if ($res) {
                $this->info('Finished to build FeatureTest');
            } else {
                $this->error('Failed to build FeatureTest');
            }
        }
        $this->info('Build finished.');
        $this->comment('Now your Lawn is ready.');
        $this->comment('Run `php artisan vender:publish --tag="lawn-build"`');
        return Command::SUCCESS;
    }

    /**
     * initialize
     */
    public function init()
    {
        $build_path = package_path('Build');
        rmrf($build_path);
        mkdir($build_path, 0777);
        $this->prepare($build_path);
        $this->copy();
    }

    /**
     * prepare dirs
     */
    public function prepare($path)
    {
        $this->build_dir(Config::CONTROLLER_PATH);
        $this->build_dir(Config::REQUEST_PATH);
        $this->build_dir(Config::MODEL_PATH);
        $this->build_dir(Config::MIGRATION_PATH);
        $this->build_dir(Config::FACTORY_PATH);
        $this->build_dir(Config::SEEDER_PATH);
        $this->build_dir(Config::ROUTE_PATH);
        $this->build_dir(Config::VIEW_PATH);
        $this->build_dir(Config::UNIT_TEST_PATH);
        $this->build_dir(Config::FEATURE_TEST_PATH);
        $entities = Parser::entities();
        foreach ($entities as $entity) {
            $this->build_dir(Config::VIEW_PATH.$entity);
        }

    }

    /**
     * Copy required resourses
     */
    public function copy()
    {
        File::copyDirectory(package_path(Config::RESOURCE_VIEW_PATH), package_path(Config::VIEW_PATH));
        File::copyDirectory(package_path(Config::RESOURCE_CONTROLLER_PATH), package_path(Config::CONTROLLER_PATH));
    }

    public function build_dir($path)
    {
        $path = package_path($path);
        if (! file_exists($path)) {
            mkdir($path, 0777, true);
        }
    }

}
