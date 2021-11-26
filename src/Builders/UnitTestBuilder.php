<?php

namespace Tkusa\Lawn\Builders;

use Tkusa\Lawn\Builders\Builder;
use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\Test\Unit\UnitTestComponent;
use Illuminate\Support\Str;
use Tkusa\Lawn\Parser;

class UnitTestBuilder extends Builder
{

    /**
     * Get replaced template
     */
    public function template($name)
    {
        //name dict
        $dict = Parser::dict($name);
        $base = UnitTestComponent::base();

        $test = $this->tests($name);

        //replace placeholders
        $template = str_replace('%test%', $test, $base);
        $template = str_replace('%name%', $dict['snake'], $template);
        $template = str_replace('%Name%', $dict['studly'], $template);

        return $template;
    }

    /**
     * Get a path for file
     */
    public function path($name)
    {
        //name dict
        $dict = Parser::dict($name);
        //path for the file creating
        $path = package_path(Config::UNIT_TEST_PATH . $dict['studly'] .'Test.php');

        return $path;
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
