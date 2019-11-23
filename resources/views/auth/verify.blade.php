@extends('layouts.dashboard')
@section('title')
    @lang('VERIFY_EMAIL')
@endsection
@section('content')
    <div class="card">
        <div class="card-header card-header-primary">
            <h5 class="card-title ">@lang('VERIFY_YOUR_EMAIL_ADDRESS')</h5>
        </div>

        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    @lang('A_FRESH_VERIFICATION_LINK_HAS_BEEN_SENT_TO_YOUR_EMAIL_ADDRESS')
                </div>
            @endif

            <div class="alert alert-warning">
                {{ __('BEFORE_PROCEEDING_PLEASE_CHECK_YOUR_EMAIL_FOR_A_VERIFICATION_LINK') }}
                {{ __('IF_YOU_DID_NOT_RECEIVE_THE_EMAIL') }}
                {{ __('CLICK_HERE_TO_REQUEST_ANOTHER') }}
            </div>
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-primary">{{ __('CLICK_HERE_TO_REQUEST_ANOTHER') }}</button>
            </form>
        </div>
    </div>
@endsection
