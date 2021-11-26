<?php

namespace Tkusa\Lawn\Components\Test\Unit;

use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\Component;

class UnitTestComponent extends Component
{

    /**
     * Call function from string
     */
    public static function call($str)
    {
        switch ($str) {
            case 'store':
                return self::insert();
            case 'show':
                return self::select();
            case 'update':
                return self::update();
            case 'destroy':
                return self::delete();

            default:
                return "";
        }
    }

    /**
     * Get Base
     */
    public static function base()
    {
        $base = file_get_contents(__DIR__.'/base.txt');
        return $base;
    }

    /**
     * Get insert test string
     */
    public static function insert()
    {
        $test = self::get('TEST_UNIT_INSERT');
        return $test;
    }

    /**
     * Get get test string
     */
    public static function select()
    {
        $test = self::get('TEST_UNIT_SELECT');
        return $test;
    }

    /**
     * Get update test string
     */
    public static function update()
    {
        $test = self::get('TEST_UNIT_UPDATE');
        return $test;
    }

    /**
     * Get delete test string
     */
    public static function delete()
    {
        $test = self::get('TEST_UNIT_DELETE');
        return $test;
    }



}
