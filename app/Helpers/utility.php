<?php

if (!function_exists('urlClient')) {
    function urlClient(string $path, array $params = [])
    {
        return $params !== [] ? env('CLIENT_URL') . '/' . $path : env('CLIENT_URL') . '/' . $path . http_build_query($params);
    }
}

if (!function_exists('api_v1_path')) {
    /**
     * Get the path to the application folder.
     *
     * @param string $path
     * @return string
     */
    function api_v1_path($path = '')
    {
        return app('path') . '/Http/Controllers/Api/V1/' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

