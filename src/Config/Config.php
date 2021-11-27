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

    const RESOURCE_CONTROLLER_PATH = 'Resources/Controllers/';
    const RESOURCE_VIEW_PATH = 'Resources/Views/';
    const RESOURCE_IMG_PATH = 'Resources/Imgs/';
    const RESOURCE_CSS_PATH = 'Resources/Css/';

    const SEEDER_COUNT = 10;

    const TYPE_STRING = 'string';
    const TYPE_TEXT = 'text';
    const TYPE_INTEGER = 'integer';
    const TYPE_DECIMAL = 'decimal';
    const TYPE_BOOLEAN = 'boolean';
    const TYPE_JSON = 'json';
    const TYPE_DATETIME = 'datetime';
    const TYPE_DATE = 'date';
    const TYPE_TIME = 'time';
    const TYPE_TIMESTAMP = 'timestamp';

    const PARSE_STRING = [
        'string', 'String', 'str', 'Str',
    ];
    const PARSE_TEXT = [
        'text', 'Text', 'tinyText', 'middleText', 'longText',
    ];
    const PARSE_INTEGER = [
        'integer', 'Integer', 'int', 'Integer',
    ];
    const PARSE_DECIMAL = [
        'decimal', 'Decimal', 'dec', 'Dec',
        'float', 'Float',
    ];
    const PARSE_BOOLEAN= [
        'boolean', 'Boolean', 'bool', 'Bool',
    ];
    const PARSE_JSON = [
        'json', 'Json',
    ];
    const PARSE_DATETIME = [
        'datetime', 'DateTime', 'Datetime', 'dateTime', 'date_time',
    ];
    const PARSE_DATE = [
        'date', 'Date',
    ];
    const PARSE_TIME = [
        'time', 'Time',
    ];
    const PARSE_TIMESTAMP = [
        'timestamp', 'TimeStamp', 'Timestamp', 'timeStamp', 'time_stamp',
    ];

}
