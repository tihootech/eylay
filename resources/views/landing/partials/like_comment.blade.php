@guest
	<a href="javascript:void" class="btn btn-rose btn-simple pull-right" data-toggle="modal" data-target="#loginModal">
		<i class="material-icons">favorite</i>
		<span class="count"> {{$comment->likes->count()}}</span>
	</a>
@else
	@if (liked('comment', $comment->id))
		<a href="javascript:void" data-oid="{{$comment->id}}" data-otype="comment" class="unlike btn btn-rose btn-simple pull-right">
			<i class="material-icons">favorite</i>
			<span class="count"> {{$comment->likes->count()}}</span>
		</a>
	@else
		<a href="javascript:void" data-oid="{{$comment->id}}" data-otype="comment" class="like btn btn-default btn-simple pull-right">
			<i class="material-icons">favorite</i>
			<span class="count">{{$comment->likes->count()}}</span>
		</a>
	@endif
@endguest
