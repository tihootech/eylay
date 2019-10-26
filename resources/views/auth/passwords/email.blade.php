@extends('layouts.landing')
@section('body_class') login-page @endsection
@section('title')
    <title> فراموشی رمزعبور </title>
@endsection

@section('content')
    <div class="page-header header-filter" filter-color="rose" style="background-image: url('{{asset('assets/img/login.jpg')}}'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">
                        <form class="form" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="header header-primary text-center">
                                <h4 class="card-title"> فراموشی رمزعبور </h4>
                            </div>
                            <p class="description text-center mt-3"> ایمیل خود را وارد کنید </p>

                            <div class="card-content">

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="input-group @error('email') has-error @enderror">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <input type="email" name="email" class="form-control has-error" placeholder="ایمیل..." required autofocus value="{{old('email')}}">
                                    @error('email')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-primary"> ارسال لینک بازنشانی رمزعبور </button>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="btn btn-primary btn-simple btn-wd" href="{{ route('register') }}">
                                            <i class="material-icons">person_add</i>
                                            ثبت نام کنید
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-primary btn-simple btn-wd" href="{{ route('login') }}">
                                            <i class="material-icons">person</i>
                                            ورود به حساب
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
