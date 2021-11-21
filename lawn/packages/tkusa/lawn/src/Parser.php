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
}
