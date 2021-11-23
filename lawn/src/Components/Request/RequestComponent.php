<?php

namespace Tkusa\Lawn\Components\Request;


class RequestComponent
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

    /**
     * Get validation for string
     */
    public static function string($def)
    {
        $name = $def['name'];
        $str = '"'. $name . '" => ["string", ';
        if (isset($def['nullable']) && $def['nullable']) {
            $str .= '"nullable", ';
        } else {
            $str .= '"required", ';
        }
        if (isset($def['length'])) {
            $str .= '"max:'. $def['length'] .'", ';
        }
        $str .= '],
        ';
        return $str;
    }



}
