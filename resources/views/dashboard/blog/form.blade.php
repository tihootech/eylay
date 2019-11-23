@extends('layouts.dashboard')
@section('title')
    @if($blog->id) @lang('EDIT') {{$blog->title}} @else @lang('NEW_BLOG') @endif
@endsection
@section('content')

    <div class="tile text-left">
        <a href="{{route('blog.index')}}" class="btn btn-primary btn-round">
            <i class="fa fa-list ml-2"></i>
            @lang('LIST_ALL') @lang('BLOGS')
        </a>
    </div>

	<div class="tile">
        <form class="row justify-content-center" action="{{$blog->id ? route('blog.update', $blog->id) : route('blog.store')}}" method="post" enctype="multipart/form-data">
			@csrf
            @if ($blog->id)
                @method('PUT')
            @endif
			<div class="col-md-3 form-group">
				<label for="title"> @lang('TITLE') </label>
				<input type="text" class="form-control" name="title" id="title" value="{{old('title') ?? $blog->title}}" required>
			</div>


            <div class="col-md-3 form-group">
				<label for="image"> @lang('IMAGE') </label>
				<input type="file" class="form-control" name="image" id="image" @unless($blog->id) required @endunless>
			</div>

            <div class="col-md-3 form-group">
				<label for="bg"> @lang('BG') </label>
				<input type="file" class="form-control" name="bg" id="bg" @unless($blog->id) required @endunless>
			</div>

            <hr class="w-100">

            <div class="col-md-3 form-group">
				<label for="category-id"> @lang('SELECT_CATEGORY') </label>
				<select class="select2" name="category_id" id="category-id">
                    <option value=""></option>
                    @foreach ($cats as $cat)
                        <option value="{{$cat->id}}" @if( old('category_id') ?? $blog->category_id == $cat->id ) selected @endif> {{$cat->name}} </option>
                    @endforeach
                </select>
			</div>

			<div class="col-md-3 form-group">
				<label for="category-name"> @lang('NEW_CATEGORY') </label>
				<input type="text" class="form-control" name="category_name" id="category-name" value="{{old('category_name')}}">
			</div>

            <hr class="w-100">

            <div class="col-md-12 form-group">
				<label for="tags"> @lang('TAGS') (@lang('SEPERATE_BY_ENTER')) </label>
				<textarea name="tags" id="tags" rows="4" class="form-control">{{old('tags') ?? $blog->tags}}</textarea>
			</div>

            <div class="col-md-12 form-group">
				<label for="content"> @lang('CONTENT') </label>
				<textarea name="content" id="content" rows="8" class="form-control" required>{!!old('content') ?? $blog->content!!}</textarea>
			</div>

            <hr class="w-100">
            <div class="col-md-2 mx-auto">
                <button type="submit" class="btn btn-primary btn-block"> @lang('SAVE') </button>
            </div>

		</form>
	</div>

    @include('dashboard.partials.display_images', ['object' => $blog])

@endsection
