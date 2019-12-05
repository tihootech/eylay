@extends('layouts.landing')
@section('body_class') blog-posts @endsection
@section('title')
    {{$quiz->title}}
@endsection


@section('content')

    <div class="page-header header-filter header-small" data-parallax="true" style="background-image:url('{{asset($quiz->bg)}}')">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<h1 class="title"> {{$quiz->title}} </h1>
				</div>
			</div>
		</div>
	</div>

	<div class="main main-raised">
		<div class="container">
			<div class="section text-center">

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <div class="card card-blog">
                            <div class="card-image">
                                <a href="#pablo">
                                    <img class="img" src="{{asset($quiz->image)}}" alt="{{$quiz->title}}" />
                                </a>
                            </div>

                            <div class="card-content">
                                <p class="category text-primary"> تعداد سوالات : {{$quiz->questions->count()}} </p>

                                <h4 class="card-title">
                        			{{$quiz->title}}
                        		</h4>
                                <p class="card-description">
                                    {{$quiz->info}}
                                    <hr>
                                    @if ($quiz->active || master())
                                        @guest
                                            <a class="btn btn-primary btn-round" disabled>
                                                <i class="material-icons ml-2">add_alarm</i> شروع پاسخ دهی
                                            </a>
                                            <div class="text-danger">
                                                <i class="fa fa-warning ml-2"></i>
                                                برای پاسخ دهی به این آزمون باید وارد حساب کاربری خود شده باشید.
                                            </div>
                                        @else
                                            <a href="{{route('quiz.fill', $quiz->uid)}}" class="btn btn-primary btn-round" rel="nofollow">
                                                <i class="material-icons ml-2">add_alarm</i> شروع پاسخ دهی
                                            </a>
                                        @endguest
                                    @else
                                        <div class="alert alert-danger mt-4">
                                            <i class="fa fa-warning ml-2"></i>
                                            متاسفانه این آزمون دیگر فعال نیست.
                                        </div>
                                    @endif
                                    @if (session('error'))
                                    	<div class="alert alert-danger mt-4" role="alert">
                                            <i class="fa fa-warning ml-2"></i>
                                    		{{ session('error') }}
                                    	</div>
                                    @endif
                                </p>
                                <hr>
                                <div class="footer">
                                    <div class="author">
                                        <a href="#pablo">
                                            <img src="{{asset('assets/img/me.jpg')}}" alt="علی صیفی" class="avatar img-raised">
                                            <span class="text-info"> طراح : </span>
                                            <span>علی صیفی</span>
                                        </a>
                                    </div>
                                    <div class="stats" data-toggle="tooltip" title="زمان تخمینی مورد نیاز برای پاسخ دهی">
                                        <i class="material-icons">schedule</i> {{$quiz->max_time}} دقیقه
                                    </div>
                                    <div class="stats pull-left" data-toggle="tooltip" title="تعداد افرادی که تا کنون به این آزمون پاسخ داده اند.">
                                        <i class="material-icons">group</i>
                                        {{$quiz->fillers->count()}} نفر
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

			</div>
		</div>
    </div>

    @include('includes.footer')

@endsection
