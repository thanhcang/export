<?php


namespace App\Helpers\Roles;


use App\Models\Users\Role;
use Illuminate\Support\Arr;

class PermissionsForRole implements AcceptContract
{
    private $permissions = [];

    public function __construct(Role $role)
    {
        $this->permissions = $role->permissions;
    }

    public function allow(string $ability): bool
    {
        return Arr::get($this->permissions, $ability) === true;
    }

}
