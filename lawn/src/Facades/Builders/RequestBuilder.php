<?php

namespace Tkusa\Lawn\Facades\Builders;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @see \Tkusa\Lawn\Builder\RequestBuilder
 *
 */

class RequestBuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'RequestBuilder';
    }
}
