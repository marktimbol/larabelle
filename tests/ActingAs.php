<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;

trait ActingAs
{
    protected $user;

    protected function actingAsUser($attributes = null)
    {
        $this->user = $this->createUser($attributes);

        $this->actingAs($this->user);
    }
}
