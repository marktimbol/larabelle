<?php

namespace Tests;

use App\Job;
use App\User;
use App\Employer;
use Illuminate\Contracts\Console\Kernel;

trait CreateModels
{

    protected function createUser($attributes = null)
    {
        return factory(User::class)->create($attributes);
    }

    protected function createEmployer($attributes = null)
    {
        return factory(Employer::class)->create($attributes);
    }
    
    protected function createJob($attributes = null)
    {
        return factory(Job::class)->create($attributes);
    }
}
