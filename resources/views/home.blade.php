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
        @foreach ($messages_list as $messages)
            @include('dashboard.partials.message_box', ['message_type' => 'master'])
        @endforeach
    @else
        @include('dashboard.partials.message_box', ['messages' => $user->messages, 'message_type'=>'user'])
    @endmaster

@endsection
