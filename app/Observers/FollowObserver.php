<?php

namespace App\Observers;

use App\AppModelsIdentityFollow;

class FollowObserver
{
    /**
     * Handle the app models identity follow "created" event.
     *
     * @param  \App\AppModelsIdentityFollow  $appModelsIdentityFollow
     * @return void
     */
    public function created(AppModelsIdentityFollow $appModelsIdentityFollow)
    {
        //
    }

    /**
     * Handle the app models identity follow "updated" event.
     *
     * @param  \App\AppModelsIdentityFollow  $appModelsIdentityFollow
     * @return void
     */
    public function updated(AppModelsIdentityFollow $appModelsIdentityFollow)
    {
        //
    }

    /**
     * Handle the app models identity follow "deleted" event.
     *
     * @param  \App\AppModelsIdentityFollow  $appModelsIdentityFollow
     * @return void
     */
    public function deleted(AppModelsIdentityFollow $appModelsIdentityFollow)
    {
        //
    }

    /**
     * Handle the app models identity follow "restored" event.
     *
     * @param  \App\AppModelsIdentityFollow  $appModelsIdentityFollow
     * @return void
     */
    public function restored(AppModelsIdentityFollow $appModelsIdentityFollow)
    {
        //
    }

    /**
     * Handle the app models identity follow "force deleted" event.
     *
     * @param  \App\AppModelsIdentityFollow  $appModelsIdentityFollow
     * @return void
     */
    public function forceDeleted(AppModelsIdentityFollow $appModelsIdentityFollow)
    {
        //
    }
}
