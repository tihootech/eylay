<nav class="navbar navbar-default navbar-transparent navbar-fixed-top navbar-color-on-scroll" color-on-scroll=" " id="sectionsNav">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{url('/')}}">Eylay</a>
		</div>

		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="button-container">
					<a href="{{route('dashboard')}}" class="btn btn-primary btn-round">
						<i class="material-icons ml-2">person</i> ناحیه کاربری
					</a>
				</li>
				@guest
					<li class="button-container">
						<a href="{{route('register')}}" class="btn btn-primary btn-round">
							<i class="material-icons ml-2">person_add</i> ایجاد حساب کاربری
						</a>
					</li>
				@endguest
				<li>
					<a href="{{route('signup_page')}}">
						<i class="material-icons">group_add</i> ثبت نام در دوره های آموزشی
					</a>
				</li>

				<li>
					<a href="{{route('blogs')}}">
						<i class="material-icons">collections</i> وبلاگ
					</a>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="material-icons">view_day</i> صفحات وبسایت
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu dropdown-with-icons">

						<li>
							<a href="{{route('about')}}">
								<i class="material-icons">group</i> درباره ما
							</a>
						</li>
						<li>
							<a href="{{route('download_files')}}">
								<i class="material-icons">cloud_download</i> دانلود فایل  دوره های آموزشی
							</a>
						</li>

					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
