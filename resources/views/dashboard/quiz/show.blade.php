@extends('layouts.dashboard')
@section('title')
    @lang('MANAGE') {{$quiz->title}}
@endsection
@section('content')

    <div class="tile text-left">
        <a href="{{route('quiz.index')}}" class="btn btn-primary btn-round mx-1">
            <i class="fa fa-list ml-2"></i>
            @lang('LIST_ALL') @lang('QUIZZES')
        </a>
        <a href="{{route('quiz.edit', $quiz->id)}}" class="btn btn-success btn-round mx-1">
            <i class="fa fa-edit ml-2"></i>
            @lang('EDIT') @lang('QUIZ')
        </a>
        <a href="{{route('quiz.preview', urf($quiz->title))}}" class="btn btn-info btn-round mx-1" target="_blank">
            <i class="fa fa-eye ml-2"></i>
            @lang('PREVIEW')
        </a>
    </div>

	<div class="tile">
        <div class="text-center">
            @foreach ($question_types as $type)
                <a href="{{route('question.create')}}?quiz={{$quiz->id}}&type={{$type}}" class="btn btn-info btn-round mx-1">
                    <i class="fa fa-plus ml-2"></i>
                    @lang(strtoupper($type))
                </a>
            @endforeach
        </div>
        <hr>
        <h2 class="mb-4"> @lang('QUESTIONS_LIST') </h2>
        @if ($quiz->questions->count())
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col"> @lang('POSITION') </th>
                        <th scope="col"> <i class="fa fa-arrows"></i> </th>
                        <th scope="col"> @lang('TITLE') </th>
                        <th scope="col"> @lang('QUESTION_BODY') </th>
                        <th scope="col"> @lang('TYPE') </th>
                        <th scope="col"> @lang('REQUIRED') </th>
                        <th scope="col" colspan="2"> @lang('OPERATIONS') </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quiz->questions as $i => $question)
                        <tr>
                            <th scope="row"> {{$question->position}} </th>
                            <td> <i class="fa fa-arrows pointer text-muted"></i> </td>
                            <td> {{$question->title}} </td>
                            <td> {{short($question->body)}} </td>
                            <td> {{__(strtoupper($question->type))}} </td>
                            <td> @include('dashboard.partials.yesno', ['boolean' => $question->required]) </td>
                            <td>
                                <a href="{{route('question.edit', $question->id)}}" class="btn btn-round btn-outline-success">
                                    <i class="fa fa-edit ml-2"></i>
                                    @lang('EDIT')
                                </a>
                            </td>
                            <td>
                                <form class="d-inline" action="{{route('question.destroy', $question->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-round btn-outline-danger delete">
                                        <i class="fa fa-trash ml-2"></i>
                                        @lang('DELETE')
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else

            <div class="alert alert-warning">
                <i class="fa fa-warning ml-2"></i>
                @lang('NOTHING_FOUND')
            </div>

        @endif
	</div>

@endsection
