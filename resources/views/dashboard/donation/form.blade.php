@extends('layouts.dashboard')
@section('title')
    @if($donation->id) @lang('EDIT') {{$donation->title}} @else @lang('NEW_DONATION') @endif
@endsection
@section('content')

    <div class="tile text-left">
        <a href="{{route('donation.index')}}" class="btn btn-primary btn-round">
            <i class="fa fa-list ml-2"></i>
            @lang('LIST_ALL') @lang('DONATIONS')
        </a>
    </div>

	<div class="tile">
        <form class="row" action="{{$donation->id ? route('donation.update', $donation->id) : route('donation.store')}}" method="post" enctype="multipart/form-data">
			@csrf
            @if ($donation->id)
                @method('PUT')
            @endif

            <div class="col-md-4 form-group">
				<label for="name"> @lang('NAME') </label>
				<input type="text" class="form-control" name="name" id="name" value="{{old('name') ?? $donation->name}}" required>
			</div>

            <div class="col-md-4 form-group">
				<label for="amount"> @lang('AMOUNT_IN_TOMANS') </label>
				<input type="number" class="form-control" name="amount" id="amount" value="{{old('amount') ?? $donation->amount}}" required>
			</div>

            <div class="col-md-4 form-group">
				<label for="mobile"> @lang('MOBILE') </label>
				<input type="text" class="form-control" name="mobile" id="mobile" value="{{old('mobile') ?? $donation->mobile}}">
			</div>

            <div class="col-md-12 form-group">
				<label for="info"> @lang('INFO') </label>
				<textarea name="info" id="info" rows="4" class="form-control">{{old('info') ?? $donation->info}}</textarea>
			</div>

            <div class="col-md-12 form-group">
				<label for="reply"> @lang('REPLY') </label>
				<textarea name="reply" id="reply" rows="4" class="form-control">{{old('reply') ?? $donation->reply}}</textarea>
			</div>

            <hr class="w-100">
            <div class="col-md-2 mx-auto">
                <button type="submit" class="btn btn-primary btn-block"> @lang('SAVE') </button>
            </div>

		</form>
	</div>

@endsection
