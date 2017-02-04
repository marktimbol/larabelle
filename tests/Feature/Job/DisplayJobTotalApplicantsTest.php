<?php

namespace Tests\Feature\Job;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DisplayJobTotalApplicantsTest extends TestCase
{
	use DatabaseTransactions;

	public function setUp()
	{
		parent::setUp();
	}

    public function test_display_job_total_applicants()
    {
    	$job = $this->createJob
        ([
    		'title'	=> 'Web Developer'
    	]);

    	$john = $this->createUser([
    		'name'	=> 'John'
    	]);

    	$john->applyTo($job);

    	$jane = $this->createUser([
    		'name'	=> 'Jane'
    	]);

    	$jane->applyTo($job);

    	$this->visit("/jobs/$job->slug")
    		->see('2 Applicants');
    }
}
