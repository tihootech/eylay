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


@master
	<li>
		<a class="app-menu__item @if( rn() == 'course.index' ) active @endif" href="{{route("course.index")}}">
			<i class="ml-2 material-icons">perm_contact_calendar</i>
			<span class="app-menu__label"> @lang('COURSES') </span>
		</a>
	</li>
	<li>
		<a class="app-menu__item @if( rn() == 'blog.index' ) active @endif" href="{{route("blog.index")}}">
			<i class="ml-2 material-icons">collections</i>
			<span class="app-menu__label"> @lang('BLOGS') </span>
		</a>
	</li>
	<li>
		<a class="app-menu__item @if( rn() == 'comment.index' ) active @endif" href="{{route("comment.index")}}">
			<i class="ml-2 material-icons">comment</i>
			<span class="app-menu__label"> @lang('COMMENTS') </span>
		</a>
	</li>
	<li>
		<a class="app-menu__item @if( rn() == 'file.index' ) active @endif" href="{{route("file.index")}}">
			<i class="ml-2 material-icons">cloud</i>
			<span class="app-menu__label"> @lang('FILES') </span>
		</a>
	</li>
@endmaster

<li>
	<a class="app-menu__item @if( rn() == 'acc' ) active @endif" href="{{route("acc")}}">
		<i class="ml-2 material-icons">lock</i>
		<span class="app-menu__label"> @lang('MANAGE_ACCOUNT') </span>
	</a>
</li>
