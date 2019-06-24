<?php


namespace App\Repositories;


use App\Models\Auth\UserPasswordReset;
use App\Repositories\Conditions\UserCondition;
use App\Repositories\Contracts\UserResetPasswordContract;

class UserResetPasswordRepo extends BaseRepo implements UserResetPasswordContract
{
    use UserCondition;

    public function __construct(UserPasswordReset $model)
    {
        $this->model = $model;
    }

    public function findForToken(string $token): ?UserPasswordReset
    {
        // TODO: Implement findForToken() method.
        return $this->model->where($this->verifyToken($token))->first();
    }

    public function findForEmail(string $email): ?UserPasswordReset
    {
        // TODO: Implement findForEmail() method.
        return $this->model->where($this->email($email))->first();
    }

    public function deleteForEmail(string $email)
    {
        // TODO: Implement deleteForEmail() method.
        return $this->model->where($this->email($email))->delete();
    }


}
