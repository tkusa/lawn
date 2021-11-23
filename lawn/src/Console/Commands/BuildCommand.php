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
        $this->init();

        $entities = Parser::entities();

        foreach ($entities as $name) {
            $res = ControllerBuilder::build($name);
            $res = RequestBuilder::build($name);
            $res = ModelBuilder::build($name);
            $res = MigrationBuilder::build($name);
            $res = FactoryBuilder::build($name);
            $res = SeederBuilder::build($name);
            $res = RouteBuilder::build($name);
            $res = ViewBuilder::build($name);
            $res = UnitTestBuilder::build($name);
            $res = FeatureTestBuilder::build($name);
        }

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

    }

    public function build_dir($path)
    {
        $path = package_path($path);
        if (! file_exists($path)) {
            mkdir($path, 0777, true);
        }
    }

}
