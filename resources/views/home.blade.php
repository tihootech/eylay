@extends('layouts.landing')
@section('body_class') profile-page @endsection

@section('title')
    <title> حساب کاربری {{user('name')}} </title>
@endsection


@section('content')

    <div class="page-header header-filter" data-parallax="true" style="background-image: url('../assets/img/examples/city.jpg');"></div>

    <div class="main main-raised">
		<div class="profile-content">
            <div class="container">

                <div class="row">
	                <div class="col-xs-6 col-xs-offset-3">
        	           <div class="profile">
	                        <div class="avatar">
	                            <img src="../assets/img/faces/christian.jpg" alt="Circle Image" class="img-circle img-responsive img-raised">
	                        </div>
	                        <div class="name">
	                            <h3 class="title">Christian Louboutin</h3>
								<h6>Designer</h6>
								<a href="#pablo" class="btn btn-just-icon btn-simple btn-dribbble"><i class="fa fa-dribbble"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-simple btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-simple btn-pinterest"><i class="fa fa-pinterest"></i></a>
	                        </div>
	                    </div>
    	            </div>
                    <div class="col-xs-2 follow">
	                   <button class="btn btn-fab btn-primary" rel="tooltip" title="Follow this user">
                            <i class="material-icons">add</i>
                        </button>
	                </div>
                </div>


                <div class="description text-center">
                    <p>An artist of considerable range, Chet Faker — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. </p>
                </div>

				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="profile-tabs">
		                    <div class="nav-align-center">
								<ul class="nav nav-pills nav-pills-icons" role="tablist">
									<li class="active">
			                            <a href="#work" role="tab" data-toggle="tab">
											<i class="material-icons">palette</i>
											Work
			                            </a>
			                        </li>
                                    <li>
										<a href="#connections" role="tab" data-toggle="tab">
											<i class="material-icons">people</i>
											Connections
										</a>
									</li>
			                        <li>
			                            <a href="#media" role="tab" data-toggle="tab">
											<i class="material-icons">camera</i>
			                                Media
			                            </a>
			                        </li>
			                    </ul>


							</div>
						</div>
						<!-- End Profile Tabs -->
					</div>
                </div>
                <div class="tab-content">
			        <div class="tab-pane active work" id="work">
				        <div class="row">
	                        <div class="col-md-7 col-md-offset-1">
		                        <h4 class="title">Latest Collections</h4>
		                        <div class="row collections">
			                        <div class="col-md-6">
			                            <div class="card card-background" style="background-image: url('../assets/img/examples/chris4.jpg')">
                    						<a href="#pablo"></a>
                    						<div class="card-content">
                    							<label class="label label-primary">Spring 2016</label>
                    							<a href="#pablo">
                    								<h2 class="card-title">Stilleto</h2>
                    							</a>
                    						</div>
                    					</div>
			                        </div>
                                    <div class="col-md-6">
			                            <div class="card card-background" style="background-image: url('../assets/img/examples/chris6.jpg')">
                    						<a href="#pablo"></a>
                    						<div class="card-content">
                    							<label class="label label-primary">Spring 2016</label>
                    							<a href="#pablo">
                    								<h2 class="card-title">High Heels</h2>
                    							</a>
                    						</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
			                            <div class="card card-background" style="background-image: url('../assets/img/examples/chris5.jpg')">
                    						<a href="#pablo"></a>
                    						<div class="card-content">
                    							<label class="label label-primary">Summer 2016</label>
                    							<a href="#pablo">
                    								<h2 class="card-title">Flats</h2>
                    							</a>
                    						</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
			                            <div class="card card-background" style="background-image: url('../assets/img/examples/chris1.jpg')">
                    						<a href="#pablo"></a>
                    						<div class="card-content">
                    							<label class="label label-primary">Winter 2015</label>
                    							<a href="#pablo">
                    								<h2 class="card-title">Men's Sneakers</h2>
                    							</a>
                    						</div>
                                        </div>
                                    </div>
                                </div>
		                    </div>
		                    <div class="col-md-2 col-md-offset-1 stats">
			                    <h4 class="title">Stats</h4>
			                    <ul class="list-unstyled">
				                    <li><b>60</b> Products</li>
				                    <li><b>4</b> Collections</li>
				                    <li><b>331</b> Influencers</li>
				                    <li><b>1.2K</b> Likes</li>
				                </ul>
				                <hr />
				                <h4 class="title">About his Work</h4>
				                <p class="description">French luxury footwear and fashion. The footwear has incorporated shiny, red-lacquered soles that have become his signature.</p>
				                <hr />
				                <h4 class="title">Focus</h4>
				                <span class="label label-primary">Footwear</span>
				                <span class="label label-rose">Luxury</span>
			                </div>
	                    </div>
			        </div>
                    <div class="tab-pane connections" id="connections">
                        <div class="row">
            				<div class="col-md-5 col-md-offset-1">
            					<div class="card card-profile card-plain">
            						<div class="col-md-5">
            							<div class="card-image">
            								<a href="#pablo">
            									<img class="img" src="../assets/img/faces/avatar.jpg" />
            								</a>
            							</div>
            						</div>
            						<div class="col-md-7">
            							<div class="card-content">
            								<h4 class="card-title">Gigi Hadid</h4>
            								<h6 class="category text-muted">Model</h6>

            								<p class="card-description">
            									Don't be scared of the truth because we need to restart the human foundation in truth...
            								</p>
            							</div>
            						</div>
            					</div>
            				</div>

            				<div class="col-md-5">
            					<div class="card card-profile card-plain">
            						<div class="col-md-5">
            							<div class="card-image">
            								<a href="#pablo">
            									<img class="img" src="../assets/img/faces/marc.jpg" />
            								</a>
            							</div>
            						</div>
            						<div class="col-md-7">
            							<div class="card-content">
            								<h4 class="card-title">Marc Jacobs</h4>
            								<h6 class="category text-muted">Designer</h6>

            								<p class="card-description">
            									Don't be scared of the truth because we need to restart the human foundation in truth...
            								</p>
            							</div>
            						</div>
            					</div>
            				</div>
                        </div>
                        <div class="row">
            				<div class="col-md-5 col-md-offset-1">
            					<div class="card card-profile card-plain">
            						<div class="col-md-5">
            							<div class="card-image">
            								<a href="#pablo">
            									<img class="img" src="../assets/img/faces/kendall.jpg" />
            								</a>
            							</div>
            						</div>
            						<div class="col-md-7">
            							<div class="card-content">
            								<h4 class="card-title">Kendall Jenner</h4>
            								<h6 class="category text-muted">Model</h6>

            								<p class="card-description">
            									I love you like Kanye loves Kanye. Don't be scared of the truth.
            								</p>
            							</div>
            						</div>
            					</div>
            				</div>

            				<div class="col-md-5">
            					<div class="card card-profile card-plain">
            						<div class="col-md-5">
            							<div class="card-image">
            								<a href="#pablo">
            									<img class="img" src="../assets/img/faces/card-profile2-square.jpg" />
            								</a>
            							</div>
            						</div>
            						<div class="col-md-7">
            							<div class="card-content">
            								<h4 class="card-title">George West</h4>
            								<h6 class="category text-muted">Model/DJ</h6>

            								<p class="card-description">
            									I love you like Kanye loves Kanye.
            								</p>
            							</div>
            						</div>
            					</div>
            				</div>

            			</div>
                    </div>
                    <div class="tab-pane text-center gallery" id="media">
						<div class="row">
							<div class="col-md-3 col-md-offset-3">
								<img src="../assets/img/examples/chris4.jpg" class="img-rounded" />
								<img src="../assets/img/examples/chris6.jpg" class="img-rounded" />
							</div>
							<div class="col-md-3">
								<img src="../assets/img/examples/chris7.jpg" class="img-rounded" />
								<img src="../assets/img/examples/chris5.jpg" class="img-rounded" />
								<img src="../assets/img/examples/chris9.jpg" class="img-rounded" />
							</div>
						</div>
                    </div>
			    </div>
            </div>
        </div>
	</div>

    @include('includes.footer')


@endsection
