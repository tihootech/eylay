<div class="card card-plain card-blog">
	<div class="row">
		<div class="col-md-4">
			<div class="card-image">
				<a href="{{$blog->public_link()}}">
					<img class="img img-raised" src="{{asset($blog->image)}}" alt="{{$blog->title}}" />
				</a>
			</div>
		</div>
		<div class="col-md-8">
			<h6 class="category">
				<a href="{{route('blogs_by_cat', urf($blog->category_name()))}}" class="text-info">
					{{$blog->category_name()}}
				</a>
			</h6>
			<h3 class="card-title">
				<a href="{{$blog->public_link()}}">{{$blog->title}}</a>
			</h3>
			<p class="card-description">
				{{short($blog->content, 200)}}
				<hr>
				<a href="{{$blog->public_link()}}"> <i class="fa fa-arrow-left ml-1"></i> ادامه مطلب </a>
			</p>
			<p class="author">
				<span class="mx-3">
					<i class="fa fa-user ml-2 text-rose"></i>
					<a href="{{route('blogs_by_author', urf($blog->author_name()))}}">
						<b>{{$blog->author_name()}}</b>
					</a>
				</span>
				<span class="mx-3">
					<i class="fa fa-clock-o ml-2 text-rose"></i>
					{{human_date($blog->created_at)}}
				</span>
				<span class="mx-3">
					<i class="fa fa-eye ml-2 text-rose"></i>
					{{$blog->seens}}
				</span>
				<span class="mx-3">
					<i class="fa fa-heart ml-2 text-rose"></i>
					{{$blog->likes->count()}}
				</span>
			</p>
		</div>
	</div>
</div>
