@extends('layouts.dashboard')
@section('title')
    @lang('COMMENTS')
@endsection
@section('content')

    <div class="tile text-left">
        <a href="{{route('comment.create')}}" class="btn btn-primary btn-round">
            <i class="fa fa-plus ml-2"></i>
            @lang('FAKE_COMMENT')
        </a>
        <form class="d-inline" action="{{route('confirm_all_comments')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-warning btn-round">
                <i class="fa fa-check ml-2"></i>
                @lang('CONFIRM_ALL_COMMENTS')
            </button>
        </form>
    </div>

	<div class="tile">
        @if ($comments->count())
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col"> @lang('ROW') </th>
                        <th scope="col"> @lang('OWNER') </th>
                        <th scope="col"> @lang('AUTHOR') </th>
                        <th scope="col"> @lang('CONTENT') </th>
                        <th scope="col"> @lang('CONFIRMED') </th>
                        <th scope="col" colspan="3"> @lang('OPERATIONS') </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $i => $comment)
                        <tr>
                            <th scope="row"> {{$i+1}} </th>
                            <td class="calibri">
                                <a href="{{$comment->owner ? $comment->owner->public_link() : '#'}}" target="_blank">
                                    {{$comment->owner_type}}\{{$comment->owner_id}}
                                </a>
                            </td>
                            <td>
                                @if ($comment->author_name())
                                    <a href="{{route('user.show', $comment->author_id)}}">
                                        {{$comment->author_name()}}
                                    </a>
                                @else
                                    <em> {{ __('GUEST') }} </em>
                                @endif
                            </td>
                            <td> {{short($comment->content, 50)}} </td>
                            <td>
                                @include('dashboard.partials.yesno', ['boolean' => $comment->confirmed])
                            </td>
                            <td>
                                <form class="d-inline" action="{{route('comment.confirm', $comment->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    @if ($comment->confirmed)
                                        <button type="submit" class="btn btn-round btn-outline-danger">
                                            <i class="fa fa-times ml-2"></i>
                                            @lang('DECLINE')
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-round btn-outline-primary">
                                            <i class="fa fa-check ml-2"></i>
                                            @lang('CONFIRM')
                                        </button>
                                    @endif

                                </form>
                            </td>
                            <td>
                                <a href="{{route('comment.edit', $comment->id)}}" class="btn btn-round btn-outline-success">
                                    <i class="fa fa-edit ml-2"></i>
                                    @lang('EDIT')
                                </a>
                            </td>
                            <td>
                                <form class="d-inline" action="{{route('comment.destroy', $comment->id)}}" method="post">
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
