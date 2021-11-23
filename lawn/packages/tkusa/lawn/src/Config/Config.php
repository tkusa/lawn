<?php

namespace Tkusa\Lawn\Config;

class Config
{
    const CONF_NAME = 'lawn.php';

    const DEFAULT_RESOURCES = [
        'index',
        'create',
        'store',
        'show',
        'edit',
        'update',
        'destroy',
    ];

    const CONTROLLER_PATH = 'Build/Http/Controllers/';
    const REQUEST_PATH = 'Build/Http/Requests/';
    const MODEL_PATH = 'Build/Models/';
    const MIGRATION_PATH = 'Build/database/migrations/';
    const FACTORY_PATH = 'Build/database/factories/';

}
