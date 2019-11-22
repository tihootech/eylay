@extends('layouts.landing')

@section('title')
    <title> Eylay </title>
@endsection


@section('content')
    <div class="page-header header-filter" filter-color="rose" style="background-image: url('{{asset('assets/img/eylay.jpg')}}');" id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="brand">
                        <h1>
                            Eylay
                        </h1>

                        <h3 class="title"> با ما بیاموزید </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised">

        <div class="cd-section" id="features">

            <div class="container">

                <!--     *********     FEATURES 1      *********      -->

                <div class="features-1">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="title">سوال برنامه نویسی داری؟</h2>
                            <h5 class="description">
                                سوالات برنامه نویسی خود را از ما بپرسید
                                ایلای میکوشد که در کوتاه ترین زمان به شما پاسخ دهد.
                            </h5>
                            <a href="https://t.me/eylay" target="_blank" class="btn btn-primary"> پرسیدن سوال </a>
                            <hr>
                            <h2> نحوه آموزش ما چگونه است؟ </h2>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-primary">
                                    <i class="material-icons">movie</i>
                                </div>
                                <h4 class="info-title">ویدئو های آموزشی</h4>
                                <p>تهیه ویدئو های آموزشی از مباحث و زبان های مختلف برنامه نویسی در سطح های مختلف (از مبتدی تا پیشرفته) به صورت جامع و با الگوگیری از ویدئو های آموزشی سایت لیندا . لیندا یک از کامل ترین منابع آموزشی به زبان انگلیسی میباشد.</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-primary">
                                    <i class="material-icons">file_copy</i>
                                </div>
                                <h4 class="info-title">فایل ها</h4>
                                <p>یکی از مشکلاتی که برخی از ویدئو های آموزشی دارند این است که فایل های استفاده شده در اختیار کدآموزان قرار نمیگیرد. در ایلای تمام فایل ها و کد های استفاده شده در پروژه، در قالب یک فایل فشرده در اختیار کدآموز قرار میگیرد.</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-primary">
                                    <i class="material-icons">perm_phone_msg</i>
                                </div>
                                <h4 class="info-title">پشتیبانی و همیاری</h4>
                                <p>ضبط ویدئو های آموزشی پایان کار ما نیست. درصورتی که در حین مشاهده ویدئو ها با سوالی مواجه شدید میتوانید با ایجاد حساب کاربری سوالات خود را در همین سایت از ما بپرسید. ایلای میکوشد به سوالات شما پاسخ دهد.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <!--     *********    END FEATURES 1      *********      -->

            </div>
        </div>

        <div class="cd-section" id="projects">

            <!--     *********    PROJECTS 3     *********      -->

            <div class="projects-3 section-dark" id="projects-3">

                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <h6 class="category text-muted">دوره های آموزشی</h6>
                            <h2 class="title"> دوره های و کارگاه های حضوری </h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1"></div>
                        @foreach ($workshops as $workshop)
                            <div class="col-md-5">
                                <div class="card card-plain">
                                    <a href="{{$workshop->public_link()}}">
                                        <div class="card-image">
                                            <img src="{{asset($workshop->image)}}" />
                                        </div>
                                    </a>
                                    <div class="card-content">
                                        <h6 class="category">{{$workshop->supertitle}}</h6>
                                        <a href="{{$workshop->public_link()}}">
                                            <h4 class="card-title">{{$workshop->title}}</h4>
                                        </a>
                                        <p class="card-description">
                                            {{short($workshop->info)}}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center">
                        <a href="#" class="btn btn-round btn-rose"> مشاهده همه </a>
                    </div>

                </div>
            </div>

            <!--     *********    END PROJECTS 3      *********      -->

            <!--     *********    PROJECTS 1     *********      -->

            <div class="projects-1" id="projects-1">

                <div class="container">

                    <h2 class="title text-center">ویدئو های آموزشی</h2>

                    <div class="row">

                        @foreach ($online_courses as $course)
                            <div class="col-md-6">
                                <div class="card card-raised card-background" style="background-image: url('{{asset($course->image)}}')">

                                    <div class="card-content">
                                        <h6 class="category text-info">{{$course->supertitle}}</h6>
                                        <a href="{{$course->public_link()}}">
                                            <h3 class="card-title">{{$course->title}}</h3>
                                        </a>
                                        <p class="card-description">
                                            {{short($course->info)}}
                                        </p>
                                        <a href="{{$course->public_link()}}" class="btn btn-rose btn-round">
                                            <i class="material-icons ml-1">remove_red_eye</i> مشاهده
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>

            <!--     *********    END PROJECTS 1      *********      -->

        </div>

        <div class="cd-section" id="testimonials">

            <!--     *********    TESTIMONIALS 1     *********      -->

            <div class="testimonials-1 section-image" style="background-image: url({{asset('assets/img/faq.jpg')}})">

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <h2 class="title"> پاسخ به سوالات برنامه نویسی </h2>
                            <h5 class="description"> چند نمونه از سوالت پرسیده شده خوب </h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-testimonial">
                                <div class="icon">
                                    <i class="material-icons">format_quote</i>
                                </div>
                                <div class="card-content">
                                    <h5 class="card-description">
                                        Your products, all the kits that I have downloaded from your site and worked with are sooo cool! I love the color mixtures, cards... everything. Keep up the great work!
                                    </h5>
                                </div>

                                <div class="footer">
                                    <h4 class="card-title">Alec Thompson</h4>
                                    <h6 class="category">@alecthompson</h6>
                                    <div class="card-avatar">
                                        <a href="#pablo">
                                            <img class="img" src="{{asset('assets/img/faces/bg-avatar.png')}}" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-testimonial">
                                <div class="icon">
                                    <i class="material-icons">format_quote</i>
                                </div>
                                <div class="card-content">
                                    <h5 class="card-description">
                                        "Don't be scared of the truth because we need to restart the human foundation in truth. That's why I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is not so attractive"
                                    </h5>
                                </div>

                                <div class="footer">
                                    <h4 class="card-title">Gina Andrew</h4>
                                    <h6 class="category">@ginaandrew</h6>
                                    <div class="card-avatar">
                                        <a href="#pablo">
                                            <img class="img" src="{{asset('assets/img/faces/bg-avatar.png')}}" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-testimonial">
                                <div class="icon">
                                    <i class="material-icons">format_quote</i>
                                </div>
                                <div class="card-content">
                                    <h5 class="card-description">
                                        "Your products, all the kits that I have downloaded from your site and worked with are sooo cool! I love the color mixtures, cards... everything. Keep up the great work!"
                                    </h5>
                                </div>

                                <div class="footer">
                                    <h4 class="card-title">George West</h4>
                                    <h6 class="category">@georgewest</h6>
                                    <div class="card-avatar">
                                        <a href="#pablo">
                                            <img class="img" src="{{asset('assets/img/faces/bg-avatar.png')}}" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <!--     *********    END TESTIMONIALS 1      *********      -->

        </div>

        <div class="cd-section" id="blogs">

            <!--     *********     BLOGS 1      *********      -->

            <div class="blogs-1" id="blogs-1">

                <div class="container">
                    <div class="row">

                        <div class="col-md-10 col-md-offset-1">
                            <h2 class="title"> آخرین مطالب منتشر شده </h2>

                            <br />
                            <div class="card card-plain card-blog">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card-image">
                                            <img class="img img-raised" src="{{asset('assets/img/examples/card-blog4.jpg')}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="category text-info">Enterprise</h6>
                                        <h3 class="card-title">
                                            <a href="#pablo">Autodesk looks to future of 3D printing with Project Escher</a>
                                        </h3>
                                        <p class="card-description">
                                            Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses. Yet its own business model disruption is only part of the story — and… <a href="#pablo"> Read More </a>
                                        </p>
                                        <p class="author">
                                            by <a href="#pablo"><b>Mike Butcher</b></a>, 2 days ago
                                            </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card-plain card-blog">
                                        <div class="card-image">
                                            <a href="#pablo">
                                                <img class="img img-raised" src="{{asset('assets/img/examples/card-blog4.jpg')}}" />
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
                                    <div class="card card-plain card-blog">
                                        <div class="card-image">
                                            <a href="#pablo">
                                                <img class="img img-raised" src="{{asset('assets/img/examples/blog5.jpg')}}" />
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
                                    <div class="card card-plain card-blog">
                                        <div class="card-image">
                                            <a href="#pablo">
                                                <img class="img img-raised" src="{{asset('assets/img/examples/blog7.jpg')}}" />
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

            <!--     *********    END BLOGS 1      *********      -->

        </div>

    </div>

    <div class="cd-section" id="pricing">

        <!--     *********    PRICING 5     *********      -->

        <div class="pricing-5 section-gray" id="pricing-5">

            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2 class="title">حمایت از ما</h2>
                        <ul class="nav nav-pills" role="tablist">
                            <li class="active">
                                <a href="#personal" role="tab" data-toggle="tab">
                                6 ماهه
                            </a>
                            </li>
                            <li>
                                <a href="#commercial" role="tab" data-toggle="tab">
                                1 ساله
                            </a>
                            </li>
                        </ul>

                        <p class="text-gray"> دسترسی به تمامی دوره های آموزشی به مدت 6 یا 12 ماه </p>
                    </div>

                    <div class="col-md-7 col-md-offset-1">
                        <div class="tab-content tab-space">
                            <div class="tab-pane active" id="personal">

                                <div class="col-md-6">
                                    <div class="card card-pricing card-raised">
                                        <div class="card-content">
                                            <h6 class="category">HTML Package</h6>
                                            <h1 class="card-title"><small>$</small>0</h1>
                                            <ul>
                                                <li><b>1</b> Developer</li>
                                                <li><b>99+</b> Components</li>
                                                <li><b>HTML</b> Elements</li>
                                                <li><b>14</b> Page Examples</li>
                                            </ul>
                                            <a href="#pablo" class="btn btn-primary btn-round">
                                            Free Download
                                        </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card card-pricing card-plain">
                                        <div class="card-content">
                                            <h6 class="category">HTML & Sketch Package</h6>
                                            <h1 class="card-title"><small>$</small>79</h1>
                                            <ul>
                                                <li><b>1</b> Developer</li>
                                                <li><b>199+</b> Components</li>
                                                <li><b>HTML & Sketch</b> Elements</li>
                                                <li><b>22</b> Page Examples</li>
                                            </ul>
                                            <a href="#pablo" class="btn btn-white btn-round">
                                            Buy Now!
                                        </a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane" id="commercial">
                                <div class="col-md-6">
                                    <div class="card card-pricing card-raised">
                                        <div class="card-content">
                                            <h6 class="category">HTML Package</h6>
                                            <h1 class="card-title"><small>$</small>159</h1>
                                            <ul>
                                                <li><b>5+</b> Developers</li>
                                                <li><b>199+</b> Components</li>
                                                <li><b>HTML</b> Elements</li>
                                                <li><b>24</b> Page Examples</li>
                                            </ul>
                                            <a href="#pablo" class="btn btn-primary btn-round">
                                            Buy Now!
                                        </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card card-pricing card-plain">
                                        <div class="card-content">
                                            <h6 class="category">HTML & Sketch Package</h6>
                                            <h1 class="card-title"><small>$</small>299</h1>
                                            <ul>
                                                <li><b>10+</b> Developers</li>
                                                <li><b>299+</b> Components</li>
                                                <li><b>HTML & Sketch</b> Elements</li>
                                                <li><b>45</b> Page Examples</li>
                                            </ul>
                                            <a href="#pablo" class="btn btn-white btn-round">
                                            Buy Now!
                                        </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!--     *********    END PRICING 5      *********      -->

    </div>

    @include('includes.footer')

    <nav id="cd-vertical-nav">
        <ul>
            <li>
                <a href="#header" data-number="1">
                    <span class="cd-dot"></span>
                    <span class="cd-label">ابتدا</span>
                </a>
            </li>
            <li>
                <a href="#features" data-number="2">
                    <span class="cd-dot"></span>
                    <span class="cd-label">نحوه آموزش</span>
                </a>
            </li>
            <li>
                <a href="#projects" data-number="3">
                    <span class="cd-dot"></span>
                    <span class="cd-label">دوره های آموزشی</span>
                </a>
            </li>
            <li>
                <a href="#testimonials" data-number="4">
                    <span class="cd-dot"></span>
                    <span class="cd-label">پاسخ به سوالات برنامه نویسی</span>
                </a>
            </li>
            <li>
                <a href="#blogs" data-number="5">
                    <span class="cd-dot"></span>
                    <span class="cd-label">مطالب منتشر شده</span>
                </a>
            </li>
            <li>
                <a href="#contactus" data-number="6">
                    <span class="cd-dot"></span>
                    <span class="cd-label">عضویت در سایت</span>
                </a>
            </li>
            <li>
                <a href="#pricing" data-number="7">
                    <span class="cd-dot"></span>
                    <span class="cd-label">حمایت از ما</span>
                </a>
            </li>
        </ul>
    </nav>
@endsection
