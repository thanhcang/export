<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Events\SendEmailEvent;
use App\Helpers\Lang\Lang;
use App\Http\Controllers\Api\ApiController;
use App\Repositories\Contracts\UserRepoContract;
use App\Repositories\UserEmailVerifyRepo;
use Illuminate\Http\Request;

class Register extends ApiController
{
    public function __invoke(Request $request, UserRepoContract $userRepo, UserEmailVerifyRepo $emailVerifyRepo)
    {
        $rules = [
            'name'     => 'required|string',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string'
        ];

        $this->apiValidate($request, $rules);
        $user = $userRepo->add($request->merge(['role_id' => 1])->only(['name', 'email', 'password', 'role_id']));

        $emailToken = $emailVerifyRepo->add([
            'user_id' => $user->id,
            'token'   => ''
        ]);

        event(new SendEmailEvent($user, $emailToken));
        return $this->render(Lang::get('register.success'));
    }

}
