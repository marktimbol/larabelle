<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function show(Job $job)
    {    	
    	$applicants_count = $job->applicants()->count();
    	
    	return view('public.jobs.show', compact('job', 'applicants_count'));
    }
}
