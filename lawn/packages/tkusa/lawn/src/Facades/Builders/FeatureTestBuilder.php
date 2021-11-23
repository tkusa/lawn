<?php

namespace Tkusa\Lawn\Facades\Builders;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @see \Tkusa\Lawn\Builder\FeatureTestBuilder
 *
 */

class FeatureTestBuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'FeatureTestBuilder';
    }
}
