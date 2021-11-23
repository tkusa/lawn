<?php

namespace Tkusa\Lawn\Console\Commands;

use Illuminate\Console\Command;
use Tkusa\Lawn\Config\Config;
use Illuminate\Support\Facades\File;
use Tkusa\Lawn\Facades\Builders\ControllerBuilder;
use Tkusa\Lawn\Facades\Builders\RequestBuilder;
use Tkusa\Lawn\Facades\Builders\ModelBuilder;
use Tkusa\Lawn\Facades\Builders\MigrationBuilder;
use Tkusa\Lawn\Facades\Builders\FactoryBuilder;
use Tkusa\Lawn\Facades\Builders\RouteBuilder;
use Tkusa\Lawn\Facades\Builders\ViewBuilder;

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

        $name = 'post';
        // $res = RequestBuilder::build($name);
        // $res = ControllerBuilder::build($name);
        // $res = ModelBuilder::build($name);
        // $res = MigrationBuilder::build($name);
        // $res = FactoryBuilder::build($name);
        //$res = RouteBuilder::build($name);
        $res = ViewBuilder::build($name);


        return Command::SUCCESS;
    }
}
