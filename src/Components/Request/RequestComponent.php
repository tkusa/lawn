<?php

namespace Tkusa\Lawn\Components\Request;

use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Parser;

class RequestComponent
{

    /**
     * Call function from string
     */
    public static function call($def)
    {
        $type = Parser::type($def['type']);
        switch ($type) {
            case Config::TYPE_STRING:
                return self::string($def);
            case Config::TYPE_TEXT:
                return self::string($def);
            case Config::TYPE_INTEGER:
                return self::integer($def);
            case Config::PARSE_DECIMAL:
                return self::integer($def);
            case Config::PARSE_BOOLEAN:
                return self::boolean($def);
            case Config::PARSE_JSON:
                return self::json($def);
            case Config::PARSE_DATETIME:
                return self::datetime($def);
            case Config::PARSE_DATE:
                return self::datetime($def);
            case Config::PARSE_TIME:
                return self::datetime($def);
            case Config::PARSE_TIMESTAMP:
                return self::datetime($def);
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

    public static function general($def)
    {
        $str = '';
        if (isset($def['nullable']) && $def['nullable']) {
            $str .= '"nullable", ';
        } else {
            $str .= '"required", ';
        }
        return $str;
    }
    /**
     * Get validation for string
     */
    public static function string($def)
    {
        $name = $def['name'];
        $str = '"'. $name . '" => ["string", ';
        $general = self::general($def);
        $str .= $general;
        if (isset($def['length'])) {
            $str .= '"max:'. $def['length'] .'", ';
        }
        $str .= '],
        ';
        return $str;
    }

    /**
     * Get validation for integer
     */
    public static function integer($def)
    {
        $name = $def['name'];
        $str = '"'. $name . '" => ["integer", ';
        $general = self::general($def);
        $str .= $general;
        if (isset($def['unsigned']) && $def['unsigned']) {
            $str .= '"min: 0", ';
        }
        $str .= '],
        ';
        return $str;
    }

    /**
     * Get validation for boolean
     */
    public static function boolean($def)
    {
        $name = $def['name'];
        $str = '"'. $name . '" => [';
        $general = self::general($def);
        $str .= $general;
        $str .= '],
        ';
        return $str;
    }

    /**
     * Get validation for json
     */
    public static function json($def)
    {
        $name = $def['name'];
        $str = '"'. $name . '" => ["array", ';
        $general = self::general($def);
        $str .= $general;
        $str .= '],
        ';
        return $str;

    }

    /**
     * Get validation for datetime
     */
    public static function datetime($def)
    {
        $name = $def['name'];
        $str = '"'. $name . '" => ["date", ';
        $general = self::general($def);
        $str .= $general;
        $str .= '],
        ';
        return $str;

    }



}
