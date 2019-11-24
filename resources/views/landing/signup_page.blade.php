@extends('layouts.landing')
@section('body_class') blog-posts @endsection
@section('title')
    Eylay | ثبت نام در دوره های آموزشی
@endsection
@section('content')
	<div class="page-header header-filter header-small signup-bg" data-parallax="true">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<h1 class="title"> ثبت نام در دوره های آموزشی </h1>
				</div>
			</div>
		</div>
	</div>

	<div class="main main-raised">
		<div class="container">
			<div class="section">


                <div class="card card-nav-tabs">
                    <div class="header header-primary">
                        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#registering" data-toggle="tab">
                                            <i class="material-icons">input</i> @lang('REGISTERING')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#performing" data-toggle="tab">
                                            <i class="material-icons">record_voice_over</i> @lang('PERFORMING')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#closed" data-toggle="tab">
                                            <i class="material-icons">done_all</i> @lang('CLOSED')
                                        </a>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="tab-content text-center">
                            <div class="tab-pane active" id="registering">
                                @if ($registering_courses->count())
                                    @foreach ($registering_courses as $course)
                    					@include('landing.partials.signup')
                    				@endforeach
                                @else
                                    <div class="alert alert-warning">
                                        <i class="fa fa-warning ml-2"></i>
                                        در حال حاضر هیچ دوره ای
                                        برای ثبت نام وجود ندارد.
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane" id="performing">

                                @if ($performing_courses->count())
                                    @foreach ($performing_courses as $course)
                    					@include('landing.partials.signup')
                    				@endforeach
                                @else
                                    <div class="alert alert-warning">
                                        <i class="fa fa-warning ml-2"></i>
                                        در حال حاضر هیچ دوره ای
                                        در حال برگزاری نیست!
                                    </div>
                                @endif

                            </div>
                            <div class="tab-pane" id="closed">

                                @if ($closed_courses->count())
                                    @foreach ($closed_courses as $course)
                    					@include('landing.partials.signup')
                    				@endforeach
                                @else
                                    <div class="alert alert-warning">
                                        <i class="fa fa-warning ml-2"></i>
                                        موردی یافت نشد.
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>

	@include('includes.footer')
@endsection
