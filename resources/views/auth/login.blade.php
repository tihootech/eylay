@extends('layouts.landing')
@section('body_class') login-page @endsection
@section('title')
    <title> ورود به حساب کاربری </title>
@endsection

@section('content')
    <div class="page-header header-filter" filter-color="rose" style="background-image: url('{{asset('assets/img/login.jpg')}}'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">
                        <form class="form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="header header-primary text-center">
                                <h4 class="card-title"> ورود به حساب کاربری </h4>
                            </div>
                            <p class="description text-center mt-30"> ایمیل و رمز عبور خود را وارد کنید </p>
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
                            <div class="footer text-center">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.footer')
    </div>
@endsection
