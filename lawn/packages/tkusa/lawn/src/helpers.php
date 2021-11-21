<?php

if (! function_exists('package_path')) {
    /**
     * Get package path
     */
    function package_path($path = null)
    {
        return __DIR__.'/'.$path;
    }
}
