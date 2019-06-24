<?php

if (!function_exists('urlClient')) {
    function urlClient(string $path, array $params = [])
    {
        return $params !== [] ? env('CLIENT_URL') . '/' . $path : env('CLIENT_URL') . '/' . $path . http_build_query($params);
    }
}

