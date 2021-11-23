<?php

namespace Tkusa\Lawn\Builders;

use Tkusa\Lawn\Builders\Builder;
use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\Model\ModelComponent;
use Illuminate\Support\Str;
use Tkusa\Lawn\Parser;

class ModelBuilder extends Builder
{

    /**
     * Get a template
     */
    public function template($name)
    {
        $dict = Parser::dict($name);
        $base = ModelComponent::base();
        $fillable = $this->columns($name);

        //replace placeholders
        $template = str_replace('%fillable%', $fillable, $base);
        $template = str_replace('%Name%', $dict['studly'], $template);

        return $template;

    }

    /**
     * Get a path
     */
    public function path($name)
    {
        $dict = Parser::dict($name);
        $path = package_path(Config::MODEL_PATH . $dict['studly'] .'.php');
        return $path;
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
