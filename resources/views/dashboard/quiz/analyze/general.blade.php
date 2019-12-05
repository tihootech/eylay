@extends('layouts.dashboard')
@section('title')
    @lang('GENERAL_ANALYZE') {{$quiz->title}}
@endsection
@section('content')

    <div class="tile text-left">
        <a href="{{route('quiz.index')}}" class="btn btn-primary btn-round">
            <i class="fa fa-list ml-2"></i>
            @lang('LIST_ALL') @lang('QUIZZES')
        </a>
    </div>

	<div class="tile">
        @if ($quiz->fillers->count())

            @include('tables.fillers', ['fillers' => $quiz->fillers, 'single'=>false])

        @else

            <div class="alert alert-warning">
                <i class="fa fa-warning ml-2"></i>
                @lang('NOTHING_FOUND')
            </div>

        @endif
	</div>

@endsection
