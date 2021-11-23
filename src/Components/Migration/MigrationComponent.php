<?php

namespace Tkusa\Lawn\Components\Migration;

use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Parser;

class MigrationComponent
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
                return self::text($def);
            case Config::TYPE_INTEGER:
                return self::integer($def);
            case Config::PARSE_DECIMAL:
                return self::decimal($def);
            case Config::PARSE_BOOLEAN:
                return self::boolean($def);
            case Config::PARSE_JSON:
                return self::json($def);
            case Config::PARSE_DATETIME:
                return self::datetime($def);
            case Config::PARSE_DATE:
                return self::date($def);
            case Config::PARSE_TIME:
                return self::time($def);
            case Config::PARSE_TIMESTAMP:
                return self::timestamp($def);
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
            $str .= '->nullable()';
        }
        if (isset($def['default'])) {
            $str .= '->default('.$def['default'].')';
        }
    }

    public static function string($def)
    {
        $name = $def['name'];
        $str = '$table->string(\''.$name.'\'';
        if (isset($def['length'])) {
            $str .= ', '.$def['length'];
        }
        $str .= ')';
        $general = self::general($def);
        $str .= $general .';
        ';
        return $str;
    }
    public static function text($def)
    {
        $name = $def['name'];
        $str = '$table->text(\''.$name.'\')';
        $general = self::general($def);
        $str .= $general .';
        ';
        return $str;

    }

    public static function integer($def)
    {
        $name = $def['name'];
        $str = '$table->integer(\''.$name.'\'';
        if (isset($def['auto_increment']) && $def['auto_increment']) {
            $str .= ', true';
        } else {
            $str .= ', false';
        }
        if (isset($def['unsigned']) && $def['unsigned']) {
            $str .= ', true';
        }
        $str .= ')';
        $general = self::general($def);
        $str .= $general .';
        ';
        return $str;

    }

    public static function decimal($def)
    {
        $name = $def['name'];
        $str = '$table->decimal(\''.$name.'\'';
        if (isset($def['total'])) {
            $str .= ', '.$def['total'];
        } else {
            $str .= ', 8';
        }
        if (isset($def['places'])) {
            $str .= ', '.$def['places'];
        } else {
            $str .= ', 2';
        }
        if (isset($def['unsigned']) && $def['unsigned']) {
            $str .= ', true';
        }
        $str .= ')';
        $general = self::general($def);
        $str .= $general .';
        ';
        return $str;
    }

    public static function boolean($def)
    {
        $name = $def['name'];
        $str = '$table->boolean(\''.$name.'\')';
        $general = self::general($def);
        $str .= $general .';
        ';
        return $str;
    }

    public static function json($def)
    {
        $name = $def['name'];
        $str = '$table->json(\''.$name.'\')';
        $general = self::general($def);
        $str .= $general .';
        ';
        return $str;

    }

    public static function datetime($def)
    {
        $name = $def['name'];
        $str = '$table->dateTime(\''.$name.'\'';
        if (isset($def['precision'])) {
            $str .= ', '.$def['precision'];
        }
        $str .= ')';
        $general = self::general($def);
        $str .= $general .';
        ';
        return $str;
    }

    public static function date($def)
    {
        $name = $def['name'];
        $str = '$table->date(\''.$name.'\')';
        $general = self::general($def);
        $str .= $general .';
        ';
        return $str;

    }

    public static function time($def)
    {

        $name = $def['name'];
        $str = '$table->time(\''.$name.'\'';
        if (isset($def['precision'])) {
            $str .= ', '.$def['precision'];
        }
        $str .= ')';
        $general = self::general($def);
        $str .= $general .';
        ';
        return $str;
    }

    public static function timestamp($def)
    {
        $name = $def['name'];
        $str = '$table->timestamp(\''.$name.'\'';
        if (isset($def['precision'])) {
            $str .= ', '.$def['precision'];
        }
        $str .= ')';
        $general = self::general($def);
        $str .= $general .';
        ';
        return $str;

    }


}
