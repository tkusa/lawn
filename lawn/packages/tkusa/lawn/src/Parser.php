<?php

namespace Tkusa\Lawn;

use Tkusa\Lawn\Config\Config;

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
}
