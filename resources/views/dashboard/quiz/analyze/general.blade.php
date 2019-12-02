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

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col"> @lang('ROW') </th>
                            <th scope="col"> پاسخ دهنده </th>
                            @foreach ($quiz->questions as $question)
                                <th scope="col"> {{$question->title}} </th>
                            @endforeach
                            <th scope="col" colspan="6"> @lang('OPERATIONS') </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quiz->fillers as $i => $filler)
                            <tr>
                                <th scope="row"> {{$i+1}} </th>
                                <td> <a href="#"> {{$filler->user->name ?? 'Database Error'}} </a> </td>
                                @foreach ($quiz->questions as $question)
                                    <td> {{$question->filler_answer($filler->id)}} </td>
                                @endforeach
                                <td>
                                    <form class="d-inline" action="{{route('quiz.destroy_filler', $filler->id)}}" method="post">
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
            </div>

        @else

            <div class="alert alert-warning">
                <i class="fa fa-warning ml-2"></i>
                @lang('NOTHING_FOUND')
            </div>

        @endif
	</div>

@endsection
