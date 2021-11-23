<?php

namespace Tkusa\Lawn\Components\Factory;


class FactoryComponent
{

    /**
     * Call function from string
     */
    public static function call($def)
    {
        $type = $def['type'];
        switch ($type) {
            case 'string':
                return self::string($def);

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

    public static function string($def)
    {
        $name = $def['name'];
        $str = '"'. $name . '" => $this->faker->text(';
        if ($def['length']) {
            $str .= $def['length'];
        }
        $str .= '),
        ';
        return $str;
    }



}
