<?php

namespace Tkusa\Lawn\Builders;

use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Components\Migration\MigrationComponent;
use Illuminate\Support\Str;
use Tkusa\Lawn\Parser;

class MigrationBuilder
{

    /**
     * Build a migration file
     */
    public function build($name)
    {

        //capitalized
        $Name = ucfirst($name);
        //plural
        $names = Str::plural($name);
        //capitalized plural
        $Names = Str::plural($Name);

        $base = MigrationComponent::base();
        $columns = $this->columns($name);

        //replace placeholders
        $base = str_replace('%column%', $columns, $base);
        $base = str_replace('%Names%', $Names, $base);
        $base = str_replace('%names%', $names, $base);

        //path for the file creating
        $path = package_path(Config::MIGRATION_PATH . 'create_'.$names .'_table.php');
        //write a file
        $res = file_put_contents($path, $base);

        return $res;

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
