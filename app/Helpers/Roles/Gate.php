<?php


namespace App\Helpers\Roles;

use App\User;

class Gate
{
    public function allow(User $user, string $ability)
    {
        $forUser = new PermissionsForUser($user);
        $forRole = new PermissionsForRole($user->role()->first());

        return $forRole->allow($ability) && $forUser->allow($ability);
    }
}
