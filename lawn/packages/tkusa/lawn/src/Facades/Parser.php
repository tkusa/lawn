<?php

namespace Tkusa\Lawn\Facades\Builders;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @see \Tkusa\Lawn\Parser
 *
 */

class Parser extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Parser';
    }
}
