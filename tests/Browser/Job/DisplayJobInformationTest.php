<?php

namespace Tests\Browser\Job;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DisplayJobInformationTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_it_displays_the_job_information()
    {
        $employer = $this->createEmployer([
            'name'  => 'Facebook LLC'
        ]);

        $job = $this->createJob([
            'employer_id'   => $employer->id,
            'title' => 'Web Developer',
            'description'  => 'The job description'
        ]);

        $this->browse(function($browser) use ($job) {
            $browser->visit($job->url())
                ->assertSee('Web Developer')
                ->assertSee('The job description')
                ->assertSee('Facebook');
        });
    }
}
