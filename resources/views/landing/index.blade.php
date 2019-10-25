<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/favicon.ico')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title> Eylay </title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">
    <link href="{{asset('assets/css/material-kit.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/rtl.css')}}" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('assets/assets-for-demo/vertical-nav.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/assets-for-demo/demo.css')}}" rel="stylesheet" />

</head>

<body class="index-page">
    <nav class="navbar navbar-default navbar-transparent navbar-fixed-top navbar-color-on-scroll" color-on-scroll=" " id="sectionsNav">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="presentation.html">Eylay</a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.html">
                            <i class="material-icons">group_add</i> ثبت نام در دوره های آموزشی
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="material-icons">view_day</i> صفحات وبسایت
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-with-icons">

                            <li>
                                <a href="sections.html#blogs">
                                    <i class="material-icons">collections</i> وبلاگ
                                </a>
                            </li>
                            <li>
                                <a href="sections.html#blogs">
                                    <i class="material-icons">movie</i> ویدئو های آموزشی
                                </a>
                            </li>
                            <li>
                                <a href="sections.html#blogs">
                                    <i class="material-icons">business</i> دوره های حضوری
                                </a>
                            </li>
                            <li>
                                <a href="sections.html#blogs">
                                    <i class="material-icons">comment</i> نظرات کاربران
                                </a>
                            </li>
                            <li>
                                <a href="sections.html#blogs">
                                    <i class="material-icons">person</i> درباره من
                                </a>
                            </li>
                            <li>
                                <a href="sections.html#headers">
                                    <i class="material-icons">cloud_download</i> دانلود فایل  دوره های آموزشی
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="button-container">
                        <a href="{{route('home')}}" target="_blank" class="btn btn-rose btn-round">
                            <i class="material-icons">person</i> ناحیه کاربری
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="page-header header-filter clear-filter" data-parallax="true" style="background-image: url('{{asset('assets/img/bg0.jpg')}}');" id="header">
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
                            <a href="https://t.me/eylay" target="_blank" class="btn btn-rose"> پرسیدن سوال </a>
                            <hr>
                            <h2> نحوه آموزش ما چگونه است؟ </h2>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-rose">
                                    <i class="material-icons">movie</i>
                                </div>
                                <h4 class="info-title">ویدئو های آموزشی</h4>
                                <p>تهیه ویدئو های آموزشی از مباحث و زبان های مختلف برنامه نویسی در سطح های مختلف (از مبتدی تا پیشرفته) به صورت جامع و با الگوگیری از ویدئو های آموزشی سایت لیندا . لیندا یک از کامل ترین منابع آموزشی به زبان انگلیسی میباشد.</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-rose">
                                    <i class="material-icons">file_copy</i>
                                </div>
                                <h4 class="info-title">فایل ها</h4>
                                <p>یکی از مشکلاتی که برخی از ویدئو های آموزشی دارند این است که فایل های استفاده شده در اختیار کدآموزان قرار نمیگیرد. در ایلای تمام فایل ها و کد های استفاده شده در پروژه، در قالب یک فایل فشرده در اختیار کدآموز قرار میگیرد.</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-rose">
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

                        <div class="col-md-5 col-md-offset-1">
                            <div class="card card-plain">
                                <a href="#pablo">
                                    <div class="card-image">
                                        <img src="{{asset('assets/img/examples/card-project1.jpg')}}" />
                                    </div>
                                </a>
                                <div class="card-content">
                                    <h6 class="category">Web Design</h6>
                                    <a href="#pablo">
                                        <h4 class="card-title">Famous Website Redesign</h4>
                                    </a>
                                    <p class="card-description">
                                        Don't be scared of the truth because we need to restart the human foundation in truth.
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card card-plain">
                                <a href="#pablo">
                                    <div class="card-image">
                                        <img src="{{asset('assets/img/examples/card-project2.jpg')}}" />
                                    </div>
                                </a>
                                <div class="card-content">
                                    <h6 class="category">Productivity Tools</h6>
                                    <a href="#pablo">
                                        <h4 class="card-title">Beautiful Desktop for Designers</h4>
                                    </a>
                                    <p class="card-description">
                                        Don't be scared of the truth because we need to restart the human foundation in truth.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="#" class="btn btn-round"> مشاهده همه </a>
                    </div>

                </div>
            </div>

            <!--     *********    END PROJECTS 3      *********      -->

            <!--     *********    PROJECTS 1     *********      -->

            <div class="projects-1" id="projects-1">

                <div class="container">

                    <h2 class="title text-center">ویدئو های آموزشی</h2>

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">

                        </div>

                        <div class="col-md-6">
                            <div class="card card-raised card-background" style="background-image: url('{{asset('assets/img/examples/office2.jpg')}}')">

                                <div class="card-content">
                                    <h6 class="category text-info">Productivity</h6>
                                    <a href="#pablo">
                                        <h3 class="card-title">The Best Productivity Apps on Market</h3>
                                    </a>
                                    <p class="card-description">
                                        Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                    </p>
                                    <a href="#pablo" class="btn btn-rose btn-round">
                                        <i class="material-icons">content_copy</i> View App
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card card-raised card-background" style="background-image: url('{{asset('assets/img/examples/card-blog3.jpg')}}')">
                                <div class="card-content">
                                    <h6 class="category text-info">Design</h6>
                                    <h3 class="card-title">The Sculpture Where Details Matter</h3>
                                    <p class="card-description">
                                        Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                    </p>
                                    <a href="#pablo" class="btn btn-rose btn-round">
                                        <i class="material-icons">build</i> View Project
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card card-raised card-background" style="background-image: url('{{asset('assets/img/examples/card-project6.jpg')}}')">
                                <div class="card-content">
                                    <h6 class="category text-info">Marketing</h6>
                                    <h3 class="card-title">0 to 100.000 Customers in 6 months</h3>
                                    <p class="card-description">
                                        Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                    </p>
                                    <a href="#pablo" class="btn btn-rose btn-round">
                                        <i class="material-icons">subject</i> Case Study
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!--     *********    END PROJECTS 1      *********      -->

        </div>

        <div class="cd-section" id="testimonials">

            <!--     *********    TESTIMONIALS 1     *********      -->

            <div class="testimonials-1 section-image" style="background-image: url({{asset('assets/img/dg2.jpg')}})">

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

        <div class="cd-section" id="contactus">

            <!--     *********    CONTACT US 1     *********      -->

            <div class="contactus-1 section-image" style="background-image: url('{{asset('assets/img/examples/city.jpg')}}')">

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="card card-contact">
                                <form role="form" id="contact-form" method="post">
                                    <div class="header header-raised header-primary text-center">
                                        <h4 class="card-title"> عضویت در سایت </h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="form-group label-floating">
                                            <label class="control-label"> نام کاربری </label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label"> ایمیل </label>
                                            <input type="email" name="email" class="form-control" />
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary btn-block">ثبت نام</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

    <footer class="footer">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="http://www.creative-tim.com">
                        Creative Tim
                    </a>
                    </li>
                    <li>
                        <a href="http://presentation.creative-tim.com">
                       About Us
                    </a>
                    </li>
                    <li>
                        <a href="http://blog.creative-tim.com">
                       Blog
                    </a>
                    </li>
                    <li>
                        <a href="http://www.creative-tim.com/license">
                        Licenses
                    </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, made with <i class="material-icons">favorite</i> by Creative Tim for a better web.
            </div>
        </div>
    </footer>

    <nav id="cd-vertical-nav">
        <ul>
            <li>
                <a href="#header" data-number="1">
                    <span class="cd-dot"></span>
                    <span class="cd-label">Headers</span>
                </a>
            </li>
            <li>
                <a href="#features" data-number="2">
                    <span class="cd-dot"></span>
                    <span class="cd-label">Features</span>
                </a>
            </li>
            <li>
                <a href="#projects" data-number="3">
                    <span class="cd-dot"></span>
                    <span class="cd-label">Projects</span>
                </a>
            </li>
            <li>
                <a href="#testimonials" data-number="4">
                    <span class="cd-dot"></span>
                    <span class="cd-label">Testimonials</span>
                </a>
            </li>
            <li>
                <a href="#blogs" data-number="5">
                    <span class="cd-dot"></span>
                    <span class="cd-label">Blogs</span>
                </a>
            </li>
            <li>
                <a href="#contactus" data-number="6">
                    <span class="cd-dot"></span>
                    <span class="cd-label">Contact Us</span>
                </a>
            </li>
            <li>
                <a href="#pricing" data-number="7">
                    <span class="cd-dot"></span>
                    <span class="cd-label">Pricing</span>
                </a>
            </li>
        </ul>
    </nav>

</body>
<!--   Core JS Files   -->
<script src="{{asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/material.min.js')}}"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('assets/js/moment.min.js')}}"></script>

<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('assets/js/nouislider.min.js')}}" type="text/javascript"></script>

<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{asset('assets/js/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>

<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{asset('assets/js/bootstrap-selectpicker.js')}}" type="text/javascript"></script>

<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
<script src="{{asset('assets/js/bootstrap-tagsinput.js')}}"></script>

<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('assets/js/jasny-bootstrap.min.js')}}"></script>

<!-- Plugin For Google Maps -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="{{asset('assets/js/material-kit.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/main.js')}}" type="text/javascript"></script>

<!-- Fixed Sidebar Nav - JS For Demo Purpose, Don't Include it in your project -->
<script src="{{asset('assets/assets-for-demo/modernizr.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/assets-for-demo/vertical-nav.js')}}" type="text/javascript"></script>

</html>
