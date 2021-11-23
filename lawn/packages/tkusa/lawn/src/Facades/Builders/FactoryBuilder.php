<?php

namespace Tkusa\Lawn\Facades\Builders;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @see \Tkusa\Lawn\Builder\FactoryBuilder
 *
 */

class FactoryBuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'FactoryBuilder';
    }
}
