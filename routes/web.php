<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/jobs/{job}', [
	'as' => 'jobs.apply',
	'uses' => 'User\UserJobApplicationsController@store'
]);

Route::resource('jobs', 'JobsController', [
	'only'	=> ['index', 'show']
]);