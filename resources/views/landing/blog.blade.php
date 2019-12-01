@extends('layouts.landing')

@section('body_class') blog-posts @endsection
@section('title') {{$blog->title}} @endsection
@section('metadata')
    <meta name="description" content="{{$blog->title}}">
    <meta name="keywords" content="{{$blog->tags}}">
@endsection

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image:url('{{asset($blog->bg)}}')">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h1 class="title">{{$blog->title}}</h1> @if ($blog->subtitle)
                <h4>{{$blog->subtitle}}</h4> @endif
                <br />
                <a href="#article" class="btn btn-rose btn-round btn-lg">
                    <i class="material-icons ml-2">format_align_left</i> خواندن مطلب
                </a>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised" id="article">
    <div class="container">
        <div class="section section-text">
            <h3 class="title">{{$blog->title}}</h3>
            <hr>
            <div class="blog-content">
                {!! nl2br($blog->content) !!}
            </div>
        </div>

        <div class="section section-blog-info">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-6">
                            <blockquote class="mt-4">
                                <p>
                                    {{human_date($blog->created_at)}}
                                </p>
                                <small>
    							    {{ $blog->author_name() }}
    							</small>
                            </blockquote>
                            <div class="blog-tags">
                                تگ ها:
                                <hr>
                                @foreach ($blog->tags_list() as $tag_name)
                                    <a class="label label-info" href="{{route('blogs_by_tag', urf($tag_name))}}">
                                        {{$tag_name}}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="rotating-card-container manual-flip">
                                <div class="card card-rotate">
                                    <div class="front">
                                        <div class="card-content">
                                            <h5 class="category-social text-rose">
                                                <i class="material-icons ml-2">help</i> این مطلب به شما کمکی کرد؟
                                            </h5>
                                            <p class="card-description">
                                                با لایک کردنتون ما متوجه میشیم چه مطالبی برای مخاطبین ما اهمیت بیشتری داره
                                                و در واقع تو ارائه مطالب کاربردی تر با ما کمک میکنید.
                                            </p>
                                            <div class="footer text-center">
                                                @guest
                                                    <button type="button" name="button" class="btn btn-rose btn-fill btn-round btn-rotate">
                                                        <i class="material-icons ml-2">favorite</i> پسندیدن...
                                                    </button>
                                                @else
                                                    @if (liked('blog', $blog->id))
                                                        <a href="javascript:void" data-oid="{{$blog->id}}" data-otype="blog" class="unlike btn btn-round btn-rose">
                                                            <i class="material-icons">favorite</i>
                                                            <span class="count"> {{$blog->likes->count()}}</span>
                                                        </a>
                                                    @else
                                                        <a href="javascript:void" data-oid="{{$blog->id}}" data-otype="blog" class="like btn btn-round btn-default">
                                                            <i class="material-icons">favorite</i>
                                                            <span class="count">{{$blog->likes->count()}}</span>
                                                        </a>
                                                    @endif
                                                @endguest
                                            </div>
                                        </div>
                                    </div>

                                    <div class="back">
                                        <div class="card-content">
                                            <br>
                                            <h5 class="card-title text-primary">
                                                <i class="material-icons">lock_open</i>
                                                ورود به حساب کاربری
                                            </h5>
                                            <p class="card-description">
                                                برای دسترسی به این بخش نیاز به ورود به حساب کاربر دارید.
                                                <br><br>
                                                <a data-toggle="modal" data-target="#loginModal" class="btn btn-primary btn-round">
                                                    <i class="material-icons ml-2">how_to_reg</i>
                                                    وارد شوید
                                                </a>
                                                <br>
                                                <button type="button" name="button" class="btn btn-simple btn-round btn-rotate">
                                                    <i class="material-icons">refresh</i> بازگشت...
                                                </button>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>

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
                            <h4 class="title text-center">
                                {{$blog->comments->count()}} کامنت
                                برای این مطلب یافت شد.
                            </h4>
                            <hr>
                            @foreach ($blog->comments as $comment)
                                <div class="media" id="comment-{{$comment->id}}">
                                    @include('landing.partials.comment_avatar')
                                    <div class="media-body">


                                        @include('landing.partials.comment_text')

                                        <div class="media-footer">
                                            <a href="#answer-comment-{{$comment->id}}" class="btn btn-primary btn-simple pull-right"
                                                rel="tooltip" title="به این کامنت پاسخ دهید"
                                                data-toggle="collapse"
                                                >
                                                <i class="material-icons">reply</i> پاسخ دادن
                                            </a>
                                            @include('landing.partials.like_comment')
                                        </div>
                                        <div class="collapse" id="answer-comment-{{$comment->id}}">
                                            <form action="{{route('comment.store')}}" method="AJAX" class="media-body">
                                                <input type="hidden" class="data" name="owner_id" value="{{$comment->id}}">
                                                <input type="hidden" class="data" name="owner_type" value="comment">
                                                <textarea class="form-control data" name="content" placeholder="متن پاسخ خود را تایپ کنید..." rows="4"></textarea>
                                                <div class="media-footer">
                                                    <button type="submit" class="btn btn-primary pull-right">
                                                        <i class="material-icons ml-2">reply</i> پاسخ دادن
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        @foreach ($comment->replies as $reply)
                                            <div class="media">
                                                @include('landing.partials.comment_avatar', ['comment'=>$reply])
                                                <div class="media-body">

                                                    @include('landing.partials.comment_text', ['comment'=>$reply])
                                                    @include('landing.partials.like_comment', ['comment'=>$reply])

                                                </div>
                                            </div>
                                        @endforeach
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
                                <button type="submit" class="btn btn-primary btn-wd">
                                    <i class="material-icons ml-2">comment</i>
                                    قرار دادن کامنت
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@include('landing.partials.random_blogs')
@include('landing.partials.login_modal')

@include('includes.footer')

@endsection
