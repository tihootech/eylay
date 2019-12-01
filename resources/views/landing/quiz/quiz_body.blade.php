@isset($process_finished)
	<form class="quiz-container">
@else
	<form class="quiz-container" autocomplete="off" action="{{route('quiz.submit_answer', ['next' , $question->id])}}" method="AJAX" data-target="#main-container">
@endisset
	<header>
		<nav class="navbar navbar-primary">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{url('/')}}">Eylay</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

					<ul class="nav navbar-nav">
						<li class="active mx-2">
							<a href="{{url('/')}}"> <i class="material-icons ml-2">home</i> صفحه اصلی وبسایت </a>
						</li>
						<li class="active mx-2">
							<a href="{{route('dashboard')}}"> <i class="material-icons ml-2">person</i> ناحیه کاربری </a>
						</li>
						<li class="active mx-2">
							<a href="?refresh=1"> <i class="material-icons ml-2">refresh</i> بارگذاری مجدد </a>
						</li>
						<li class="active mx-2">
							<a href="?quit=1"> <i class="material-icons ml-2">power_settings_new</i> خروج از آزمون </a>
						</li>
					</ul>

				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
	</header>

	@isset($process_finished)

		<div class="card quiz-finished text-center">

			<h3 class="yekan text-primary"> تبریک! آزمون خاتمه یافت. </h3>


			@if ($quiz->type == 'quiz')
				<h4> عملکرد : <span class="label label-primary roboto"> {{$filler->percentage}} % </span> </h4>
				<hr>

				<div class="row">
					<div class="col-md-3 col-sm-6">
						<div class="card">
							<div class="card-content content-primary">
								<h4 class="category-social yekan">
									<i class="material-icons ml-2">insert_comment</i> نتیجه آزمون
								</h4>
								<hr>
								<div class="footer">
									<p> تعداد صحیح : <b> {{$filler->corrects}} </b> </p>
									<hr>
									<p> تعداد غلط : <b> {{$filler->wrongs}} </b> </p>
									<hr>
									<p> عملکرد : <b> {{$filler->percentage}} % </b> </p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="card">
							<div class="card-content content-rose">
								<h4 class="category-social yekan">
									<i class="material-icons ml-2">bar_chart</i> مقایسه
								</h4>
								<hr>
								<div class="footer">
									<p> عملکرد شما : <b> {{$filler->percentage}} % </b> </p>
									<hr>
									<p> بهترین عملکرد : <b> {{$quiz->highest('percentage')}} % </b> </p>
									<hr>
									<p> ضعیف ترین عملکرد : <b> {{$quiz->lowest('percentage')}} % </b> </p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="card">
							<div class="card-content content-primary">
								<h4 class="category-social yekan">
									<i class="material-icons ml-2">pie_chart</i> آمار آزمون
								</h4>
								<hr>
								<div class="footer">
									<p> تعداد پاسخ دهی <b> {{$quiz->fillers->count()}} </b> </p>
									<hr>
									<p> تعداد خاتمه یافته : <b> {{$quiz->completes->count()}} </b> </p>
									<hr>
									<p> میانگین درصد : <b> {{$quiz->ave('percentage')}} % </b> </p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="card">
							<div class="card-content content-rose">
								<h4 class="category-social yekan">
									<i class="material-icons ml-2">schedule</i> زمان پاسخدهی
								</h4>
								<hr>
								<div class="footer">
									<p> زمان پاسخگویی شما : <b> {{human_time($filler->time, false)}} </b> </p>
									<hr>
									<p> میانگین: <b> {{human_time($quiz->ave('time'), false)}} </b> </p>
									<hr>
									<p> زمان مورد نیاز: <b> {{$quiz->max_time}} دقیقه </b> </p>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endif

			<hr>
			<a href="{{route('quiz.analyze', [$quiz->uid, $filler->uid])}}" class="btn btn-primary btn-round">
				<i class="material-icons ml-2">trending_up</i> آنالیز آزمون
			</a>

		</div>

	@else
		<div class="quiz-panel">
			@foreach ($question->quiz->questions as $q)
				<button class="quiz-panel-btn jump-to-question @if($q->id == $question->id) active @endif" type="button"
					data-url="{{route('quiz.submit_answer', ['jump' , $question->id, $q->position])}}">
					{{$q->position}}
					<div class="ripple-container"></div>
				</button>
			@endforeach
		</div>

		<div class="card quiz-card animated fadeIn">
			@include('landing.quiz.quiz_card')
		</div>

		<footer>
			<div class="quiz-progressbar">
				<p class="text-right text-primary">
					پاسخ داده شده :
					<b class="text-rose mx-2"> {{$question->quiz->answered_count()}} </b>
					از
					<b class="text-rose mx-2"> {{$question->quiz->questions->count()}} </b>
				</p>
				<div class="progress">
					<div class="progress-bar" role="progressbar" style="width:{{$percent = $question->quiz->progress_percentage()}}%">
						@if ($percent)
							{{$percent}}%
						@endif
					</div>
				</div>
			</div>
			<div class="text-center">
				@if ($question->prev())
					<button type="button" class="btn btn-round btn-secondary jump-to-question"
						data-url="{{route('quiz.submit_answer', ['prev' , $question->id])}}">
						<i class="material-icons ml-2">arrow_forward</i>
						قبلی
					</button>
				@endif
				<button type="submit" class="btn btn-round btn-primary">
					@if ($question->next())
						بعدی
						<i class="material-icons mr-2">arrow_back</i>
					@else
						<i class="material-icons ml-2">done_all</i>
						خاتمه دادن
					@endif
				</button>

			</div>
		</footer>
	@endisset

</form>
