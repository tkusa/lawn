<?php

namespace Tkusa\Lawn\Components\Test\Feature;

use Tkusa\Lawn\Config\Config;

class FeatureTestComponent
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
        $test = '
        public function test_index()
        {
            $response = $this->get("/%name%");

            $response->assertStatus(200);
        }
        ';
        return $test;
    }

    /**
     * Get create test string
     */
    public static function create()
    {
        $test = '
        public function test_create()
        {
            $response = $this->get("/%name%/create");

            $response->assertStatus(200);
        }
        ';
        return $test;
    }

    /**
     * Get store test string
     */
    public static function store()
    {
        $test = '
        public function test_store()
        {
            $response = $this->post("/%name%");

            $response->assertStatus(200);
        }
        ';
        return $test;
    }

    /**
     * Get show test string
     */
    public static function show()
    {
        $test = '
        public function test_show()
        {
            $response = $this->get("/%name%/1");

            $response->assertStatus(200);
        }
        ';
        return $test;
    }

    /**
     * Get edit test string
     */
    public static function edit()
    {
        $test = '
        public function test_edit()
        {
            $response = $this->get("/%name%/1/edit");

            $response->assertStatus(200);
        }
        ';
        return $test;
    }

    /**
     * Get update test string
     */
    public static function update()
    {
        $test = '
        public function test_update()
        {
            $response = $this->put("/%name%/1");

            $response->assertStatus(200);
        }
        ';
        return $test;
    }

    /**
     * Get destroy test string
     */
    public static function destroy()
    {
        $test = '
        public function test_destroy()
        {
            $response = $this->delete("/%name%/1");

            $response->assertStatus(200);
        }
        ';
        return $test;
    }







}
