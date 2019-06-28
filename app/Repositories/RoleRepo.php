<?php


namespace App\Repositories;


use App\Models\Users\Role;
use App\Repositories\Contracts\RoleContract;

class RoleRepo extends BaseRepo implements RoleContract
{
    public function __construct(Role $role)
    {
        $this->model = $role;
    }
}
