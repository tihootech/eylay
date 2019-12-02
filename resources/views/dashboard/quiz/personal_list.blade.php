@extends('layouts.dashboard')
@section('title')
    @lang('QUIZZES_RESULT')
@endsection
@section('content')

	<div class="tile">
        @if ($list->count())

            <div class="table-responsive-md">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col"> @lang('ROW') </th>
                            <th scope="col"> @lang('QUIZ') </th>
                            <th scope="col"> @lang('CORRECTS') </th>
                            <th scope="col"> @lang('WRONGS') </th>
                            <th scope="col"> @lang('TIME_LENGTH') </th>
                            <th scope="col"> @lang('PERCENTAGE') </th>
                            <th scope="col"> @lang('DATE') </th>
                            <th scope="col"> @lang('OPERATIONS') </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $i => $item)
                            <tr>
                                <th scope="row"> {{$i+1}} </th>
                                <td> <a href="{{route('quiz.preview', $item->quiz->title)}}" target="_blank"> {{$item->quiz->title}} </a> </td>
                                <td> {{$item->quiz->type == 'quiz' ? $item->corrects : '-'}} </td>
                                <td> {{$item->quiz->type == 'quiz' ? $item->wrongs : '-'}} </td>
                                <td> {{human_time($item->time)}} </td>
                                <td> {{$item->quiz->type == 'quiz' ? $item->percentage.'%' : '-'}} </td>
                                <td> {{date_picker_date($item->created_at)}} </td>
                                <td>
                                    <a href="{{route('quiz.analyze', [$item->quiz->uid, $item->uid])}}" class="btn btn-round btn-outline-primary">
                                        <i class="fa fa-line-chart ml-2"></i>
                                        @lang('ANALYZE')
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{$list->links()}}
        @else

            <div class="alert alert-warning">
                <i class="fa fa-warning ml-2"></i>
                @lang('NOTHING_FOUND')
            </div>

        @endif
	</div>

@endsection
