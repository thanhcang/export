<?php


namespace App\Repositories\Contracts;


interface ProductContact extends ModelContract
{
    public function findOrFailForName(string $name);

    public function findForName(string $name);
}
