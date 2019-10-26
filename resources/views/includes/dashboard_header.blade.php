<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
	<div class="container-fluid">
		<div class="navbar-wrapper">
			<a class="navbar-brand" href="{{url('/')}}"> <i class="material-icons">home</i> @lang('MAIN_PAGE') </a>
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
			<span class="sr-only">Toggle navigation</span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end">
			<form class="navbar-form">
				<div class="input-group no-border">
					<input type="text" value="" class="form-control" placeholder="@lang('SEARCH')...">
					<button type="submit" class="btn btn-white btn-round btn-just-icon">
						<i class="material-icons">search</i>
						<div class="ripple-container"></div>
					</button>
				</div>
			</form>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="{{url('home')}}">
						<i class="material-icons">dashboard</i>
						<p class="d-lg-none d-md-block">
							@lang('DASHBOARD')
						</p>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="material-icons">notifications</i>
						<span class="notification">۵</span>
						<p class="d-lg-none d-md-block">
							@lang('NOTIFICATIONS')
						</p>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">محمدرضا به ایمیل شما پاسخ داد</a>
						<a class="dropdown-item" href="#">شما ۵ وظیفه جدید دارید</a>
						<a class="dropdown-item" href="#">از حالا شما با علیرضا دوست هستید</a>
						<a class="dropdown-item" href="#">اعلان دیگر</a>
						<a class="dropdown-item" href="#">اعلان دیگر</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="material-icons">person</i>
						<p class="d-lg-none d-md-block">
							@lang('ACCOUNT')
						</p>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">
							<i class="material-icons mr-2">phonelink_lock</i> @lang('MANAGE_ACCOUNT')
						</a>
						<a class="dropdown-item" href="javascript:void" onclick="$('#logout-form').submit();">
							<i class="material-icons mr-2">input</i> @lang('LOGOUT')
						</a>
					</div>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    					@csrf
					</form>
				</li>
			</ul>
		</div>
	</div>
</nav>
