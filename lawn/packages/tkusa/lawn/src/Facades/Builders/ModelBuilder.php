<?php

namespace Tkusa\Lawn\Facades\Builders;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @see \Tkusa\Lawn\Builder\ModelBuilder
 *
 */

class ModelBuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ModelBuilder';
    }
}
