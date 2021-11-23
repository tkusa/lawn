<?php

namespace Tkusa\Lawn\Builders;

use Tkusa\Lawn\Builders\Builder;
use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\Route\RouteComponent;
use Illuminate\Support\Str;
use Tkusa\Lawn\Parser;

class RouteBuilder extends Builder
{

    /**
     * Build a route file
     */
    public function build($name)
    {
        //name dict
        $dict = Parser::dict($name);
        $base = RouteComponent::base();
        ////replace placeholders
        $template = $this->template($name);
        $base = str_replace('%route%', $template, $base);
        //path for the file creating
        $path = $this->path($name);

        //write a file
        if (file_exists($path)) {
            $res = file_put_contents($path, $template, FILE_APPEND);
        } else {
            $res = file_put_contents($path, $base);
        }
        return $res;
    }

    /**
     * Get replaced template
     */
    public function template($name)
    {
        //name dict
        $dict = Parser::dict($name);

        //replace placeholders
        $route = $this->routes($name);
        $template = str_replace('%name%', $dict['kebab'], $route);
        $template = str_replace('%Name%', $dict['studly'], $template);

        return $template;
    }

    /**
     * Get a path for file
     */
    public function path($name)
    {
        //path for the file creating
        $path = package_path(Config::ROUTE_PATH.'lawn.php');
        return $path;
    }


    /**
     * Get a string of routes
     */
    public function routes($name)
    {

        $resources = Parser::resource($name);
        $routes = "";
        foreach ($resources as $resource) {
            $routes .= RouteComponent::call($resource);
        }

        return $routes;

    }

}
