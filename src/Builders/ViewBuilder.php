<?php

namespace Tkusa\Lawn\Builders;

use Tkusa\Lawn\Builders\Builder;
use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\View\ViewComponent;
use Illuminate\Support\Str;
use Tkusa\Lawn\Parser;

class ViewBuilder extends Builder
{

    /**
     * Build view files
     */
    public function build($name)
    {
        //name dict
        $dict = Parser::dict($name);

        $base = ViewComponent::base();

        $views = $this->views($name);

        foreach ($views as $resource => $view) {
            //replace placeholders
            $template = str_replace('%view%', $view, $base);
            $template = str_replace('%names%', $dict['snakes'], $template);
            $template = str_replace('%name%', $dict['snake'], $template);

            //path for the file creating
            $path = package_path(Config::VIEW_PATH .$dict['snake'] .'/'. $resource .'.blade.php');
            //write a file
            $res = file_put_contents($path, $template);
        }


        return $res;
    }

    /**
     * Get an array of views
     */
    public function views($name)
    {
        $resources = Parser::resource($name);
        $views = [];
        foreach ($resources as $resource) {
            $view = ViewComponent::call($resource);
            if ($view) {
                $views[$resource] = $view;
            }
        }

        return $views;

    }


}
