<?php


namespace App\Repositories\Contracts;


interface ListsSelectsContract extends ModelContract
{
    public function getForFunctionSelect(string $name);
}
