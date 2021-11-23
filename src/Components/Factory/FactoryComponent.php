<?php

namespace Tkusa\Lawn\Components\Factory;

use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Parser;

class FactoryComponent
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
            case Config::TYPE_DECIMAL:
                return self::decimal($def);
            case Config::TYPE_BOOLEAN:
                return self::boolean($def);
            case Config::TYPE_JSON:
                return self::json($def);
            case Config::TYPE_DATETIME:
                return self::datetime($def);
            case Config::TYPE_DATE:
                return self::date($def);
            case Config::TYPE_TIME:
                return self::time($def);
            case Config::TYPE_TIMESTAMP:
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

    public static function string($def)
    {
        $name = $def['name'];
        $str = '"'. $name . '" => $this->faker->text(';
        if (isset($def['length'])) {
            $str .= $def['length'];
        }
        $str .= '),
        ';
        return $str;
    }

    public static function integer($def)
    {
        $name = $def['name'];
        $str = '"'. $name . '" => $this->faker->numberBetween(),
        ';
        return $str;
    }

    public static function decimal($def)
    {
        $name = $def['name'];
        $str = '"'. $name . '" => $this->faker->randomFloat(),
        ';
        return $str;
    }

    public static function boolean($def)
    {
        $name = $def['name'];
        $str = '"'. $name . '" => $this->faker->boolean(),
        ';
        return $str;
    }

    public static function json($def)
    {
        $name = $def['name'];
        $str = '"'. $name . '" => "{".$this->faker->word().":".$this->faker->word."}",
        ';
        return $str;
    }

    public static function datetime($def)
    {
        $name = $def['name'];
        $str = '"'. $name . '" => $this->faker->dateTime(),
        ';
        return $str;
    }

    public static function date($def)
    {
        $name = $def['name'];
        $str = '"'. $name . '" => $this->faker->date(),
        ';
        return $str;
    }

    public static function time($def)
    {
        $name = $def['name'];
        $str = '"'. $name . '" => $this->faker->time(),
        ';
        return $str;
    }

    public static function timestamp($def)
    {
        $name = $def['name'];
        $str = '"'. $name . '" => $this->faker->dateTime()->getTimestamp(),
        ';
        return $str;
    }



}
