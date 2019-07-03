<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Helpers\Lang\Lang;
use App\Http\Controllers\Api\ApiController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Login extends ApiController
{
    public function __invoke(Request $request)
    {
        $this->apiValidate($request, [
            'email'       => 'required|string|email',
            'password'    => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return $this->render(Lang::get('login.fail'), config('api.code.users.email_password_incorrect'), false);
        }

        if ((int) auth()->user()->verified !== User::USER_VERIFIED) {
            return $this->render(Lang::get('login.email_have_not_verify'), config('api.code.users.email_have_not_verify'), false);
        }

        $user         = $request->user();
        $user->active = 1;
        $user->save();

        $tokenResult = $user->createToken(config('app.name'));
        $token       = $tokenResult->token;

        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        $this->push('access_token', $tokenResult->accessToken);
        $this->push('token_type', 'Bearer');
        $this->push('expires_at', Carbon::parse($tokenResult->token->expires_at)->toDateTimeString());

        return $this->render();
    }
}
