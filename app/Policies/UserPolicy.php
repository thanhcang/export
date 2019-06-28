<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    const METHOD_NAME = 'hasAccess';

    use HandlesAuthorization;

    public function hasAccess(User $user, string $requiredPermission)
    {
        return $user->hasAccess($requiredPermission);
    }
}
