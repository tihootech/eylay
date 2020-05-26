@extends('layouts.landing')

@section('title')
    Eylay | با ما بیاموزید
@endsection
@section('metadata')
    <meta name="description" content="Eylay | با ما بیاموزید | آموزش زبان های برنامه نویسی">
    <meta name="keywords" content="برنامه نویسی, eylay, ایلای">
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

                        {{-- <h3 class="title"> با ما بیاموزید </h3> --}}

                        <div class="alert alert-danger mt-5">
                            <p class="lead mb-4"> لطفا و خواهشا ویدئو های ما را از سایت جت آموز خریداری نکنید. </p>
                            این وبسایت بدون رضایت ما ویدئو ها را برای فروش گذاشته و ما به هیچ وجه راضی نیستیم.
                            <hr>
                            این اقدام جت آموز شرعا و قانون خطاست و ما در حال پیگیری مراحل قانونی برای حل این مشکل هستیم.
                            خواهشا تا پاک شدن دوره های آموزشی از روی این وبسایت، به هیچ وجه از آنها خرید نکنید.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised">

        <div class="cd-section" id="education">

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
                                <p>
                                    ضبط ویدئو های آموزشی پایان کار ما نیست. درصورتی که در حین مشاهده ویدئو ها با سوالی مواجه شدید
                                    میتوانید از طریق تلگرام از ما بپرسید. در آپدیت های بعدی، سیستم پرسش و پاسخ در همین وبسایت راه اندازی میشود.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <!--     *********    END FEATURES 1      *********      -->

            </div>
        </div>

        <div class="cd-section" id="projects">

            <!--     *********    PROJECTS 3     *********      -->

            <div class="projects-3 section-image workshops-bg background-fixed" id="projects-3">

                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <h6 class="category text-muted">دوره های آموزشی</h6>
                            <h2 class="title"> دوره های و کارگاه های حضوری </h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1"></div>
                        @foreach ($courses as $course)
                            <div class="col-md-5">
                                <div class="card card-plain">
                                    <a href="{{route('signup_page')}}">
                                        <div class="card-image">
                                            <img src="{{asset($course->image)}}" />
                                        </div>
                                    </a>
                                    <div class="card-content">
                                        <h6 class="category">{{$course->supertitle}}</h6>
                                        <a href="{{route('signup_page')}}">
                                            <h4 class="card-title">{{$course->title}}</h4>
                                        </a>
                                        <p class="card-description">
                                            {{short($course->info)}}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center">
                        <a href="{{route('signup_page')}}" class="btn btn-round btn-rose">
                            <i class="material-icons ml-2">group_add</i>
                            ثبت نام در دوره های آموزشی
                        </a>
                    </div>

                </div>
            </div>

            <!--     *********    END PROJECTS 3      *********      -->

        </div>

        <div class="cd-section" id="features">

            <div class="container">

                <!--     *********     FEATURES 1      *********      -->

                <div class="features-1">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2> وبلاگ و مطالب ما چگونه است؟ </h2>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-primary">
                                    <i class="material-icons">code</i>
                                </div>
                                <h4 class="info-title"> کدهای آماده </h4>
                                <p>
                                    قرار دادن کدها و Template ها و Snippet های آماده جهت استفاده شما کدنویسان و کدآموزان عزیز.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-primary">
                                    <i class="material-icons">update</i>
                                </div>
                                <h4 class="info-title"> مطالب روز </h4>
                                <p>
                                    Eylay میکوشد که به روز ترین مطالب دنیای برنامه نویسی را پوشش دهد و در قالب وبلاگ به این مطالب بپردازد.

                                </p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-primary">
                                    <i class="material-icons">build</i>
                                </div>
                                <h4 class="info-title"> معرفی ابزار های پرکاربرد </h4>
                                <p>
                                    معرفی ابزار هایی که به برنامه نویسان در قالب های مختلف کمک میکند. ابزار های مانند owl-carousel و...
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <!--     *********    END FEATURES 1      *********      -->

            </div>
        </div>

        <div class="cd-section" id="testimonials">

            <!--     *********    TESTIMONIALS 1     *********      -->

            <div class="testimonials-1 section-image faq-bg background-fixed">

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <h2 class="title"> پاسخ به سوالات برنامه نویسی </h2>
                            <h5 class="description"> چند نمونه از سوالت پرسیده شده خوب </h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-testimonial">
                                <div class="icon">
                                    <i class="material-icons">format_quote</i>
                                </div>
                                <div class="card-content">
                                    <p class="card-description">
                                        سلام استاد، من آموزش های شما رو تو لیموناد دنبال میکنم، یه سوالی برام پیش اومده.
                                        کلاس my-auto تو بوتسترپ چکاری رو انجام میده و کاربردش چیه؟
                                    </p>
                                </div>

                                <div class="footer">
                                    <h4 class="card-title"> پرسیده شده در تلگرام </h4>
                                    <h6 class="category">Bootstrap</h6>
                                    <div class="card-avatar">
                                        <a href="#pablo">
                                            <img class="img" src="{{asset('assets/img/faces/bg-avatar.png')}}" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card card-testimonial">
                                <div class="icon">
                                    <i class="material-icons">format_quote</i>
                                </div>
                                <div class="card-content">
                                    <p class="card-description">
                                        سلام استاد وقت عالی بخیر باشه عذر خواهی میکنم بابات مزاحمت.یه سوال از خدمتتون داشتم اینکه من رو یه پروژه لاراولی سابدمین درست کردم که از طریق فایل روتر ادرس دهی شده.من دوتا زیر دامنه با نامه blog1.site.com وblog2.site.com چجوری میتونم وقتی کاربری لاگین شد توی blog1دیگه به اون یکی سابدامین هم دسترسی داشته باشه  الان که middelware auth رو روش صدا میزنم فقط رو یکی از سابدامینا کار میکنه و برای ورود به دومی باید مجددا یوزر پسورد وارد شه که نمیخام این شکلی باشه ممنون میشم راهنماییم کنین پوزش بابت طولانی شدن
                                    </p>
                                </div>

                                <div class="footer">
                                    <h4 class="card-title"> پرسیده شده در تلگرام </h4>
                                    <h6 class="category"> Laravel </h6>
                                    <div class="card-avatar">
                                        <a href="#pablo">
                                            <img class="img" src="{{asset('assets/img/faces/bg-avatar.png')}}" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card card-testimonial">
                                <div class="icon">
                                    <i class="material-icons">format_quote</i>
                                </div>
                                <div class="card-content">
                                    <p class="card-description">
                                        با سلام. ممنون از آموزش های خوبتون.
                                        خواستم بپرسم
                                        تو لاراول چطور میتونیم یه validation برای validate کردن کدملی ایجاد کنیم؟ ممنون میشم راهنمایی کنید.
                                    </p>
                                </div>

                                <div class="footer">
                                    <h4 class="card-title"> پرسیده شده در تلگرام </h4>
                                    <h6 class="category"> Laravel </h6>
                                    <div class="card-avatar">
                                        <a href="#pablo">
                                            <img class="img" src="{{asset('assets/img/faces/bg-avatar.png')}}" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="text-center mt-7">
                        <a href="https://t.me/eylay" class="btn btn-round btn-rose">
                            <i class="fa fa-telegram ml-2"></i>
                            پرسیدن سوالات برنامه نویسی از طریق تلگرام
                        </a>
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
                            @if ($blog)
                                @include('landing.partials.blog')
                            @endif
                            @if ($latest_blogs && $latest_blogs->count())

                                <div class="row latest-blogs">

                                    @foreach ($latest_blogs as $blog)
                                        <div class="col-md-4">
                                            <div class="card card-plain card-blog">
                                                <div class="card-image">
                                                    <a href="{{$blog->public_link()}}">
                                                        <img class="img img-raised" src="{{$blog->image}}" alt="{{$blog->title}}" />
                                                    </a>
                                                </div>

                                                <div class="card-content">
                                                    <h6 class="category">
                                                        <a href="{{route('blogs_by_cat', urf($blog->category_name()))}}" class="text-info">
                                                            {{$blog->category_name()}}
                                                        </a>
                                                    </h6>
                                                    <h4 class="card-title">
                                                        <a href="{{$blog->public_link()}}">{{$blog->title}}</a>
                                                    </h4>
                                                    <p class="card-description">
                                                        {{short($blog->content, 100)}}
                                                        <hr>
                                                        <a href="{{$blog->public_link()}}"> <i class="fa fa-arrow-left ml-1"></i> ادامه مطلب </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            @endif
                        </div>

                    </div>

                </div>
            </div>

            <!--     *********    END BLOGS 1      *********      -->

        </div>

    </div>

    @include('landing.partials.random_blogs')

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
                <a href="#education" data-number="2">
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
                <a href="#features" data-number="3">
                    <span class="cd-dot"></span>
                    <span class="cd-label"> وبلاگ و مطالب ما چگونه است </span>
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
                <a href="#random-blogs" data-number="7">
                    <span class="cd-dot"></span>
                    <span class="cd-label"> مطالب اتفاقی </span>
                </a>
            </li>
        </ul>
    </nav>
@endsection
