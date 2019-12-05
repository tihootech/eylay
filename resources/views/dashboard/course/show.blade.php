@extends('layouts.dashboard')
@section('title')
    @lang('DETAILS') {{$course->title}}
@endsection
@section('content')

    <div class="tile text-left">
        <a href="{{route('course.index')}}" class="btn btn-primary btn-round">
            <i class="fa fa-list ml-2"></i>
            @lang('LIST_ALL') @lang('COURSES')
        </a>
    </div>

	<div class="tile">
        <h2> @lang('SIGNUPS_LIST') </h2>
        <hr>
        @if ($course->signups->count())
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col"> @lang('ROW') </th>
                        <th scope="col"> @lang('STEP') </th>
                        <th scope="col"> @lang('NAME') </th>
                        <th scope="col"> @lang('PHONE') </th>
                        <th scope="col"> @lang('DATE') </th>
                        <th scope="col"> @lang('TIME') </th>
                        <th scope="col"> @lang('USER') </th>
                        <th scope="col"> @lang('OPERATIONS') </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($course->signups as $i => $signup)
                        <tr>
                            <th scope="row"> {{$i+1}} </th>
                            <td> {{$signup->step}} </td>
                            <td> {{$signup->name}} </td>
                            <td> {{$signup->phone}} </td>
                            <td> {{date_picker_date($signup->created_at)}} </td>
                            <td> {{$signup->created_at->format('H:i')}} </td>
                            <td>
                                @if ($signup->user)
                                    <a href="{{route('user.show', $signup->user_id)}}"> {{$signup->user->name ?? 'Database Error'}} </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <form class="d-inline" action="{{route('signup.destroy', $signup->id)}}" method="post">
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
