<?php

namespace App\Notifications;

use App\Models\Auth\UserEmailVerify;
use App\Models\Auth\UserPasswordReset;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    /**
     * @var User
     */
    public $user;
    /**
     * @var UserPasswordReset
     */
    private $passwordReset;

    /**
     * Create a new notification instance.
     *
     * @param User              $user
     * @param UserPasswordReset $passwordReset
     */
    public function __construct(User $user, UserPasswordReset $passwordReset)
    {
        $this->user          = $user;
        $this->passwordReset = $passwordReset;
    }

    public function build()
    {
        return $this->view('emails.forgetpassword')->with([
            'url' => urlClient("auth/password/reset/{$this->passwordReset->token}")
        ]);
    }
}
