@extends('layouts.dashboard')
@section('title')
    @lang('COURSES')
@endsection
@section('content')

    <div class="tile">
		<div class="row justify-content-end">
			<div class="col-md-2">
				<a href="{{route('course.create')}}" class="btn btn-primary btn-round">
					<i class="fa fa-plus mr-1"></i>
					@lang('NEW_COURSE')
				</a>
			</div>
		</div>
    </div>

	<div class="tile">

	</div>

@endsection
