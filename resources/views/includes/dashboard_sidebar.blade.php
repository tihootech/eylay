<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('dashboard/img/sidebar.jpg')}}">
	{{-- <!--
	Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

	Tip 2: you can also add an image using data-image tag
--> --}}
	<div class="logo">
		<a href="{{url('home')}}" class="simple-text logo-normal">
			@lang('DASHBOARD')
		</a>
	</div>
	<div class="sidebar-wrapper">
		<ul class="nav">
			<li class="nav-item @if(rn() == 'dashboard') active @endif">
				<a class="nav-link" href="{{route('dashboard')}}">
					<i class="material-icons">dashboard</i>
					<p>داشبورد</p>
				</a>
			</li>
			@master
				<li class="nav-item @if(rn() == 'course.index') active @endif">
					<a class="nav-link" href="{{route('course.index')}}">
						<i class="material-icons">movie</i>
						<p>@lang('COURSES')</p>
					</a>
				</li>
			@endmaster
		</ul>
	</div>
</div>
