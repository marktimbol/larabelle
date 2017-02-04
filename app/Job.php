<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	protected $fillable = ['title', 'desc'];

    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function setTitleAttribute($title)
    {
    	$this->attributes['title'] = $title;
    	$this->attributes['slug'] = str_slug($title);
    }

    public function employer()
    {
    	return $this->belongsTo(Employer::class);
    }

    public function applicants()
    {
        return $this->belongsToMany(User::class, 'user_jobs', 'job_id', 'user_id');
    }    
}
