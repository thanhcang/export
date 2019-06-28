<?php


namespace App\Helpers;


use Illuminate\Support\Str;

class StrUtility extends Str
{
    public static function concat(array $array, string $separate = '_')
    {
        return implode($separate, $array);
    }
}
