<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use Uuids;

    /**
    * Indicates if the IDs are auto-incrementing.
    *
    * @var bool
    */
    public $incrementing = false;

    public function jobs()
    {
    	return $this->hasMany(Job::class);
    }

}
