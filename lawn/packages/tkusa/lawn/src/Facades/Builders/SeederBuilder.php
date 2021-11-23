<?php

namespace Tkusa\Lawn\Facades\Builders;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @see \Tkusa\Lawn\Builder\SeederBuilder
 *
 */

class SeederBuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SeederBuilder';
    }
}
