<?php


namespace App\Repositories;


use App\Models\Auth\UserEmailVerify;
use App\Repositories\Conditions\UserCondition;
use App\Repositories\Contracts\UserVerifyEmailRepoContract;

class UserEmailVerifyRepo extends BaseRepo implements UserVerifyEmailRepoContract
{
    use UserCondition;

    public function __construct(UserEmailVerify $model)
    {
        $this->model = $model;
    }

    public function findForToken(string $token): ?UserEmailVerify
    {
        // TODO: Implement findForToken() method.
        return $this->model->where($this->verifyToken($token))->first();
    }

}
