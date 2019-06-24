<?php

namespace App\Listeners;

use App\Events\SendEmailEvent;
use App\Jobs\SendEmailForgotPasswordJob;
use App\Jobs\SendEmailVerifyUserJob;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param SendEmailEvent $event
     * @return void
     */
    public function handle(SendEmailEvent $event)
    {

    }

    public function subscribe($events)
    {
        $events->listen(
            SendEmailEvent::class, 'App\Listeners\SendEmailListener@register'
        );

        $events->listen(
            SendEmailEvent::class, 'App\Listeners\SendEmailListener@forgetPassword'
        );
    }

    public function register(SendEmailEvent $event)
    {
        if ($event->type === SendEmailEvent::TYPE_SEND_EMAIL_REGISTER) {
            dispatch(new SendEmailVerifyUserJob($event->user, $event->emailVerify));
        }
    }

    public function forgetPassword(SendEmailEvent $event)
    {
        if ($event->type === SendEmailEvent::TYPE_SEND_EMAIL_FORGOT_PASSWORD) {
            dispatch(new SendEmailForgotPasswordJob($event->user, $event->passwordReset));
        }
    }

}
