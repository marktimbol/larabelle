<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Events\User\UserAppliedOnAJob;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CanApplyForAJobTest extends TestCase
{
	use DatabaseMigrations;

	public function setUp()
	{
		parent::setUp();

		$this->actingAsUser([
			'name'	=> 'John Doe'
		]);
	}

    public function test_a_user_can_apply_on_the_job_posting()
    {
    	// $this->expectsEvents(UserAppliedOnAJob::class);

    	$employer = $this->createEmployer([
    		'name'	=> 'Facebook'
    	]);

    	$job = $this->createJob([
    		'employer_id'	=> $employer->id,
    		'title'	=> 'Web Developer',
    		'slug'	=> 'web-developer'
    	]);

    	$endpoint = "/jobs/$job->slug";
    	$request = $this->post($endpoint);

    	$this->assertDatabaseHas('user_jobs', [
    		'user_id'	=> $this->user->id,
    		'job_id'	=> $job->id,
    	]);
    }
}
