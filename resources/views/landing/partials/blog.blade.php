<div class="card card-plain card-blog">
	<div class="row">
		<div class="col-md-4">
			<div class="card-image">
				<img class="img img-raised" src="{{$blog->image}}" alt="{{$blog->title}}" />
			</div>
		</div>
		<div class="col-md-8">
			<h6 class="category text-info">{{$blog->category->name ?? 'Database Error'}}</h6>
			<h3 class="card-title">
				<a href="{{$blog->public_link()}}">{{$blog->title}}</a>
			</h3>
			<p class="card-description">
				{{short($blog->content, 200)}}
				<hr>
				<a href="{{$blog->public_link()}}"> <i class="fa fa-arrow-left ml-1"></i> ادامه مطلب </a>
			</p>
			<p class="author">
				نوشته شده توسط :
				<a href="{{route('blogs_by_author', urlfriendly($blog->author_name()))}}">
					<b>{{$blog->author_name()}}</b>
				</a>
				{{-- {{human_date($blog->created_at)}} --}}
			</a>
		</div>
	</div>
</div>
