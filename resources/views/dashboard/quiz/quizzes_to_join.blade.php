@extends('layouts.dashboard')
@section('title')
    @lang('QUIZZES')
@endsection
@section('content')

    <div class="tile">
        <form class="row justify-content-center" method="get">
            <div class="col-md-4">
                <label for="search"> جست و جو در آزمون ها </label>
                <input type="text" name="search" id="search" value="{{request('search')}}" class="form-control">
            </div>
            <div class="col-md-2 mt-auto">
                <button type="submit" class="btn btn-primary btn-block"> <i class="fa fa-search ml-1"></i> جستجو </button>
            </div>
        </form>
    </div>

    @if ($quizzes->count())

        <div class="container">
            <div class="row quizzes-to-join">
                @foreach ($quizzes as $quiz)
                    <div class="col-md-6">
                        <div class="tile">
                            <h3 class="tile-title">{{$quiz->title}}</h3>
                            <div class="tile-body">
                                {{short($quiz->info, 200)}}
                            </div>
                            <div class="tile-footer text-center">
                                <a class="btn btn-primary btn-round" href="{{route('quiz.preview', urf($quiz->title))}}" target="_blank">
                                    <i class="fa fa-user-plus ml-2"></i>
                                    شرکت در آزمون
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{$quizzes->links()}}

    @else

        <div class="tile">
            <div class="alert alert-warning">
                <i class="fa fa-warning ml-2"></i>
                @lang('NOTHING_FOUND')
            </div>
        </div>

    @endif

@endsection
