@extends('layouts.dashboard')
@section('title')
    @if($course->id) @lang('EDIT') {{$course->title}} @else @lang('NEW_COURSE') @endif
@endsection
@section('content')

    <div class="tile">
		<div class="row justify-content-end">
			<div class="col-md-2">
				<a href="{{route('course.index')}}" class="btn btn-info btn-round">
					<i class="fa fa-list ml-1"></i>
					@lang('LIST_ALL_COURSES')
				</a>
			</div>
		</div>
    </div>

	<div class="tile">
        <form class="row" action="{{route('course.store')}}" method="post">
			@csrf

			<div class="col-md-3 form-group">
				<label for="title"> @lang('TITLE') </label>
				<input type="text" class="form-control" name="title" id="title" value="{{old('title') ?? $course->title}}">
			</div>

			<div class="col-md-3 form-group">
				<label for="type"> @lang('COURSE_TYPE') </label>
				<select class="form-control" id="type" name="type">
                    <option value="online">@lang('ONLINE')</option>
                    <option value="workshop">@lang('WORKSHOP')</option>
                </select>
			</div>

		</form>
	</div>

@endsection
