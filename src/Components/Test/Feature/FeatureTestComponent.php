<?php

namespace Tkusa\Lawn\Components\Test\Feature;

use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\Component;

class FeatureTestComponent extends Component
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
     * Get Unit
     */
    public static function base()
    {
        $base = file_get_contents(__DIR__.'/base.txt');
        return $base;
    }

    /**
     * Get index test string
     */
    public static function index()
    {
        $test = self::get('TEST_FEATURE_INDEX');
        return $test;
    }

    /**
     * Get create test string
     */
    public static function create()
    {
        $test = $test = self::get('TEST_FEATURE_CREATE');
        return $test;
    }

    /**
     * Get store test string
     */
    public static function store()
    {
        $test = self::get('TEST_FEATURE_STORE');
        return $test;
    }

    /**
     * Get show test string
     */
    public static function show()
    {
        $test = self::get('TEST_FEATURE_SHOW');
        return $test;
    }

    /**
     * Get edit test string
     */
    public static function edit()
    {
        $test = self::get('TEST_FEATURE_EDIT');
        return $test;
    }

    /**
     * Get update test string
     */
    public static function update()
    {
        $test = self::get('TEST_FEATURE_UPDATE');
        return $test;
    }

    /**
     * Get destroy test string
     */
    public static function destroy()
    {
        $test = self::get('TEST_FEATURE_DESTROY');
        return $test;
    }







}
