@extends('layouts.landing')
@section('body_class') blog-posts @endsection
@section('title')
    Eylay | در باره ما
@endsection


@section('content')

    <div class="page-header header-filter header-small about-bg" data-parallax="true">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<h1 class="title"> در باره ما </h1>
				</div>
			</div>
		</div>
	</div>

	<div class="main main-raised">
		<div class="container">
			<div class="section">

                <div class="alert alert-warning">
                    <h4>
                        <i class="fa fa-warning ml-2"></i>
                        این صفحه در دست ساخت است...
                    </h4>
                </div>

			</div>
		</div>
    </div>

    @include('includes.footer')

@endsection
