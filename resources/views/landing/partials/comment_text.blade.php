<h4 class="media-heading">
	<span class="text-info"> {{$comment->author_name()}} </span>
</h4>
<h6 class="text-muted">
	<i class="fa fa-clock-o"></i>
	{{modern_date($comment->created_at)}}
</h6>

<p>{{$comment->content}}</p>
