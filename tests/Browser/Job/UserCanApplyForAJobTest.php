<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserCanApplyForAJobTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_an_authenticated_user_can_apply_for_a_job()
    {
        $employer = $this->createEmployer([
            'name'  => 'Facebook'
        ]);

        $job = $this->createJob([
            'employer_id'   => $employer->id,
            'title' => 'Web Developer',
            'slug'  => 'web-developer'
        ]);

        $applicant = $this->createUser([
            'name'  => 'Mark Timbol'
        ]);

        $this->browse(function ($browser) use ($applicant, $job) {
            $browser->loginAs($applicant)
                ->visit($job->url())
                ->press('Apply');

            $this->assertDatabaseHas('user_jobs', [
                'user_id'   => $applicant->id,
                'job_id'    => $job->id,
            ]);                    
        });
    }
}
