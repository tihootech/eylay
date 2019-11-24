@extends('layouts.dashboard')
@section('title')
    @if($file->id) @lang('EDIT') {{$file->title}} @else @lang('NEW_FILE') @endif
@endsection
@section('content')

    <div class="tile text-left">
        <a href="{{route('file.index')}}" class="btn btn-primary btn-round">
            <i class="fa fa-list ml-2"></i>
            @lang('LIST_ALL') @lang('FILES')
        </a>
    </div>

	<div class="tile">
        <form class="row" action="{{$file->id ? route('file.update', $file->id) : route('file.store')}}" method="post" enctype="multipart/form-data">
			@csrf
            @if ($file->id)
                @method('PUT')
            @endif

            <div class="col-md-6 form-group">
				<label for="title"> @lang('TITLE') </label>
				<input type="text" class="form-control" name="title" id="title" value="{{old('title') ?? $file->title}}" required>
			</div>

            <div class="col-md-6 form-group">
				<label for="enter-path"> @lang('ENTER_PATH') </label>
				<input type="text" class="form-control" name="path" id="enter-path" value="{{old('path') ?? $file->path}}">
			</div>

            <div class="col-md-3 form-group">
				<label for="file"> @lang('UPLOAD') </label>
				<input type="file" class="form-control" name="upload_file" id="file">
			</div>

            <div class="col-md-5 form-group">
				<label for="link"> @lang('EXTERNAL_LINK') </label>
				<input type="text" class="form-control" name="link" id="link" value="{{old('link') ?? $file->link}}">
			</div>

            <div class="col-md-4 form-group">
				<label for="access"> @lang('ACCESS') </label>
				<input type="text" class="form-control" name="access" id="access" value="{{old('access') ?? $file->access ?? 'public'}}">
			</div>

            <div class="col-md-12 form-group">
				<label for="info"> @lang('INFO') </label>
				<textarea name="info" id="info" rows="4" class="form-control">{{old('info') ?? $file->info}}</textarea>
			</div>

            <hr class="w-100">
            <div class="col-md-2 mx-auto">
                <button type="submit" class="btn btn-primary btn-block"> @lang('SAVE') </button>
            </div>

		</form>
	</div>

@endsection
