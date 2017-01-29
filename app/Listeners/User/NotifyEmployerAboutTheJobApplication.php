<?php

namespace App\Listeners\User;

use App\Events\User\UserAppliedOnAJob;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyEmployerAboutTheJobApplication
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
     * @param  UserAppliedOnAJob  $event
     * @return void
     */
    public function handle(UserAppliedOnAJob $event)
    {

    }
}
