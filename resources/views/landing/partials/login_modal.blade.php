<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="card card-signup card-plain">
				<div class="modal-header">
					<button type="button" class="close ml-2" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>

					<div class="header header-primary text-center">
						<h4 class="card-title">ورود به حساب کاربری</h4>
					</div>
				</div>
				<div class="modal-body">
					<form class="form" method="POST" action="{{ route('login') }}">
                        @csrf
						<p class="description text-center mt-3"> ایمیل و رمز عبور خود را وارد کنید </p>
						@include('landing.partials.login_inputs')
					</form>
				</div>
				<div class="modal-footer text-center">
                    <button type="submit" class="btn btn-primary">ورود به حساب کاربری</button>
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-primary btn-simple btn-wd" href="{{ route('register') }}">
                                <i class="material-icons">person_add</i>
                                ثبت نام کنید
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-primary btn-simple btn-wd" href="{{ route('password.request') }}">
                                <i class="material-icons">lock_open</i>
                                فراموشی رمزعبور
                            </a>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--  End Modal -->
