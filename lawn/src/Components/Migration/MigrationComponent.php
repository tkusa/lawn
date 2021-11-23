<?php

namespace Tkusa\Lawn\Components\Migration;


class MigrationComponent
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
        $str = '$table->string(\''.$name.'\'';
        if (isset($def['length'])) {
            $str .= ', '.$def['length'];
        }
        $str .= ')';
        if (isset($def['nullable']) && $def['nullable']) {
            $str .= '->nullable()';
        }
        $str .= ';
        ';
        return $str;
    }


}
