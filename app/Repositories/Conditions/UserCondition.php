<?php


namespace App\Repositories\Conditions;


use App\User;

trait UserCondition
{
    public function verified()
    {
        return ['users.verified' => User::USER_ACTIVE];
    }

    public function active()
    {
        return ['users.active' => User::USER_ACTIVE];
    }

    public function email(string $email)
    {
        return ['email' => $email];
    }

    public function verifyToken(string $token)
    {
        return ['token' => $token];
    }
}
