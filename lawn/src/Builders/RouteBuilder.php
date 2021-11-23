<?php

namespace Tkusa\Lawn\Builders;

use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\Route\RouteComponent;
use Illuminate\Support\Str;
use Tkusa\Lawn\Parser;

class RouteBuilder
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
        $route = $this->routes($name);
        $route = str_replace('%name%', $dict['kebab'], $route);
        $route = str_replace('%Name%', $dict['studly'], $route);

        $base = str_replace('%route%', $route, $base);

        //path for the file creating
        $path = package_path(Config::ROUTE_PATH.'lawn.php');

        //write a file
        if (file_exists($path)) {
            $res = file_put_contents($path, $route, FILE_APPEND);
        } else {
            $res = file_put_contents($path, $base);
        }
        return $res;
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
