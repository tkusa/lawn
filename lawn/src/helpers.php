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

if (! function_exists('rmrf')) {
    /**
     * Remove dir recursively
     */
    function rmrf($path)
    {
        if (is_dir($path)) {
            foreach (glob($path.'/*') as $pathname) {
                rmrf($pathname);
            }
            rmdir($path);
        }
        if (is_file($path)) {
            unlink($path);
            return;
        }
    }
}
