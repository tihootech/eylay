<div class="subscribe-line subscribe-line-image" style="background-image: url('{{asset($course->bg)}}')">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="text-center">
					<h2 class="title">{{$course->title}}</h2>
				</div>

				<div class="card card-raised card-form-horizontal">
					<div class="card-content">
						<p class="description">
							<i class="material-icons text-primary ml-2">info</i>
							{{$course->info}}
						</p>
						<p class="description">
							<i class="material-icons text-primary ml-2">map</i>
							{{$course->supertitle}}
						</p>
						@unless ($course->status == 'closed')
							<hr>
							<form class="signup-form" action="{{route('signup')}}" autocomplete="off">
								<input type="hidden" name="course_id" class="data" value="{{$course->id}}">
								<div class="row">
									<div class="col-sm-6">
									   <div class="input-group">
										   <span class="input-group-addon">
											   <i class="material-icons text-primary">face</i>
										   </span>
										   <input required name="name" type="text" placeholder="نام شما..." class="form-control data" />
										   <small class="text-danger not-shown name-error">
											   نام شما باید ماکسیمم 150 کاراکتر باشد.
										   </small>
									   </div>
								   </div>
									<div class="col-sm-6">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons text-primary">phone</i>
											</span>
											<input required name="phone" type="text" placeholder="شماره تماس شما..." class="form-control data" />
											<small class="text-danger not-shown phone-error">
												شماره تماس باید یازده رقم باشد. مثال : 09187774455
											</small>
										</div>
									</div>
									<div class="col-sm-4 col-sm-offset-4 mt-5">
										<button type="submit" class="btn btn-primary btn-block">
											<i class="material-icons ml-2">person_add</i>
											ثبت نام در {{$course->title}}
										</button>
									</div>
								</div>
							</form>
						@endunless
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
