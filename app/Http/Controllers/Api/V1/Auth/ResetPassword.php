<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\Contracts\UserRepoContract;
use App\Repositories\Contracts\UserResetPasswordContract;
use Illuminate\Http\Request;

class ResetPassword extends ApiController
{
    public function __invoke(
        Request $request,
        UserResetPasswordContract $repo,
        UserRepoContract $userRepo
    ) {
        $this->apiValidate($request, ['token' => 'required']);

        $row = $repo->findForToken($request->get('token'));
        if ($row === null) {
            return $this->render404();
        }

        $user = $userRepo->findForEmail($row->email);
        $userRepo->update($user->id, $request->only('password'));
        $repo->deleteForEmail($row->email);

        return $this->render();
    }
}
