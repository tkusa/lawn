<?php

namespace Tkusa\Lawn\Builders;

use Tkusa\Lawn\Builders\Builder;
use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\Controller\ControllerComponent;
use Illuminate\Support\Str;
use Tkusa\Lawn\Parser;

class ControllerBuilder extends Builder
{

    /**
     * Get a template
     */
    public function template($name)
    {
        $dict = Parser::dict($name);
        $base = ControllerComponent::base();
        $use = $this->uses();
        $func = $this->functions($name);

        //replace placeholders
        $template = str_replace('%use%', $use, $base);
        $template = str_replace('%function%', $func, $template);
        $template = str_replace('%names%', $dict['snakes'], $template);
        $template = str_replace('%name%', $dict['snake'], $template);
        $template = str_replace('%Name%', $dict['studly'], $template);

        return $template;
    }

    /**
     * Get a path
     */
    public function path($name)
    {
        $dict = Parser::dict($name);
        $path = package_path(Config::CONTROLLER_PATH . $dict['studly'] .'Controller.php');
        return $path;
    }

    /**
     * Get a string of functions
     */
    public function functions($name)
    {

        $resources = Parser::resource($name);
        $funcs = "";
        foreach ($resources as $resource) {
            $funcs .= ControllerComponent::call($resource);
        }

        return $funcs;

    }

    /**
     * Get a string of dependancies
     */
    public function uses()
    {
        return "";
    }

}
