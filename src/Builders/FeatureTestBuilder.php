<?php

namespace Tkusa\Lawn\Builders;

use Tkusa\Lawn\Builders\Builder;
use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\Test\Feature\FeatureTestComponent;
use Illuminate\Support\Str;
use Tkusa\Lawn\Parser;

class FeatureTestBuilder extends Builder
{

    /**
     * Get a template
     */
    public function template($name)
    {
        $dict = Parser::dict($name);

        $base = FeatureTestComponent::base();
        $test = $this->tests($name);
        //replace placeholders
        $template = str_replace('%test%', $test, $base);
        $template = str_replace('%Name%', $dict['studly'], $template);
        $template = str_replace('%name%', $dict['kebab'], $template);

        return $template;

    }

    /**
     * Get a path
     */
    public function path($name)
    {
        $dict = Parser::dict($name);
        $path = package_path(Config::FEATURE_TEST_PATH . $dict['studly'] .'ControllerTest.php');
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
            $test = FeatureTestComponent::call($resource);
            if ($test) {
                $tests .= $test;
            }
        }

        return $tests;

    }


}
