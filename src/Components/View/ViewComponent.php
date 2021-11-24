<?php

namespace Tkusa\Lawn\Components\View;

use Tkusa\Lawn\Config\Config;
use Tkusa\Lawn\Parser;

class ViewComponent
{

    /**
     * Call function from string
     */
    public static function call($str, $name)
    {
        switch ($str) {
            case 'index':
                return self::index($name);
            case 'create':
                return self::create($name);
            case 'show':
                return self::show($name);
            case 'edit':
                return self::edit($name);

            default:
                return null;
        }
    }

    /**
     * GetBase
     */
    public static function base()
    {
        $base = file_get_contents(__DIR__.'/base.txt');
        return $base;
    }

    /**
     * Get index view base
     */
    public static function index($name)
    {
        $view = file_get_contents(__DIR__.'/index.txt');

        $columns = Parser::column($name);
        $heads = '';
        $bodies = '';
        foreach ($columns as $column) {
            $heads .= self::head($column);
            $bodies .= self::body($column);
        }
        $view = str_replace('%head%', $heads, $view);
        $view = str_replace('%body%', $bodies, $view);
        return $view;
    }


    /**
     * Get create view base
     */
    public static function create($name)
    {
        $view = file_get_contents(__DIR__.'/create.txt');

        $columns = Parser::column($name);
        $form = '';
        foreach ($columns as $column) {
            $form .= self::form($column);
        }
        $view = str_replace('%form%', $form, $view);
        return $view;
    }

    /**
     * Get show view base
     */
    public static function show($name)
    {
        $view = file_get_contents(__DIR__.'/show.txt');

        $columns = Parser::column($name);
        $info = '';
        foreach ($columns as $column) {
            $info .= self::info($column);
        }
        $view = str_replace('%info%', $info, $view);
        return $view;
    }

    /**
     * Get edit view base
     */
    public static function edit($name)
    {
        $view = file_get_contents(__DIR__.'/edit.txt');

        $columns = Parser::column($name);
        $form = '';
        foreach ($columns as $column) {
            $form .= self::form($column, true);
        }
        $view = str_replace('%form%', $form, $view);
        return $view;
    }

    public static function form($column, $edit=false)
    {
        $type = Parser::type($column['type']);
        switch ($type) {
            case Config::TYPE_STRING:
                return self::input($column, $edit);
            case Config::TYPE_TEXT:
                return self::textarea($column, $edit);
            case Config::TYPE_INTEGER:
                return self::input($column, $edit);
            case Config::PARSE_DECIMAL:
                return self::input($column, $edit);
            case Config::PARSE_BOOLEAN:
                return self::checkbox($column, $edit);
            case Config::PARSE_JSON:
                return self::input($column, $edit);
            case Config::PARSE_DATETIME:
                return self::input($column, $edit);
            case Config::PARSE_DATE:
                return self::input($column, $edit);
            case Config::PARSE_TIME:
                return self::input($column, $edit);
            case Config::PARSE_TIMESTAMP:
                return self::input($column, $edit);
            default:
                return "";
        }
    }

    /**
     * Get error
     */
    public static function error($column)
    {
        $name = $column['name'];
        $error = '
        @error("'.$name.'")
            <div class="lawn_error">
                <p><strong>{{ $message }}</strong></p>
            </div>
        @enderror
        ';
        return $error;
    }

    /**
     * Get input
     */
    public static function input($column, $edit=false)
    {
        $type = Parser::type($column['type']);
        switch ($type) {
            case Config::PARSE_DATETIME:
            case Config::PARSE_TIMESTAMP:
                $type = 'datetime';
                break;
            case Config::PARSE_DATE:
                $type = 'date';
                break;
            case Config::PARSE_TIME:
                $type = 'time';
                break;
            default:
                $type = 'text';
        }
        $name = $column['name'];
        $label = $column['label'];
        $old = '{{ old("'.$name.'"';
        if ($edit) {
            $old .= ', $%name%->'.$name;
        }
        $old .= ')}}';
        $error = self::error($column);
        $input = '
        <label>'.$label.'
            <input type="'.$type.'" name="'.$name.'" value="'.$old.'">'.$error.'
        </label>';
        return $input;
    }
    /**
     * Get textarea
     */
    public static function textarea($column, $edit=false)
    {
        $name = $column['name'];
        $label = $column['label'];
        $old = '{{ old("'.$name.'"';
        if ($edit) {
            $old .= ', $%name%->'.$name;
        }
        $old .= ')}}';
        $error = self::error($column);
        $input = '
        <label>'.$label.'
            <textarea name="'.$name.'">'.$old.'</textarea>'.$error.'
        </label>
        ';
        return $input;
    }

    /**
     * Get checkbox
     */
    public static function checkbox($column, $edit=false)
    {
        $name = $column['name'];
        $label = $column['label'];
        $old = '{{ old("'.$name.'"';
        if ($edit) {
            $old .= ', $%name%->'.$name;
        }
        $old .= ')}}';
        $error = self::error($column);
        $input = '
        <input type="checkbox" name="'.$name.'" value="'.$old.'">'.$label.$error.'
        ';
        return $input;
    }

    /**
     * Get info
     */
    public static function info($column)
    {
        $name = $column['name'];
        $info = '
            <dt>'.$name.'</dt>
            <dd>{{ $%name%->'.$name.' }}</dd>
        ';
        return $info;
    }

    /**
     * Get head
     */
    public static function head($column)
    {
        $name = $column['name'];
        $head = '<th>'.$name.'</th>
        ';
        return $head;
    }

    /**
     * Get body
     */
    public static function body($column)
    {
        $name = $column['name'];
        $body = '<td>{{ $%name%->'.$name.' }}</td>
        ';
        return $body;
    }

}
