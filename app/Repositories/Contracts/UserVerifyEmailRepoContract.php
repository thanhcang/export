<?php


namespace App\Repositories\Contracts;


use App\Models\Auth\UserEmailVerify;

interface UserVerifyEmailRepoContract extends ModeContract
{
    public function findForToken(string $token): ?UserEmailVerify;
}
