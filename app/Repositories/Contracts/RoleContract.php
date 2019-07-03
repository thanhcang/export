<?php


namespace App\Repositories\Contracts;


interface RoleContract extends ModelContract
{
    public function findOrFailByName(string $name);
}
