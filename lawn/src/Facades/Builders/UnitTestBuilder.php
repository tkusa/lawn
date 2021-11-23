<?php

namespace Tkusa\Lawn\Facades\Builders;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @see \Tkusa\Lawn\Builder\UnitTestBuilder
 *
 */

class UnitTestBuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'UnitTestBuilder';
    }
}
