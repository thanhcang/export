<?php


namespace App\Repositories\Contracts;


use App\Models\Auth\UserPasswordReset;

interface UserResetPasswordContract extends ModelContract
{
    public function findForToken(string $token): ?UserPasswordReset;

    public function findForEmail(string $email): ?UserPasswordReset;

    public function deleteForEmail(string $email);
}
