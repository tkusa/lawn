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

    const CONTROLLER_PATH = 'Http/Controllers/';
    const MODEL_PATH = 'Models/';
    const MIGRATION_PATH = 'database/migrations/';

}
