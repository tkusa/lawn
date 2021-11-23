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
    const SEEDER_PATH = 'Build/database/seeders/';
    const ROUTE_PATH = 'Build/routes/';
    const VIEW_PATH = 'Build/resources/views/';
    const TEST_PATH = 'Build/tests/';
    const UNIT_TEST_PATH = 'Build/tests/Unit/';
    const FEATURE_TEST_PATH = 'Build/tests/Feature/';

    const RESOURCE_VIEW_PATH = 'Resources/Views/';

    const SEEDER_COUNT = 10;

}
