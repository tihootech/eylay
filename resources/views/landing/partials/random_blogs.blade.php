<div class="section">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h2 class="title text-center"> مطالب اتفاقی </h2>
                <br />
                <div class="row random-blogs">

                    @foreach ($random_blogs as $random_blog)
                        <div class="col-md-4">
                            <div class="card card-blog">
                                <div class="card-image">
                                    <a href="{{$random_blog->public_link()}}">
                                        <img class="img img-raised" src="{{asset($random_blog->image)}}" />
                                    </a>
                                </div>

                                <div class="card-content">
                                    <h6 class="category">
                                        <a href="{{route('blogs_by_cat', urf($random_blog->category_name()))}}" class="text-info">
                                            {{$random_blog->category_name()}}
                                        </a>
                                    </h6>
                                    <h4 class="card-title">
										<a href="{{$random_blog->public_link()}}">
                                            {{$random_blog->title}}
                                        </a>
									</h4>
                                    <p class="card-description">
                                        {{short($random_blog->content, 120)}}
                                    </p>
                                    <div class="text-center">
                                        <a href="{{$random_blog->public_link()}}" class="btn btn-rose btn-round">
                                            <i class="fa fa-arrow-left ml-2"></i>
                                            ادامه مطلب
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </div>
    </div>
</div>
