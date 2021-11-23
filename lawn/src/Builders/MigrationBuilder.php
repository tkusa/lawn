<?php

namespace Tkusa\Lawn\Builders;

use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\Migration\MigrationComponent;
use Illuminate\Support\Str;
use Tkusa\Lawn\Parser;
use Carbon\Carbon;

class MigrationBuilder extends Builder
{

    /**
     * Get a template
     */
    public function template($name)
    {
        $dict = Parser::dict($name);
        $base = MigrationComponent::base();
        $columns = $this->columns($name);

        //replace placeholders
        $template = str_replace('%column%', $columns, $base);
        $template = str_replace('%Names%', $dict['studlies'], $template);
        $template = str_replace('%names%', $dict['snakes'], $template);

        return $template;

    }

    /**
     * Get a path
     */
    public function path($name)
    {
        $dict = Parser::dict($name);
        $now = date_format(new Carbon, 'Y_m_d_His');
        $path = package_path(Config::MIGRATION_PATH . $now .'_create_'.$dict['snakes'] .'_table.php');
        return $path;
    }

    /**
     * Get a string of columns
     */
    public function columns($name)
    {
        $columns = Parser::column($name);
        $defs = '';
        foreach ($columns as $column => $def) {
            $defs .= MigrationComponent::call($def);
        }

        return $defs;


    }
}
