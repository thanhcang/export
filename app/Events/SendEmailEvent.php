<?php

namespace App\Events;

use App\Models\Auth\UserEmailVerify;
use App\Models\Auth\UserPasswordReset;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class SendEmailEvent
{
    const TYPE_SEND_EMAIL_REGISTER        = 'email.user.register';
    const TYPE_SEND_EMAIL_FORGOT_PASSWORD = 'email.user.forgot.password';

    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var User
     */
    public $user;
    /**
     * @var UserEmailVerify|null
     */
    public $emailVerify;
    /**
     * @var UserPasswordReset
     */
    public $passwordReset;
    /**
     * @var string|null
     */
    public $type;

    /**
     * Create a new event instance.
     *
     * @param User                 $user
     * @param UserEmailVerify|null $emailVerify
     * @param UserPasswordReset    $passwordReset
     * @param null                 $type
     */
    public function __construct(
        User $user,
        UserEmailVerify $emailVerify = null,
        UserPasswordReset $passwordReset = null,
        $type = null
    ) {
        $this->user          = $user;
        $this->emailVerify   = $emailVerify;
        $this->passwordReset = $passwordReset;
        $type === null ? $this->type = self::TYPE_SEND_EMAIL_REGISTER : $this->type = $type;

    }

}
