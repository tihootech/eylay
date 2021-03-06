@extends('layouts.dashboard')
@section('title')
    @lang('COURSES')
@endsection
@section('content')

    <div class="tile text-left">
        <a href="{{route('course.create')}}" class="btn btn-primary btn-round">
            <i class="fa fa-plus ml-2"></i>
            @lang('NEW_COURSE')
        </a>
    </div>

	<div class="tile">
        @if ($courses->count())

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col"> @lang('ROW') </th>
                        <th scope="col"> @lang('TITLE') </th>
                        <th scope="col"> @lang('SUPERTITLE') </th>
                        <th scope="col"> @lang('SUBTITLE') </th>
                        <th scope="col"> @lang('STATUS') </th>
                        <th scope="col"> @lang('STEP') </th>
                        <th scope="col" colspan="3"> @lang('OPERATIONS') </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $i => $course)
                        <tr>
                            <th scope="row"> {{$i+1}} </th>
                            <td> {{$course->title}} </td>
                            <td> {{$course->supertitle}} </td>
                            <td> {{$course->subtitle}} </td>
                            <td> @lang(strtoupper($course->subtitle)) </td>
                            <td> {{$course->step}} </td>
                            <td>
                                <a href="{{route('course.show', $course->id)}}" class="btn btn-round btn-outline-primary">
                                    <i class="fa fa-list ml-2"></i>
                                    @lang('DETAILS')
                                </a>
                            </td>
                            <td>
                                <a href="{{route('course.edit', $course->id)}}" class="btn btn-round btn-outline-success">
                                    <i class="fa fa-edit ml-2"></i>
                                    @lang('EDIT')
                                </a>
                            </td>
                            <td>
                                <form class="d-inline" action="{{route('course.destroy', $course->id)}}" method="post">
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
