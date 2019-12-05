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
        <div class="text-center">
            <a href="#master-messages" data-toggle="collapse" class="btn btn-primary"> نمایش پیام های ارسالی </a>
            <a href="{{route('user.activities')}}" class="btn btn-primary"> ACTIVITIES </a>
        </div>
        <div class="collapse" id="master-messages">

            <hr>
            <div class="tile">

                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills">
                            @foreach ($messages_list as $i => $messages)
                                <a class="nav-link @if($i==0) active @endif" data-toggle="pill" href="#dm-messages-{{$i+1}}">
                                    {{$messages[0]->user->name ?? 'Error'}}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            @foreach ($messages_list as $i => $messages)
                                <div class="tab-pane fade @if($i==0) show active @endif" id="dm-messages-{{$i+1}}">
                                    @include('dashboard.partials.message_box', ['message_type' => 'master'])
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>

    @else
        @include('dashboard.partials.message_box', ['messages' => $user->messages, 'message_type'=>'user'])
    @endmaster

@endsection
