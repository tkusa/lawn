<?php

namespace Tkusa\Lawn\Console\Commands;

use Illuminate\Console\Command;
use Tkusa\Lawn\Config\Config;
use Illuminate\Support\Facades\File;
use Tkusa\Lawn\Facades\Builders\ControllerBuilder;
use Tkusa\Lawn\Facades\Builders\ModelBuilder;
use Tkusa\Lawn\Facades\Builders\MigrationBuilder;

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
    protected $description = 'Make your garden covered by lawn';

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
        $res = ControllerBuilder::build($name);
        $res = ModelBuilder::build($name);
        $res = MigrationBuilder::build($name);


        return Command::SUCCESS;
    }
}
