<?php


namespace App\Repositories\Contracts;


use App\User;

interface UserRepoContract extends ModeContract
{
    public function findForEmail(string $email): ?User;
}
