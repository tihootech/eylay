@extends('layouts.dashboard')
@section('title')
    @lang('QUIZZES')
@endsection
@section('content')

    <div class="tile text-left">
        <a href="{{route('quiz.create')}}" class="btn btn-primary btn-round">
            <i class="fa fa-plus m-0"></i>
            @lang('NEW_QUIZ')
        </a>
    </div>

	<div class="tile">
        @if ($quizzes->count())

            <div class="table-responsive-md">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col"> @lang('ROW') </th>
                            <th scope="col"> @lang('TITLE') </th>
                            <th scope="col"> @lang('TYPE') </th>
                            <th scope="col"> @lang('ACCESS_LEVEL') </th>
                            <th scope="col"> @lang('ACTIVE') </th>
                            <th scope="col"> @lang('PUBLIC') </th>
                            <th scope="col" colspan="6"> @lang('OPERATIONS') </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizzes as $i => $quiz)
                            <tr>
                                <th scope="row"> {{$i+1}} </th>
                                <td> {{$quiz->title}} </td>
                                <td> {{$quiz->type}} </td>
                                <td> {{$quiz->access}} </td>
                                <td> @include('dashboard.partials.yesno', ['boolean' => $quiz->active]) </td>
                                <td> @include('dashboard.partials.yesno', ['boolean' => $quiz->public]) </td>
                                <td>
                                    <a href="{{route('quiz.preview', urf($quiz->title))}}" class="btn btn-outline-info btn-round mx-1" target="_blank">
                                        <i class="fa fa-eye m-0"></i>
                                        {{-- @lang('PREVIEW') --}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('quiz.analyze', $quiz->uid)}}" class="btn btn-outline-info btn-round mx-1">
                                        <i class="fa fa-pie-chart m-0"></i>
                                        {{-- @lang('STATICS') --}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('quiz.general_analyze', $quiz->id)}}" class="btn btn-outline-info btn-round mx-1">
                                        <i class="fa fa-bar-chart m-0"></i>
                                        {{-- @lang('GENERAL_ANALYZE') --}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('quiz.show', $quiz->id)}}" class="btn btn-round btn-outline-primary">
                                        <i class="fa fa-cogs m-0"></i>
                                        {{-- @lang('MANAGE') --}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('quiz.edit', $quiz->id)}}" class="btn btn-round btn-outline-success">
                                        <i class="fa fa-edit m-0"></i>
                                        {{-- @lang('EDIT') --}}
                                    </a>
                                </td>
                                <td>
                                    <form class="d-inline" action="{{route('quiz.destroy', $quiz->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-round btn-outline-danger delete">
                                            <i class="fa fa-trash m-0"></i>
                                            {{-- @lang('DELETE') --}}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @else

            <div class="alert alert-warning">
                <i class="fa fa-warning ml-2"></i>
                @lang('NOTHING_FOUND')
            </div>

        @endif
	</div>

@endsection
