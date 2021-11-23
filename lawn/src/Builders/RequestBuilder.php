<?php

namespace Tkusa\Lawn\Builders;

use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\Request\RequestComponent;
use Illuminate\Support\Str;
use Tkusa\Lawn\Parser;

class RequestBuilder
{

    /**
     * Build a migration file
     */
    public function build($name)
    {
        //name dict
        $dict = Parser::dict($name);

        $base = RequestComponent::base();
        $columns = $this->columns($name);

        //replace placeholders
        $base = str_replace('%column%', $columns, $base);
        $base = str_replace('%Name%', $dict['studly'], $base);

        //path for the file creating
        $path = package_path(Config::REQUEST_PATH . $dict['studly'] .'Request.php');
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
            $defs .= RequestComponent::call($def);
        }

        return $defs;


    }
}
