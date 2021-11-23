<?php

namespace Tkusa\Lawn\Builders;

use Tkusa\Lawn\Builders\Builder;
use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\Seeder\SeederComponent;
use Illuminate\Support\Str;
use Tkusa\Lawn\Parser;

class SeederBuilder extends Builder
{
    /**
     * Get replaced template
     */
    public function template($name)
    {
        //name dict
        $dict = Parser::dict($name);
        $base = SeederComponent::base();
        $run = $this->runs();

        //replace placeholders
        $template = str_replace('%run%', $run, $base);
        $template = str_replace('%Name%', $dict['studly'], $template);

        return $template;
    }

    /**
     * Get a path for file
     */
    public function path($name)
    {
        //name dict
        $dict = Parser::dict($name);
        //path for the file creating
        $path = package_path(Config::SEEDER_PATH . $dict['studly'] .'Seeder.php');

        return $path;
    }


    /**
     * Get a string of seeder
     */
    public function runs()
    {

        $runs = SeederComponent::run();

        return $runs;

    }

}
