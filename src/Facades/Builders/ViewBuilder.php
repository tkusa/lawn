<?php

namespace Tkusa\Lawn\Facades\Builders;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @see \Tkusa\Lawn\Builder\ViewBuilder
 *
 */

class ViewBuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ViewBuilder';
    }
}
