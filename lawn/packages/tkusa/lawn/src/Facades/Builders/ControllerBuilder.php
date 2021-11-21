<?php

namespace Tkusa\Lawn\Facades\Builders;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @see \Tkusa\Lawn\Builder\ControllerBuilder
 *
 */

class ControllerBuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ControllerBuilder';
    }
}
