@extends('layouts.landing')
@section('body_class') blog-posts @endsection
@section('title')
    Eylay | دانلود فایل های آموزشی
@endsection


@section('content')

    <div class="page-header header-filter header-small download-bg" data-parallax="true">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<h1 class="title"> دانلود فایل های آموزشی </h1>
				</div>
			</div>
		</div>
	</div>

	<div class="main main-raised">
		<div class="container">
			<div class="section">

                <div class="row">
                    @foreach ($files as $i => $file)
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-content {{$i%2 == 0 ? 'content-primary' : 'content-rose'}}">
                                    <h4 class="card-title">
                                        {{$file->title}}
                                    </h4>
                                    <p class="card-description">
                                        {{$file->info}}
                                    </p>
                                    <div class="footer text-center">
                                        <a href="{{asset($file->path)}}" download class="btn btn-white btn-round">
                                            <i class="material-icons ml-2">cloud_download</i>
                                            دانلود
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

    @include('includes.footer')

@endsection
