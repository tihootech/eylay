@extends('layouts.landing')
@section('body_class') signup-page @endsection
@section('title')
    <title> ایجاد حساب کاربری </title>
@endsection

@section('content')
    <div class="page-header header-filter" filter-color="rose" style="background-image: url('{{asset('assets/img/register.jpg')}}'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <div class="card card-signup">
                        <h2 class="card-title text-center">ثبت نام</h2>
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <div class="info info-horizontal">
                                    <div class="icon icon-rose">
                                        <i class="material-icons">timeline</i>
                                    </div>
                                    <div class="description">
                                        <h4 class="info-title">آزمون های برنامه نویسی</h4>
                                        <p class="description">
                                            دسترسی به آزمون های برنامه نویسی جهت تایین سطح
                                        </p>
                                    </div>
                                </div>

                                <div class="info info-horizontal">
                                    <div class="icon icon-primary">
                                        <i class="material-icons">code</i>
                                    </div>
                                    <div class="description">
                                        <h4 class="info-title">کد های آماده</h4>
                                        <p class="description">
                                            دسترسی به کد های آماده جهت استفاده در برنامه نویسی
                                        </p>
                                    </div>
                                </div>

                                <div class="info info-horizontal">
                                    <div class="icon icon-info">
                                        <i class="material-icons">group</i>
                                    </div>
                                    <div class="description">
                                        <h4 class="info-title"> دوره های حضوری </h4>
                                        <p class="description">
                                            امکانات ویژه برای کسانی که در دوره های حضوری ما ثبت نام میکنند
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">

                                <form class="form" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="card-content">
                                        <div class="input-group @error('name') has-error @enderror ">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <input type="text" name="name" class="form-control" placeholder="نام شما..." required value="{{old('name')}}">
                                            @error('name')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="input-group @error('email') has-error @enderror ">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <input type="email" name="email" class="form-control" placeholder="ایمیل..." required value="{{old('email')}}">
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
                                        <button type="submit" class="btn btn-primary btn-round"> ثبت نام </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @include('includes.footer')
    </div>
@endsection
