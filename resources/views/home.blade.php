@extends('layouts.dashboard')
@section('title')
    @lang('YOUR_PANEL')
@endsection
@section('content')

    {{-- <div class="tile">
        @if (auth()->user()->verified())
            <div class="alert alert-success">
                <i class="fa fa-check ml-1"></i>
                @lang('YOUR_EMAIL_IS_CONFIRMED')
            </div>
        @else
            <div class="alert alert-warning">
                <i class="fa fa-warning ml-1"></i>
                @lang('PLEASE_CONFIRM_YOUR_EMAIL')
                <a href="{{route('verification.notice')}}" class="btn btn-link"> @lang('CONFIRM_EMAIL') </a>
            </div>
        @endif
    </div> --}}

    @master
        Master Dashboard
    @else
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form class="tile messanger-form" action="{{route('message.store')}}">
                    <h3 class="tile-title"> پیام های شما </h3>
                    <div class="messanger">
                        <div class="messages">
                            <div class="message">
                                <img src="{{asset('assets/img/me.jpg')}}">
                                <p class="info">
                                    حساب کاربری شما با موفقیت ایجاد شده است.
                                </p>
                            </div>
                            @foreach ($user->messages as $dm)
                                @if ($dm->master)
                                    <div class="message">
                                		<img src="{{asset('assets/img/me.jpg')}}">
                                		<p class="info">
                                			{{$dm->body}}
                                		</p>
                                	</div>
                                @else
                                    <div class="message me">
                                		<img src="{{asset('assets/img/placeholder.jpg')}}">
                                		<p class="info">
                                			{{$dm->body}}
                                            <i class="material-icons">{{$dm->read ? 'done_all' : 'done'}}</i>
                                		</p>
                                	</div>
                                @endif
                            @endforeach
                        </div>
                        <div class="sender">
                            <input type="text" name="body" placeholder="ارسال پیام" autocomplete="off">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-lg fa-fw fa-paper-plane"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endmaster

@endsection
