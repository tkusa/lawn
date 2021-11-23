<?php

namespace Tkusa\Lawn\Builders;

use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\Test\Unit\UnitTestComponent;
use Illuminate\Support\Str;
use Tkusa\Lawn\Parser;

class UnitTestBuilder
{

    /**
     * Build view files
     */
    public function build($name)
    {
        //name dict
        $dict = Parser::dict($name);

        $base = UnitTestComponent::base();

        $test = $this->tests($name);

        //replace placeholders
        $template = str_replace('%test%', $test, $base);
        $template = str_replace('%Name%', $dict['studly'], $template);

        //path for the file creating
        $path = package_path(Config::TEST_PATH .'Unit/'. $dict['studly'] .'Test.php');
        //write a file
        $res = file_put_contents($path, $template);

        return $res;
    }

    /**
     * Get an array of views
     */
    public function tests($name)
    {
        $resources = Parser::resource($name);
        $tests = '';
        foreach ($resources as $resource) {
            $test = UnitTestComponent::call($resource);
            if ($test) {
                $tests .= $test;
            }
        }

        return $tests;

    }


}
