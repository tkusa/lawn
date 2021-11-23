<?php

namespace Tkusa\Lawn\Builders;

use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\Test\Feature\FeatureTestComponent;
use Illuminate\Support\Str;
use Tkusa\Lawn\Parser;

class FeatureTestBuilder
{

    /**
     * Build view files
     */
    public function build($name)
    {
        //name dict
        $dict = Parser::dict($name);

        $base = FeatureTestComponent::base();

        $test = $this->tests($name);

        //replace placeholders
        $template = str_replace('%test%', $test, $base);
        $template = str_replace('%Name%', $dict['studly'], $template);
        $template = str_replace('%name%', $dict['kebab'], $template);

        //path for the file creating
        $path = package_path(Config::FEATURE_TEST_PATH . $dict['studly'] .'ControllerTest.php');
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
            $test = FeatureTestComponent::call($resource);
            if ($test) {
                $tests .= $test;
            }
        }

        return $tests;

    }


}
