@extends('layouts.dashboard')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-header">
				مدیریت حساب کاربری
			</div>
			<div class="card-body">
				<form class="row justify-content-center" action="{{url('acc')}}" method="post">
					@csrf
					@method('PUT')

					<div class="col-md-3 form-group">
						<label for="email"> @lang('EMAIL') </label>
						<input type="text" class="form-control" name="email" id="email" value="{{$user->email}}" disabled>
					</div>

					<div class="col-md-3 form-group">
						<label for="name"> @lang('NAME') </label>
						<input type="text" class="form-control" name="name" id="name" value="{{old('name') ?? $user->name}}">
					</div>

					<div class="col-md-3 form-group">
						<label for="new-password"> @lang('NEW_PASSWORD') </label>
						<input type="password" class="form-control" name="new_password" id="new-password" autocomplete="off">
					</div>

					<div class="col-md-3 form-group">
						<label for="repeat-password"> @lang('CONFIRM_NEW_PASSWORD') </label>
						<input type="password" class="form-control" name="new_password_confirmation" id="repeat-password">
					</div>

					<div class="w-100"></div>
					<div class="col-md-9 text-info text-center">
						<i class="fa fa-asterisk ml-1"></i>
						در صورتی که تمایل به تغییر رمز عبور دارید میتوانید رمز عبور جدید و تکرار آن را وارد کنید، در غیر اینصورت میتوانید فیلد را خالی بگذارید.
					</div>

					<hr class="w-100">


					<div class="col-md-3 form-group">
						<label for="current-password"> @lang('CURRENT_PASSWORD') </label>
						<input type="password" class="form-control" name="current_password" id="current-password">
					</div>
					<div class="w-100"></div>
					<div class="col-md-9 text-info text-center">
						<i class="fa fa-asterisk ml-1"></i>
						برای تغییر نام کاربری و یا رمزعبور نیاز به وارد کردن رمزعبور فعلی خود دارید.
					</div>

					<hr class="w-100">

					<div class="col-md-2">
						<button type="submit" class="btn btn-primary btn-block"> @lang('SAVE') </button>
					</div>

				</form>
			</div>
		</div>
	</div>
@endsection
