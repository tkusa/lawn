<?php

namespace Tkusa\Lawn;

use Tkusa\Lawn\Config\Config;
use Illuminate\Support\Str;

class Parser
{
    /**
     * Get defined entities
     */
    public static function entities()
    {
        $entities = config('lawn.entity');

        $res = [];
        foreach ($entities as $entity) {
            $res[] = self::dict($entity)['snake'];

        }
        return $entities;
    }

    /**
     * Get entities which has index page
     */
    public static function entities_with_index()
    {
        $entities = self::entities();
        $res = [];
        foreach ($entities as $entity) {
            $resources = self::resource($entity);
            if (in_array('index', $resources)) {
                $res[] = $entity;
            }
        }
        return $res;
    }

    /**
     * Get defined resources
     */
    public static function resource($name)
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
    public static function column($name)
    {
        $columns = config('lawn.'.$name.'.column');
        if (empty($columns)) {
            return [];
        }
        foreach ($columns as $key => $column) {
            $column['label'] = isset($column['label']) ? $column['label']: $column['name'];
            $columns[$key] = $column;
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
        $dict['kebab'] = Str::kebab($name);

        return $dict;
    }

    /**
     * Parse type
     */
    public static function type($type)
    {
        //string
        if (in_array($type, Config::PARSE_STRING, true)) {
            return Config::TYPE_STRING;
        }
        //text
        if (in_array($type, Config::PARSE_TEXT, true)) {
            return Config::TYPE_TEXT;
        }
        //integer
        if (in_array($type, Config::PARSE_INTEGER, true)) {
            return Config::TYPE_INTEGER;
        }
        //DECIMAL
        if (in_array($type, Config::PARSE_DECIMAL, true)) {
            return Config::TYPE_DECIMAL;
        }
        //boolean
        if (in_array($type, Config::PARSE_BOOLEAN, true)) {
            return Config::TYPE_BOOLEAN;
        }
        //json
        if (in_array($type, Config::PARSE_JSON, true)) {
            return Config::TYPE_JSON;
        }
        //datetime
        if (in_array($type, Config::PARSE_DATETIME, true)) {
            return Config::TYPE_DATETIME;
        }
        //date
        if (in_array($type, Config::PARSE_DATE, true)) {
            return Config::TYPE_DATE;
        }
        //time
        if (in_array($type, Config::PARSE_TIME, true)) {
            return Config::TYPE_TIME;
        }
        //timestamp
        if (in_array($type, Config::PARSE_TIMESTAMP, true)) {
            return Config::TYPE_TIMESTAMP;
        }

        return  "";

    }
}
