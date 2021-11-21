<?php

namespace Tkusa\Lawn\Components\Model;


class ModelComponent
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


}
