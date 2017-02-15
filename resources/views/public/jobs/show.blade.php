<!-- located in resources/views/jobs/show.blade.php -->

@extends('public.layouts.app')

@section('content')
	<h1>{{ $job->title }}</h1>
	{!! $job->description !!}

	<form method="POST" action="{{ route('jobs.apply', $job->slug) }}">
		{{ csrf_field() }}
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Apply</button>
		</div>
	</form>

	<p>{{ $applicants_count }} Applicants</p>

	<div>
		<h3>{{ $job->employer->name }}</h3>
	</div>
@endsection