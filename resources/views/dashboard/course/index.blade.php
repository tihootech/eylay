@extends('layouts.dashboard')
@section('title')
    <title>@lang('COURSES')</title>
@endsection
@section('content')

    <div class="card card-body">
		<div class="row justify-content-end">
			<div class="col-md-2">
				<a href="{{route('course.create')}}" class="btn btn-info btn-round">
					<i class="fa fa-plus mr-1"></i>
					@lang('NEW_COURSE')
				</a>
			</div>
		</div>
    </div>

	<div class="card card-body">

	</div>

@endsection
