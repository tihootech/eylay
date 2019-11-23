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
			<ul class="nav navbar-nav navbar-left">
				<li class="button-container">
					<a href="{{route('dashboard')}}" class="btn btn-primary btn-round">
						<i class="material-icons">person</i> ناحیه کاربری
					</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="index.html">
						<i class="material-icons">group_add</i> ثبت نام در دوره های آموزشی
					</a>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="material-icons">view_day</i> صفحات وبسایت
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu dropdown-with-icons">

						<li>
							<a href="{{route('blogs')}}">
								<i class="material-icons">collections</i> وبلاگ
							</a>
						</li>
						<li>
							<a href="{{route('courses', urlfriendly(__('EDU_VIDEOS')))}}">
								<i class="material-icons">movie</i> @lang('EDU_VIDEOS')
							</a>
						</li>
						<li>
							<a href="{{route('courses', urlfriendly(__('WORKSHOPS')))}}">
								<i class="material-icons">business</i> @lang('WORKSHOPS')
							</a>
						</li>
						<li>
							<a href="sections.html#blogs">
								<i class="material-icons">person</i> درباره من
							</a>
						</li>
						<li>
							<a href="sections.html#headers">
								<i class="material-icons">cloud_download</i> دانلود فایل  دوره های آموزشی
							</a>
						</li>

					</ul>
				</li>


			</ul>
		</div>
	</div>
</nav>
