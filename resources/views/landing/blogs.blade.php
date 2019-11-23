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
                            <li @unless($current_cat) class="active" @endunless><a href="{{route('blogs')}}">همه مطالب</a></li>
                            @foreach ($cats as $cat)
                                <li @if($current_cat == $cat->name) class="active" @endif>
                                    <a href="{{route('blogs_by_cat', urlfriendly($cat->name))}}">{{$cat->name}}</a>
                                </li>
                            @endforeach
                        </ul>

					</div>
				</div>
                <hr>

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

    @include('includes.footer')

@endsection
