<?php

namespace Tkusa\Lawn\Components\Seeder;

use Tkusa\Lawn\Config\Config;

class SeederComponent
{

    /**
     * Call function from string
     */
    public static function call($str)
    {
        switch ($str) {

            default:
                return "";
        }
    }

    /**
     * GetBase
     */
    public static function base()
    {
        $base = file_get_contents(__DIR__.'/base.txt');
        return $base;
    }

    /**
     * Get index function string for controller
     */
    public static function run()
    {
        $run = '
        \App\Models\%Name%::factory(' .Config::SEEDER_COUNT .')->create();
        ';
        return $run;
    }



}
