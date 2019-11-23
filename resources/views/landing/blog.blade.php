@extends('layouts.landing') @section('body_class') blog-posts @endsection @section('title') {{$blog->title}} @endsection @section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image:url('{{asset($blog->bg)}}')">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h1 class="title">{{$blog->title}}</h1> @if ($blog->subtitle)
                <h4>{{$blog->subtitle}}</h4> @endif
                <br />
                <a href="#article" class="btn btn-rose btn-round btn-lg">
                    <i class="material-icons">format_align_left</i> مشاهد مطلب
                </a>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised" id="article">
    <div class="container">
        <div class="section section-text">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3 class="title">{{$blog->title}}</h3> {!! $blog->content !!}
                </div>

            </div>
        </div>

        <div class="section section-blog-info">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <blockquote class="mt-4">
                        <p>
                            {{-- {{human_date($blog->created_at)}} --}}
                        </p>
                        <small>
							    {{ $blog->author_name() }}
							</small>
                    </blockquote>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="blog-tags">
                                تگ ها:
                                <hr> @foreach ($blog->tags_list() as $tag_name)
                                <a class="label label-primary" href="{{route('blogs_by_tag', urlfriendly($tag_name))}}">{{$tag_name}}</a> @endforeach
                            </div>
                        </div>
                        <div class="col-md-4">

                            <a href="#pablo" class="btn btn-primary btn-round pull-left">
                                <i class="material-icons">share</i> اشتراک گذاری
                            </a>

                        </div>
                    </div>

                    <hr />

                </div>
            </div>
        </div>

        <div class="section section-comments">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    @if ($blog->comments->count())
                        <div class="media-area">
                            <h3 class="title text-center">{{$blog->comments->count()}} کامنت</h3>
                            <hr>
                            @foreach ($blog->comments as $comment)
                                <div class="media">
                                    <a class="pull-right" href="javascript:void">
                                        <div class="avatar">
                                            <img class="media-object" alt="{{$comment->author_name()}}"
                                            @if ($comment->posted_by_master())
                                                src="{{asset('assets/img/me.jpg')}}"
                                            @else
                                                src="{{asset('assets/img/avatar.png')}}"
                                            @endif
                                            >
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            {{$comment->author_name()}}
                                            <small>
                                                <i class="fa fa-clock"></i>
                                                {{-- {{modern_date($comment->created_at)}} --}}
                                            </small>
                                        </h4>
                                        <h6 class="text-muted"></h6>

                                        <p>{{$comment->content}}</p>

                                        <div class="media-footer">
                                            <a href="#pablo" class="btn btn-primary btn-simple pull-right" rel="tooltip" title="به این کامنت پاسخ دهید">
                                                <i class="material-icons">reply</i> پاسخ دادن
                                            </a>
                                            @if (liked('comment', $comment->id))
                                                <a href="javascript:void" data-oid="{{$comment->id}}" data-otype="comment" class="unlike btn btn-danger btn-simple pull-right">
                                                    <i class="material-icons">favorite</i>
                                                    <span class="count"> {{$comment->likes->count()}}</span>
                                                </a>
                                            @else
                                                <a href="javascript:void" data-oid="{{$comment->id}}" data-otype="comment" class="like btn btn-default btn-simple pull-right">
                                                    <i class="material-icons">favorite</i>
                                                    <span class="count">{{$comment->likes->count()}}</span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <h3 class="title text-center">
                        @if ($blog->comments->count())
                            نظر خود را با ما در میان بگذارید...
                        @else
                            اولین نفری باشید که دیدگاه خود را بیان میکند!
                        @endif
                    </h3>
                    <form action="{{route('comment.store')}}" method="AJAX" class="media media-post">
                        <input type="hidden" class="data" name="owner_id" value="{{$blog->id}}">
                        <input type="hidden" class="data" name="owner_type" value="blog">
                        <div class="media-body">
                            <textarea name="content" class="form-control data" placeholder="دیدگاه خود را بیان کنید..." rows="6" required></textarea>
                            <div class="media-footer text-center">
                                <button type="submit" class="btn btn-primary btn-round btn-wd">قرار دادن کامنت</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h2 class="title text-center">Similar Stories</h2>
                <br />
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-blog">
                            <div class="card-image">
                                <a href="#pablo">
                                    <img class="img img-raised" src="../assets/img/examples/blog6.jpg" />
                                </a>
                            </div>

                            <div class="card-content">
                                <h6 class="category text-info">Enterprise</h6>
                                <h4 class="card-title">
										<a href="#pablo">Autodesk looks to future of 3D printing with Project Escher</a>
									</h4>
                                <p class="card-description">
                                    Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses.<a href="#pablo"> Read More </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-blog">
                            <div class="card-image">
                                <a href="#pablo">
                                    <img class="img img-raised" src="../assets/img/examples/blog8.jpg" />
                                </a>
                            </div>
                            <div class="card-content">
                                <h6 class="category text-success">
										Startups
									</h6>
                                <h4 class="card-title">
										<a href="#pablo">Lyft launching cross-platform service this week</a>
									</h4>
                                <p class="card-description">
                                    Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses.<a href="#pablo"> Read More </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-blog">
                            <div class="card-image">
                                <a href="#pablo">
                                    <img class="img img-raised" src="../assets/img/examples/blog7.jpg" />
                                </a>
                            </div>

                            <div class="card-content">
                                <h6 class="category text-danger">
										<i class="material-icons">trending_up</i> Enterprise
									</h6>
                                <h4 class="card-title">
										<a href="#pablo">6 insights into the French Fashion landscape</a>
									</h4>
                                <p class="card-description">
                                    Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses.<a href="#pablo"> Read More </a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

@include('includes.footer') @endsection
