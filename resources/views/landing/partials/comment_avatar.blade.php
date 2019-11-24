<a class="pull-right" href="javascript:void">
	<div class="avatar">
		<img class="media-object" alt="{{$comment->author_name()}}"
		@if ($comment->posted_by('master'))
			src="{{asset('assets/img/me.jpg')}}"
		@elseif($comment->posted_by('guest'))
			src="{{asset('assets/img/avatar.png')}}"
		@else
			src="{{asset('assets/img/faces/avatar.png')}}"
		@endif
		>
	</div>
</a>
