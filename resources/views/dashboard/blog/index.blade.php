@extends('layouts.dashboard')
@section('title')
    @lang('BLOGS')
@endsection
@section('content')

    <div class="tile text-left">
        <a href="{{route('blog.create')}}" class="btn btn-primary btn-round">
            <i class="fa fa-plus ml-2"></i>
            @lang('NEW_BLOG')
        </a>
    </div>

	<div class="tile">
        @if ($blogs->count())
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col"> @lang('ROW') </th>
                        <th scope="col"> @lang('TITLE') </th>
                        <th scope="col"> @lang('CATEGORY') </th>
                        <th scope="col"> @lang('AUTHOR') </th>
                        <th scope="col"> @lang('CONTENT') </th>
                        <th scope="col" colspan="2"> @lang('OPERATIONS') </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $i => $blog)
                        <tr>
                            <th scope="row"> {{$i+1}} </th>
                            <td> {{$blog->title}} </td>
                            <td> {{$blog->category->name ?? 'Database Error'}} </td>
                            <td> {{$blog->author_name()}} </td>
                            <td> {{short($blog->content, 50)}} </td>
                            <td>
                                <a href="{{route('blog.edit', $blog->id)}}" class="btn btn-round btn-outline-success">
                                    <i class="fa fa-edit ml-2"></i>
                                    @lang('EDIT')
                                </a>
                            </td>
                            <td>
                                <form class="d-inline" action="{{route('blog.destroy', $blog->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-round btn-outline-danger delete">
                                        <i class="fa fa-trash ml-2"></i>
                                        @lang('DELETE')
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning">
                <i class="fa fa-warning ml-2"></i>
                @lang('NOTHING_FOUND')
            </div>
        @endif
	</div>

@endsection
