<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Events\SendEmailEvent;
use App\Helpers\Lang\Lang;
use App\Http\Controllers\Api\ApiController;
use App\Models\Auth\UserEmailVerify;
use App\Repositories\Contracts\UserRepoContract;
use App\Repositories\Contracts\UserResetPasswordContract;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ForgotPasswordController extends ApiController
{
    public function handle(
        Request $request,
        UserResetPasswordContract $repo,
        UserRepoContract $userRepo
    ) {
        $this->apiValidate($request, [
            'email' => 'required|string|email'
        ]);

        $user = $userRepo->findForEmail($request->get('email'));
        if ($user === null) {
            return $this->render(Lang::get('passwords.email_is_not_exists'), config('api.code.users.email_is_not_exists'), false, Response::HTTP_UNAUTHORIZED);
        }

        $forgotPassword = $repo->findForEmail($request->get('email'));

        if ($forgotPassword === null) {
            $request->merge(['token' => '']);
            $forgotPassword = $repo->add($request->only(['email', 'token']));
        }

        $userRepo->update($user->id, ['remember_token' => null]);
        event(new SendEmailEvent($user, new UserEmailVerify(), $forgotPassword, SendEmailEvent::TYPE_SEND_EMAIL_FORGOT_PASSWORD));
        return $this->render();
    }
}
