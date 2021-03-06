@extends('layouts.dashboard')
@section('title')
    @if($course->id) @lang('EDIT') {{$course->title}} @else @lang('NEW_COURSE') @endif
@endsection
@section('content')

    <div class="tile text-left">
        <a href="{{route('course.index')}}" class="btn btn-primary btn-round">
            <i class="fa fa-list ml-2"></i>
            @lang('LIST_ALL') @lang('COURSES')
        </a>
    </div>

	<div class="tile">
        <form class="row" action="{{$course->id ? route('course.update', $course->id) : route('course.store')}}" method="post" enctype="multipart/form-data">
			@csrf
            @if ($course->id)
                @method('PUT')
            @endif
			<div class="col-md-3 form-group">
				<label for="title"> @lang('TITLE') </label>
				<input type="text" class="form-control" name="title" id="title" value="{{old('title') ?? $course->title}}" required>
			</div>

            <div class="col-md-3 form-group">
				<label for="supertitle"> @lang('SUPERTITLE') </label>
				<input type="text" class="form-control" name="supertitle" id="supertitle" value="{{old('supertitle') ?? $course->supertitle}}" required>
			</div>

            <div class="col-md-3 form-group">
				<label for="subtitle"> @lang('SUBTITLE') </label>
				<input type="text" class="form-control" name="subtitle" id="subtitle" value="{{old('subtitle') ?? $course->subtitle}}" required>
			</div>

            <div class="col-md-3 form-group">
				<label for="step"> @lang('STEP') </label>
				<input type="number" class="form-control" name="step" id="step" value="{{old('step') ?? $course->step ?? 1}}">
			</div>

            <div class="col-md-3 form-group">
				<label for="status"> @lang('STATUS') </label>
                <select class="form-control" name="status" id="status" required>
                    <option value="registering" @if(old('status') ?? $course->status == 'registering') @endif>
                        @lang(strtoupper('registering'))
                    </option>
                    <option value="performing" @if(old('status') ?? $course->status == 'performing') @endif>
                        @lang(strtoupper('performing'))
                    </option>
                    <option value="closed" @if(old('status') ?? $course->status == 'closed') @endif>
                        @lang(strtoupper('closed'))
                    </option>
                </select>
			</div>

            <div class="col-md-3 form-group">
				<label for="image"> @lang('IMAGE') </label>
				<input type="file" class="form-control" name="image" id="image" @unless($course->id) required @endunless>
			</div>

            <div class="col-md-3 form-group">
				<label for="bg"> @lang('BG') </label>
				<input type="file" class="form-control" name="bg" id="bg">
			</div>

            <div class="col-md-12 form-group">
				<label for="info"> @lang('INFO') </label>
				<textarea name="info" id="info" rows="4" class="form-control" required>{{old('info') ?? $course->info}}</textarea>
			</div>

            <hr class="w-100">
            <div class="col-md-2 mx-auto">
                <button type="submit" class="btn btn-primary btn-block"> @lang('SAVE') </button>
            </div>

		</form>
	</div>

    @include('dashboard.partials.display_images', ['object' => $course])

@endsection
