<div class="card-content">



	<div class="input-group @error('email') has-error @enderror">
		<span class="input-group-addon">
			<i class="material-icons">email</i>
		</span>
		<input type="email" name="email" class="form-control has-error" placeholder="ایمیل..." required value="{{old('email')}}">
		@error('email')
			<span class="text-danger">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>

	<div class="input-group @error('password') has-error @enderror">
		<span class="input-group-addon">
			<i class="material-icons">lock_outline</i>
		</span>
		<input type="password" name="password" placeholder="رمزعبور..." class="form-control" / required>
	</div>

	<div class="checkbox">
		<label>
			<input type="checkbox" name="remember">
			مرابه خاطر بسپار
		</label>
	</div>
</div>
