<?php

namespace Tkusa\Lawn\Builders;

use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\Model\ModelComponent;
use Illuminate\Support\Str;
use Tkusa\Lawn\Parser;

class ModelBuilder
{

    /**
     * Build a model file
     */
    public function build($name)
    {

        //capitalized
        $Name = ucfirst($name);
        //plural
        $names = Str::plural($name);

        $base = ModelComponent::base();
        $fillable = $this->columns($name);

        //replace placeholders
        $base = str_replace('%fillable%', $fillable, $base);
        $base = str_replace('%Name%', $Name, $base);

        //path for the file creating
        $path = package_path(Config::MODEL_PATH . $Name .'.php');
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
        $fillable = '';
        foreach ($columns as $column => $contraints) {
            $fillable .= "'".$column."', ";
        }

        return $fillable;


    }
}
