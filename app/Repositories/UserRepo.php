<?php


namespace App\Repositories;


use App\Repositories\Conditions\UserCondition;
use App\Repositories\Contracts\UserRepoContract;
use App\User;

class UserRepo extends BaseRepo implements UserRepoContract
{
    use UserCondition;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function findForEmail(string $email): ?User
    {
        return $this->model->where($this->verified())->where($this->email($email))->first();
    }
}
