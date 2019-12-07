@extends('layouts.dashboard')
@section('title')
    مشاهده آزمون {{$quiz->title}}
@endsection
@section('content')

    @foreach ($quiz->questions as $question)
        <div class="tile">
            <h5 class="yekan">
            	{{$question->position}} )
            	{{$question->body}}
            </h5>
            <div class="text-muted">
            	{!! $question->info !!}
            </div>

            <hr>

            @if ($question->type == 'multiple_choices')
            	<div class="row justify-content-center">
            		@foreach ($question->get_choices as $choice)
            			<div class="col-md-3">
                            <div class="card card-body">
                                {{$choice->content}}
                            </div>
                        </div>
            		@endforeach
            	</div>
            @endif

        </div>
    @endforeach

@endsection
