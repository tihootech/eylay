@extends('layouts.dashboard')
@section('title')
    @if($quiz->id) @lang('EDIT') {{$quiz->title}} @else @lang('NEW_QUIZ') @endif
@endsection
@section('content')

    <div class="tile text-left">
        <a href="{{route('quiz.index')}}" class="btn btn-primary btn-round">
            <i class="fa fa-list ml-2"></i>
            @lang('LIST_ALL') @lang('QUIZZES')
        </a>
    </div>

	<div class="tile">
        <form class="row" action="{{$quiz->id ? route('quiz.update', $quiz->id) : route('quiz.store')}}" method="post" enctype="multipart/form-data">

            @csrf
            @if ($quiz->id)
                @method('PUT')
            @endif

            <div class="col-md-3 form-group">
				<label for="title"> @lang('TITLE') </label>
				<input type="text" class="form-control" name="title" id="title" value="{{old('title') ?? $quiz->title}}" required>
			</div>

			<div class="col-md-3 form-group">
				<label for="type"> @lang('TYPE') </label>
                <select class="form-control" name="type" id="type">
                    <option> quiz </option>
                    <option @if($quiz->type == 'form') @endif> form </option>
                </select>
			</div>

            <div class="col-md-3 form-group">
				<label for="image"> @lang('IMAGE') </label>
				<input type="file" class="form-control" name="image" id="image">
			</div>

            <div class="col-md-3 form-group">
				<label for="bg"> @lang('BG') </label>
				<input type="file" class="form-control" name="bg" id="bg">
			</div>

            <div class="col-md-3 form-group">
				<label for="button"> @lang('BUTTON') </label>
				<input type="text" class="form-control" name="button" id="button" value="{{old('button') ?? $quiz->button}}">
			</div>

            <div class="col-md-3 form-group">
				<label for="max-time"> @lang('QUIZ_MAX_TIME') </label>
				<input type="text" class="form-control" name="max_time" id="max-time" value="{{old('max_time') ?? $quiz->max_time}}">
			</div>

            <div class="col-md-12 form-group">
				<label for="info"> @lang('INFO') </label>
				<textarea name="info" id="info" rows="4" class="form-control" required>{{old('info') ?? $quiz->info}}</textarea>
			</div>

            <input type="hidden" name="active" value="0">
            <div class="col-md-6">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="active" id="active" value="1"
                        @if(!$quiz->id || $quiz->active) checked @endif>
                    <label class="custom-control-label" for="active">
                        <span class="mr-2"> @lang('ACTIVE') </span>
                    </label>
                </div>
            </div>
            <input type="hidden" name="public" value="0">
            <div class="col-md-6">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="public" id="public" value="1"
                        @if($quiz->public) checked @endif>
                    <label class="custom-control-label" for="public">
                        <span class="mr-2"> @lang('PUBLIC') </span>
                    </label>
                </div>
            </div>

            <hr class="w-100">
            <div class="col-md-2 mx-auto">
                <button type="submit" class="btn btn-primary btn-block"> @lang('SAVE') </button>
            </div>

		</form>
	</div>

    @include('dashboard.partials.display_images', ['object' => $quiz])

@endsection
