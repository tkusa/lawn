<?php

namespace Tkusa\Lawn\Components\Test\Unit;

use Tkusa\Lawn\Config\Config;

class UnitTestComponent
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
                return self::get();
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
        $test = '
        public function test_insert()
        {
            $this->assertTrue(true);
        }
        ';
        return $test;
    }

    /**
     * Get get test string
     */
    public static function get()
    {
        $test = '
        public function test_get()
        {
            $this->assertTrue(true);
        }
        ';
        return $test;
    }

    /**
     * Get update test string
     */
    public static function update()
    {
        $test = '
        public function test_update()
        {
            $this->assertTrue(true);
        }
        ';
        return $test;
    }

    /**
     * Get delete test string
     */
    public static function delete()
    {
        $test = '
        public function test_delete()
        {
            $this->assertTrue(true);
        }
        ';
        return $test;
    }



}
