<?php

namespace Tkusa\Lawn\Builders;

use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\Factory\FactoryComponent;
use Illuminate\Support\Str;
use Tkusa\Lawn\Parser;

class FactoryBuilder
{

    /**
     * Build a migration file
     */
    public function build($name)
    {

        //capitalized
        $Name = ucfirst($name);

        $base = FactoryComponent::base();
        $columns = $this->columns($name);

        //replace placeholders
        $base = str_replace('%column%', $columns, $base);
        $base = str_replace('%Name%', $Name, $base);

        //path for the file creating
        $path = package_path(Config::FACTORY_PATH. $Name .'Factory.php');
        //write a file
        $res = file_put_contents($path, $base);

        return $res;

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
