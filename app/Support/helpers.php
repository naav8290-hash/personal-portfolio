<?php

if (! function_exists('versioned_asset')) {
    /**
     * Build an asset URL with a file modification timestamp as cache buster.
     */
    function versioned_asset(string $path): string
    {
        $absolute = public_path($path);
        $version = is_file($absolute) ? filemtime($absolute) : null;

        return asset($path).($version ? '?v='.$version : '');
    }
}
