<?php

namespace Tkusa\Lawn\Facades\Builders;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @see \Tkusa\Lawn\Builder\RouteBuilder
 *
 */

class RouteBuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'RouteBuilder';
    }
}
