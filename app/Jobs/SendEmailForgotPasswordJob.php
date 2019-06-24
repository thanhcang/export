<?php

namespace App\Jobs;

use App\Models\Auth\UserEmailVerify;
use App\Models\Auth\UserPasswordReset;
use App\Notifications\ForgotPassword;
use App\Notifications\RegisterUser;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendEmailForgotPasswordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var User
     * php artisan queue:work --queue=emails
     */
    private $user;

    /**
     * @var UserPasswordReset
     */
    private $userPasswordReset;

    /**
     * Create a new job instance.
     *
     * @param User              $user
     * @param UserPasswordReset $userPasswordReset
     */
    public function __construct(User $user, UserPasswordReset $userPasswordReset)
    {
        $this->user              = $user;
        $this->userPasswordReset = $userPasswordReset;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $message = (new ForgotPassword($this->user, $this->userPasswordReset))
            ->onQueue(config('queue.names.emails'));

        Mail::to($this->user)->queue($message);
    }
}
