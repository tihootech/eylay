@extends('layouts.landing')
@section('body_class') blog-posts @endsection
@section('title')
    Eylay | مطالب منتشر شده
@endsection


@section('content')
    <div class="page-header header-filter header-small blogs-bg" data-parallax="true">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<h1 class="title"> مطالب منتشر شده توسط Eylay </h1>
				</div>
			</div>
		</div>
	</div>

	<div class="main main-raised">
		<div class="container">

			<div class="section">

                <div class="row">
					<div class="col-md-6 col-md-offset-3">

                        <ul class="nav nav-pills nav-pills-primary text-center">
                            <li @if(!$order) class="active" @endif>
                                <a href="?order=latest"> جدیدترین ها </a>
                            </li>
                            <li @if($order=='seens') class="active" @endif>
                                <a href="?order=seens"> بیشترین بازدید </a>
                            </li>
                            <li @if($order=='likes') class="active" @endif>
                                <a href="?order=likes"> محبوب ترین </a>
                            </li>
                        </ul>

					</div>
				</div>
                <hr>
                @if ($current_cat || $author || $tag)
                    <div class="card">
                        <div class="card-content content-warning text-center">
                            <a href="{{route('blogs')}}" class="btn btn-white btn-round" rel="tooltip" title="
                            شما در حال مشاهده مطالبی هستید که
                            @if ($current_cat)
                                در دسته بندی '{{$current_cat}}' قرار گرفته اند.
                            @endif
                            @if ($author)
                                که توسط '{{$author}}' نوشته شده اند.
                            @endif
                            @if ($tag)
                                که دارای تگ '{{$tag}}' هستند.
                            @endif
                            ">
                                <i class="fa fa-list ml-2"></i>
                                 مشاهده همه مطالب
                            </a>
                        </div>
                    </div>
                @endif
                @foreach ($blogs as $blog)
                    @include('landing.partials.blog')
                @endforeach

			</div>

		</div>

		<div class="team-5 section-image authors-bg background-fixed">

			<div class="container">
				<div class="row">

					<div class="col-md-6 col-md-offset-3">
						<div class="card card-profile card-plain">
							<div class="col-md-5">
								<div class="card-image">
									<a href="{{route('blogs_by_author', 'علی-صیفی')}}">
										<img class="img" src="{{asset('assets/img/me.jpg')}}" />
									</a>
								</div>
							</div>
							<div class="col-md-7">
								<div class="card-content">
									<h4 class="card-title"> علی صیفی </h4>
									<h6 class="category text-muted"> بیشترین مقالات منتشر شده </h6>

									<p class="card-description">
										تا کنون {{$count}} بلاگ توسط این ناشر منتشر شده است.
									</p>

									<div class="footer">
										<a href="https://instagram.com/eylay94" class="btn btn-just-icon btn-simple btn-white"><i class="fa fa-instagram"></i></a>
										<a href="https://t.me/eylay" class="btn btn-just-icon btn-simple btn-white"><i class="fa fa-telegram"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>

		<div class="subscribe-line">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3 class="title"> هر هفته با یک ترفند برنامه نویسی آشنا شوید! </h4>
						<p class="description">
							با وارد کردن ایمیل خود، در خبرنامه عضویت پیدا کنید و از مطالب منتشر شده جدید ما باخبر شوید.
						</p>
					</div>
					<div class="col-md-6">
						<div class="card card-plain card-form-horizontal">
							<div class="card-content">
								<form method="POST" action="{{ route('newsletter') }}">
                                    @csrf
									<div class="row">
										<div class="col-md-8">

											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">mail</i>
												</span>
												<input type="email" placeholder="ایمیل شما..." class="form-control" />
											</div>
										</div>
										<div class="col-md-4">
											<button type="button" class="btn btn-primary btn-round btn-block">
                                                عضویت در خبرنامه
                                            </button>
										</div>
									</div>
								</form>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
    </div>

    @include('landing.partials.random_blogs')

    @include('includes.footer')

@endsection
