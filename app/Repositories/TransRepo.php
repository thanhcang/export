<?php


namespace App\Repositories;


use App\Models\Managements\Trans\Trans;
use App\Repositories\Contracts\TransContact;

class TransRepo extends BaseRepo implements TransContact
{
    public function __construct(Trans $model)
    {
        $this->model = $model;
    }
}
