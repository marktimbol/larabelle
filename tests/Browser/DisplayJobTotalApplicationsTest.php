<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DisplayJobTotalApplicationsTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_it_displays_the_total_number_of_applicants_on_a_job_posting()
    {
        $job = $this->createJob([
            'title' => 'Web Developer',
            'slug'  => 'web-developer'
        ]);

        $this->createUser([
            'name'  => 'John'
        ])->applyTo($job);     

        $this->createUser([
            'name'  => 'Jane'
        ])->applyTo($job);

        $this->browse(function($browser) use ($job) {
            $browser->visit($job->url())
                ->assertSee('2 Applicants');
        });
    }
}
