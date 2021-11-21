<?php

namespace Tkusa\Lawn\Builders;

use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\Controller\ControllerComponent;
use Illuminate\Support\Str;
use Tkusa\Lawn\Parser;

class ControllerBuilder
{

    /**
     * Build a controller file
     */
    public function build($name)
    {
        //capitalized
        $Name = ucfirst($name);
        //plural
        $names = Str::plural($name);

        $resources = Parser::resources($name);

        $base = ControllerComponent::base();
        $use = $this->uses();
        $func = $this->functions($resources);

        //replace placeholders
        $base = str_replace('%use%', $use, $base);
        $base = str_replace('%function%', $func, $base);
        $base = str_replace('%names%', $names, $base);
        $base = str_replace('%name%', $name, $base);
        $base = str_replace('%Name%', $Name, $base);

        //path for the file creating
        $path = package_path(Config::CONTROLLER_PATH . $Name .'Controller.php');
        //write a file
        $res = file_put_contents($path, $base);

        return $res;
    }

    /**
     * Get a string of functions
     */
    public function functions($resources)
    {

        $funcs = "";
        foreach ($resources as $resource) {
            $funcs .= ControllerComponent::call($resource);
        }

        return $funcs;

    }

    public function uses()
    {
        return "";
    }

}
