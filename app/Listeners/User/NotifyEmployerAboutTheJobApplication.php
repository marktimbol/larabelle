<?php

namespace App\Listeners\User;

use App\Events\User\UserAppliedOnAJob;
use App\Mail\Employer\UserJobApplication;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

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
        $user = $event->user;
        $job = $event->job->load('employer');
        $employer = $job->employer;

        // Send email to employer
        Mail::to($employer->email)->send( new UserJobApplication($user, $job) );
    }
}
