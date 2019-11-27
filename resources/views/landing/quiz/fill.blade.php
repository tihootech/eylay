@extends('layouts.landing')
@section('extra_styles')
    <link href="{{asset('assets/css/quiz.css')}}" rel="stylesheet" />
@endsection
@section('title')
    {{$quiz->title}}
@endsection


@section('content')

    <div class="wrapper">
    	<div class="main" id="main-container">
            @include('landing.quiz.quiz_body')
    	</div>
    </div>

@endsection
