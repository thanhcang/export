<?php

namespace App\Jobs;

use App\Models\Auth\UserEmailVerify;
use App\Notifications\RegisterUser;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendEmailVerifyUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var User
     * php artisan queue:work --queue=emails
     */
    private $user;
    /**
     * @var UserEmailVerify
     */
    private $emailVerify;

    /**
     * Create a new job instance.
     *
     * @param User            $user
     * @param UserEmailVerify $emailVerify
     */
    public function __construct(User $user, UserEmailVerify $emailVerify)
    {
        $this->user        = $user;
        $this->emailVerify = $emailVerify;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $message = (new RegisterUser($this->user, $this->emailVerify))
            ->onQueue(config('queue.names.emails'));

        Mail::to($this->user)->queue($message);
    }
}
