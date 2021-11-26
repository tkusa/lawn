<?php

namespace Tkusa\Lawn\Components\Route;

use Tkusa\Lawn\Components\Component;

class RouteComponent extends Component
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
        $str = self::get('ROUTE_INDEX');
        return $str;
    }

    public static function create()
    {
        $str = self::get('ROUTE_CREATE');
        return $str;
    }

    public static function store()
    {
        $str = self::get('ROUTE_STORE');
        return $str;
    }

    public static function show()
    {
        $str = self::get('ROUTE_SHOW');
        return $str;
    }

    public static function edit()
    {
        $str = self::get('ROUTE_EDIT');
        return $str;
    }

    public static function update()
    {
        $str = self::get('ROUTE_UPDATE');
        return $str;
    }

    public static function destroy()
    {
        $str = self::get('ROUTE_DESTROY');
        return $str;
    }




}
