<?php

namespace Tkusa\Lawn\Builders;

use Tkusa\Lawn\Config\Config;
use Illuminate\Support\Str;
use Tkusa\Lawn\Parser;

class Builder
{

    /**
     * Build a controller file
     */
    public function build($name)
    {
        //template to write
        $template = $this->template($name);
        //path for the file creating
        $path = $this->path($name);
        //write a file
        $res = file_put_contents($path, $template);

        return $res;
    }

    /**
     * Get a template
     */
    public function template($name)
    {
        return '';
    }

    /**
     * Get a path
     */
    public function path($name)
    {
        return '';
    }

}
