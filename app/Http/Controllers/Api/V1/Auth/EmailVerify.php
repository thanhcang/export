<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\Contracts\UserRepoContract;
use App\Repositories\Contracts\UserVerifyEmailRepoContract;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EmailVerify extends ApiController
{
    public function __invoke(
        Request $request,
        UserVerifyEmailRepoContract $emailRepoContract,
        UserRepoContract $userRepoContract
    ) {
        $this->apiValidate($request, ['token' => 'required']);

        $userVerify = $emailRepoContract->findForToken($request->get('token'));

        if ($userVerify === null) {
            return $this->render404();
        }

        $userRepoContract->update($userVerify->user_id, [
            'verified'          => 1,
            'email_verified_at' => Carbon::now()
        ]);

        $emailRepoContract->delete($userVerify->user_id);
        return $this->render();
    }

}
