<?php

namespace Tkusa\Lawn\Components\View;


class ViewComponent
{

    /**
     * Call function from string
     */
    public static function call($str)
    {
        switch ($str) {
            case 'index':
                return self::index();
            case 'create':
                return self::create();
            case 'show':
                return self::show();
            case 'edit':
                return self::edit();

            default:
                return null;
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
     * Get index view base
     */
    public static function index()
    {
        $view = file_get_contents(__DIR__.'/index.txt');
        return $view;
    }


    /**
     * Get create view base
     */
    public static function create()
    {
        $view = file_get_contents(__DIR__.'/create.txt');
        return $view;
    }

    /**
     * Get show view base
     */
    public static function show()
    {
        $view = file_get_contents(__DIR__.'/show.txt');
        return $view;
    }

    /**
     * Get edit view base
     */
    public static function edit()
    {
        $view = file_get_contents(__DIR__.'/edit.txt');
        return $view;
    }
}
