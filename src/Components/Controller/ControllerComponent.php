<?php

namespace Tkusa\Lawn\Components\Controller;

use Tkusa\Lawn\Components\Component;

class ControllerComponent extends Component
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

    /**
     * Get index function string for controller
     */
    public static function index()
    {
        $func = self::get('CONTROLLER_INDEX');
        return $func;
    }


    /**
     * Get create function string for controller
     */
    public static function create()
    {
        $func = self::get('CONTROLLER_CREATE');
        return $func;
    }

    /**
     * Get store function string for controller
     */
    public static function store()
    {
        $func = self::get('CONTROLLER_STORE');
        return $func;
    }

    /**
     * Get show function string for controller
     */
    public static function show()
    {
        $func = self::get('CONTROLLER_SHOW');
        return $func;
    }

    /**
     * Get edit function string for controller
     */
    public static function edit()
    {
        $func = self::get('CONTROLLER_EDIT');
        return $func;
    }

    /**
     * Get update function string for controller
     */
    public static function update()
    {
        $func = self::get('CONTROLLER_UPDATE');
        return $func;
    }

    /**
     * Get destroy function string for controller
     */
    public static function destroy()
    {
        $func = self::get('CONTROLLER_DESTROY');
        return $func;
    }
}
