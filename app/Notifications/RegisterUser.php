<?php

namespace App\Notifications;

use App\Models\Auth\UserEmailVerify;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class RegisterUser extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    /**
     * @var User
     */
    public $user;
    /**
     * @var UserEmailVerify
     */
    private $emailVerify;

    /**
     * Create a new notification instance.
     *
     * @param User            $user
     * @param UserEmailVerify $emailVerify
     */
    public function __construct(User $user, UserEmailVerify $emailVerify)
    {
        $this->user        = $user;
        $this->emailVerify = $emailVerify;
    }

    public function build()
    {
        return $this->view('emails.register')->with([
            'url' => urlClient("auth/verify/{$this->emailVerify->token}")
        ]);
    }
}
