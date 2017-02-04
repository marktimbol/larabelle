<?php

namespace App\Http\Controllers\User;

use App\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\User\UserAppliedOnAJob;

class UserJobApplicationsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function store(Request $request, Job $job)
    {
    	$user = auth()->user();
    	$user->applyTo($job);
        
        event( new UserAppliedOnAJob($user, $job) );

    	return response()->json([
            'success'   => true,
            'job'   => $job,
        ]);
    }
}
