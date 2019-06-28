<?php


namespace App\Helpers\Roles;


interface AcceptContract
{
    public function allow(string $ability): bool;
}
