<?php

namespace Tkusa\Lawn\Builders;

use Tkusa\Lawn\Builders\Builder;
use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\Factory\FactoryComponent;
use Illuminate\Support\Str;
use Tkusa\Lawn\Parser;

class FactoryBuilder extends Builder
{

    /**
     * Get a template
     */
    public function template($name)
    {
        $dict = Parser::dict($name);
        $base = FactoryComponent::base();
        $columns = $this->columns($name);

        //replace placeholders
        $template = str_replace('%column%', $columns, $base);
        $template = str_replace('%Name%', $dict['studly'], $template);

        return $template;

    }

    /**
     * Get a path
     */
    public function path($name)
    {
        $dict = Parser::dict($name);
        $path = package_path(Config::FACTORY_PATH. $dict['studly'] .'Factory.php');
        return $path;
    }

    /**
     * Get a string of columns
     */
    public function columns($name)
    {
        $columns = Parser::column($name);
        $defs = '';
        foreach ($columns as $column => $def) {
            $defs .= FactoryComponent::call($def);
        }

        return $defs;


    }
}
