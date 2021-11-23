<?php

namespace Tkusa\Lawn\Components\Route;


class RouteComponent
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
            case 'store':
                return self::store();
            case 'show':
                return self::show();
            case 'edit':
                return self::edit();
            case 'update':
                return self::update();
            case 'destroy':
                return self::destroy();

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

    public static function index()
    {
        $str = '
        Route::get("/%name%", "%Name%Controller@index")->name("%name%.index");
        ';
        return $str;
    }

    public static function create()
    {
        $str = '
        Route::get("/%name%/create", "%Name%Controller@create")->name("%name%.create");
        ';
        return $str;
    }

    public static function store()
    {
        $str = '
        Route::post("/%name%", "%Name%Controller@store")->name("%name%.store");
        ';
        return $str;
    }

    public static function show()
    {
        $str = '
        Route::get("/%name%", "%Name%Controller@index")->name("%name%.index");
        ';
        return $str;
    }

    public static function edit()
    {
        $str = '
        Route::get("/%name%/edit", "%Name%Controller@edit")->name("%name%.edit");
        ';
        return $str;
    }

    public static function update()
    {
        $str = '
        Route::put("/%name%", "%Name%Controller@update")->name("%name%.update");
        ';
        return $str;
    }

    public static function destroy()
    {
        $str = '
        Route::delete("/%name%", "%Name%Controller@destroy")->name("%name%.destroy");
        ';
        return $str;
    }




}
