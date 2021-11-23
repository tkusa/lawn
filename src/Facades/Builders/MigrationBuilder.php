<?php

namespace Tkusa\Lawn\Facades\Builders;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @see \Tkusa\Lawn\Builder\MigrationBuilder
 *
 */

class MigrationBuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'MigrationBuilder';
    }
}
