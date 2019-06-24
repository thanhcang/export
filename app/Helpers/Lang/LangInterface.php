<?php


namespace App\Helpers\Lang;


interface LangInterface
{
    public function locate(string $locate);

    public function get(string $key);
}
