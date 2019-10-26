@extends('layouts.landing')
@section('body_class') login-page @endsection
@section('title')
    <title> بازنشانی رمزعبور </title>
@endsection

@section('content')
    <div class="page-header header-filter" filter-color="rose" style="background-image: url('{{asset('assets/img/login.jpg')}}'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">
                        <form class="form" method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="header header-primary text-center">
                                <h4 class="card-title">  بازنشانی رمزعبور </h4>
                            </div>
                            <p class="description mt-3 text-center">
                                رمزعبور جدید خود را وارد کنید. حداقل 8 کاراکتر
                            </p>
                            <div class="card-content">

                                <div class="input-group @error('email') has-error @enderror">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <input type="email" name="email" class="form-control has-error" placeholder="ایمیل..." required value="{{ $email ?? old('email') }}">
                                    @error('email')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group @error('password') has-error @enderror ">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input type="password" name="password" placeholder="رمزعبور..." class="form-control" / required>
                                    @error('password')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input type="password" name="password_confirmation" placeholder="تکرار رمزعبور..." class="form-control" required/>
                                </div>

                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-primary"> تغییر رمزعبور </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.footer')
    </div>
@endsection
