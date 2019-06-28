<?php


namespace App\Repositories\Contracts;


use App\User;

interface UserRepoContract extends ModelContract
{
    public function findForEmail(string $email): ?User;
}
