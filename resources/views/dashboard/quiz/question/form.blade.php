@extends('layouts.dashboard')
@section('title')
    @if($question->id)
        @lang('EDIT') @lang('QUESTION') : {{$question->title}}
    @else
        @lang('NEW_QUESTION') : @lang(strtoupper($type))
    @endif
@endsection
@section('content')

    <div class="tile text-left">
        <a href="{{route('quiz.show', $quiz->id)}}" class="btn btn-primary btn-round">
            <i class="fa fa-list ml-2"></i>
            @lang('BACK_TO_QUESTINS_LIST')
        </a>
    </div>

	<form action="{{$question->id ? route('question.update', $question->id) : route('question.store')}}" method="post">

        @csrf
        @if ($question->id)
            @method('PUT')
        @endif
        <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
        <input type="hidden" name="type" value="{{$type}}">

        <div class="tile">

            <div class="row justify-content-center">

                <div class="col-md-12 form-group">
    				<label for="body"> @lang('QUESTION_BODY') </label>
    				<input type="text" class="form-control" name="body" id="body" value="{{old('body') ?? $question->body}}" required>
    			</div>

                <div class="col-md-3 form-group">
                    <label for="title"> @lang('TITLE') </label>
                    <input type="text" class="form-control" name="title" id="title" value="{{old('title') ?? $question->title}}" required>
                </div>

                <div class="col-md-3 form-group">
                    <label for="button"> @lang('BUTTON') </label>
                    <input type="text" class="form-control" name="button" id="button" value="{{old('button') ?? $question->button}}">
                </div>

                @if ($type != 'message' && $type != 'multiple_choices')
                    <div class="col-md-2 form-group">
                        <label for="min"> @lang('MIN') </label>
                        <input type="text" class="form-control" name="min" id="min" value="{{old('min') ?? $question->min}}">
                    </div>

                    <div class="col-md-2 form-group">
                        <label for="max"> @lang('MAX') </label>
                        <input type="text" class="form-control" name="max" id="max" value="{{old('max') ?? $question->max}}">
                    </div>
                @endif

                <div class="col-md-12 form-group">
    				<label for="info"> @lang('INFO') </label>
    				<textarea name="info" id="info" rows="4" class="form-control">{{old('info') ?? $question->info}}</textarea>
    			</div>

                @if ($type == 'multiple_choices')
                    <div class="col-md-12 form-group">
        				<label for="reason"> @lang('WHY_THIS_CHOICE_IS_CORRECT') </label>
        				<textarea name="reason" id="reason" rows="4" class="form-control">{{old('reason') ?? $question->reason}}</textarea>
        			</div>
                @endif

                <input type="hidden" name="required" value="0">
                <div class="col-md-4 form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="required" id="required" value="1"
                            @if(!$question->id || $question->required) checked @endif>
                        <label class="custom-control-label" for="required">
                            <span class="mr-2"> @lang('REQUIRED') </span>
                        </label>
                    </div>
                </div>
                @if ($type == 'multiple_choices')
                    <input type="hidden" name="randomize" value="0">
                    <div class="col-md-4 form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="randomize" id="randomize" value="1"
                                @if(!$question->id || $question->randomize) checked @endif>
                            <label class="custom-control-label" for="randomize">
                                <span class="mr-2"> @lang('RANDOMIZE') </span>
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="multiple" value="0">
                    <div class="col-md-4 form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="multiple" id="multiple" value="1" disabled>
                            <label class="custom-control-label" for="multiple">
                                <span class="mr-2"> @lang('MULTIPLE_ANSWERS') </span>
                            </label>
                        </div>
                    </div>
                @endif

                @unless ($type == 'multiple_choices')
                    <hr class="w-100">
                    <div class="col-md-2 mx-auto">
                        <button type="submit" class="btn btn-primary btn-block"> @lang('SAVE') </button>
                    </div>
                @endunless

    		</div>

    	</div>

        @if ($type == 'multiple_choices')
            <div class="tile">
                <div class="row">
                    <div class="col-md-8 my-2 text-center text-md-right">
                        <h3> مدیریت گزینه ها </h3>
                    </div>
                    <div class="col-md-4 my-2 text-center text-md-left">
                        <button type="button" class="btn btn-success" data-action="clone" data-target="#choices-container">
                            <i class="fa fa-plus ml-2"></i>
                            @lang('NEW_CHOICE')
                        </button>
                    </div>
                </div>
                <hr>
                <div id="choices-container">
                    @foreach ($choices as $i => $choice)
                        <div class="row" data-row="{{$i}}">
                            <div class="col-md-2 form-group">
                                <label> @lang('POSITION') </label>
                                <input type="number" class="form-control" name="choices[position][]" value="{{$choice->position}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label> @lang('CHOICE_TEXT') </label>
                                <input type="text" class="form-control" name="choices[content][]" value="{{$choice->content}}" required>
                            </div>
                            <div class="col-md-2 form-group">
                                <label> @lang('CORRECT_CHOICE') </label>
                                <select class="form-control" name="choices[correct][]">
                                    <option value="0">خیر</option>
                                    <option value="1" @if($choice->correct) selected @endif>بلی</option>
                                </select>
                            </div>
                            <div class="col-md-2 align-self-center text-center">
                                <button type="button" class="btn btn-link text-danger" data-action="unclone">
                                    <i class="fa fa-times fa-2x-important"></i>
                                </button>
                            </div>
                            <hr class="col-12">
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if ($type == 'multiple_choices')
            <div class="tile">
                <div class="row">
                    <div class="col-md-2 mx-auto">
                        <button type="submit" class="btn btn-primary btn-block"> @lang('SAVE') </button>
                    </div>
                </div>
            </div>
        @endif

    </form>

@endsection
