<?php


namespace App\Repositories\Contracts;


interface ListsSelectsContract extends ModelContract
{
    public function optionsForName(string $name);
}
