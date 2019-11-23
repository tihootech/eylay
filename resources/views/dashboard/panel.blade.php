@master
	{{-- @php
		$hrefs = ['owners/operator', 'owners/organ'];
	@endphp
	<li class="treeview @if(expanded($hrefs)) is-expanded @endif">
		<a class="app-menu__item" href="#" data-toggle="treeview">
			<i class="app-menu__icon fa fa-users"></i>
			<span class="app-menu__label"> مدیریت کاربران </span>
			<i class="treeview-indicator fa fa-angle-left"></i>
		</a>
		<ul class="treeview-menu">
			<li>
				<a class="treeview-item @if(active($hrefs[0])) active @endif" href="{{url($hrefs[0])}}">
					<i class="icon fa fa-user-secret"></i> مدیریت مددکارها
				</a>
			</li>
			<li>
				<a class="treeview-item @if(active($hrefs[1])) active @endif" href="{{url($hrefs[1])}}">
					<i class="icon fa fa-bank"></i> مدیریت موسسات
				</a>
			</li>
		</ul>
	</li> --}}

@endmaster


<li>
	<a class="app-menu__item @if( rn() == 'course.index' ) active @endif" href="{{route("course.index")}}">
		<i class="ml-2 material-icons">movie</i>
		<span class="app-menu__label"> دوره ها </span>
	</a>
</li>

<li>
	<a class="app-menu__item @if( rn() == 'acc' ) active @endif" href="{{route("acc")}}">
		<i class="ml-2 material-icons">lock</i>
		<span class="app-menu__label"> مدیریت حساب کاربری </span>
	</a>
</li>
