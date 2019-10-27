@extends('layouts.dashboard')
@section('title')
    <title>@lang('YOUR_PANEL')</title>
@endsection
@section('content')

    @if (auth()->user()->verified())
        <div class="alert alert-success">
            <i class="material-icons text-light mr-2">done</i>
            @lang('YOUR_EMAIL_IS_CONFIRMED')
        </div>
    @else
        <div class="alert alert-warning">
            <i class="material-icons text-light mr-2">warning</i>
            @lang('PLEASE_CONFIRM_YOUR_EMAIL')
            <a href="{{route('verification.notice')}}" class="btn btn-outline-dark mr-auto"> @lang('CONFIRM_EMAIL') </a>
        </div>
    @endif

@endsection
