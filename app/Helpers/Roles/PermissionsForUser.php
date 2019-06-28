<?php


namespace App\Helpers\Roles;


use App\User;
use Illuminate\Support\Arr;

class PermissionsForUser implements AcceptContract
{
    private $permissions = [];

    public function __construct(User $user)
    {
        $this->permissions = $user->permission;
    }

    public function allow(string $ability): bool
    {
        // TODO: Implement isAccept() method.

        if ($this->permissions === []) {
            return true;
        }

        if (!Arr::has($this->permissions, $ability)) {
            return true;
        }

        return Arr::get($this->permissions, $ability) === true;

    }
}
