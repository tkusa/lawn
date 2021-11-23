<?php

namespace Tkusa\Lawn;

use Tkusa\Lawn\Config\Config;
use Illuminate\Support\Str;

class Parser
{

    /**
     * Get defined entities
     */
    public function entities()
    {
        $entities = config('lawn.entity');
        if (empty($entities)) {
            return null;
        }
        return $entities;
    }

    /**
     * Get defined resources
     */
    public function resource($name)
    {
        $resources = config('lawn.'. $name .'.resource');
        if (empty($resources)) {
            return Config::DEFAULT_RESOURCES;
        }
        return $resources;
    }

    /**
     * Get defined columns of entity
     */
    public function column($name)
    {
        $columns = config('lawn.'.$name.'.column');
        if (empty($columns)) {
            return [];
        }
        return $columns;
    }

    /**
     * Get a dict of name
     */
    public static function dict($name)
    {
        $dict = [];
        $snake = Str::snake($name);
        $studly = Str::studly($snake);
        $dict['base'] = $name;
        $dict['snake'] = $snake;
        $dict['snakes'] = Str::plural($snake);
        $dict['studly'] = $studly;
        $dict['studlies'] = Str::pluralStudly($snake);

        return $dict;
    }
}
