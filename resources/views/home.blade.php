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
        <div class="row">
            <div class="col-md-3">
                <div class="bs-component">
                    <ul class="list-group">
                        @foreach ($messages_list as $i => $messages)
                            <a class="list-group-item list-group-item-action @if($i==0) active @endif"
                                href="#dm-messages-{{$i}}" data-toggle="tab">
                                {{$messages[0]->user->name ?? 'Error'}}
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    @foreach ($messages_list as $i => $messages)
                        <div class="tab-pane fade @if($i==0) active show @endif" id="dm-messages-{{$i}}">
                            @include('dashboard.partials.message_box', ['message_type' => 'master'])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    @else
        @include('dashboard.partials.message_box', ['messages' => $user->messages, 'message_type'=>'user'])
    @endmaster

@endsection
