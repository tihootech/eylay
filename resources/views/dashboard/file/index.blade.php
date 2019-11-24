@extends('layouts.dashboard')
@section('title')
    @lang('FILES')
@endsection
@section('content')

    <div class="tile text-left">
        <a href="{{route('file.create')}}" class="btn btn-primary btn-round">
            <i class="fa fa-plus ml-2"></i>
            @lang('NEW_FILE')
        </a>
    </div>

	<div class="tile">
        @if ($files->count())
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col"> @lang('ROW') </th>
                        <th scope="col"> @lang('TITLE') </th>
                        <th scope="col"> @lang('ACCESS') </th>
                        <th scope="col"> @lang('INFO') </th>
                        <th scope="col"> @lang('DATE') </th>
                        <th scope="col" colspan="3"> @lang('OPERATIONS') </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $i => $file)
                        <tr>
                            <th scope="row"> {{$i+1}} </th>
                            <td> {{$file->title}} </td>
                            <td> {{$file->access}} </td>
                            <td> {{$file->info ? short($file->info, 50) : '-'}} </td>
                            <td> {{date_picker_date($file->created_at)}} </td>
                            <td>
                                @if ($file->path)
                                    <a href="{{asset($file->path)}}" class="btn btn-round btn-outline-primary" download>
                                        <i class="fa fa-download ml-2"></i>
                                        @lang('DOWNLOAD')
                                    </a>
                                @elseif($file->link)
                                    <a href="{{$file->link}}" class="btn btn-round btn-outline-primary" target="_blank">
                                        <i class="fa fa-external-link ml-2"></i>
                                        @lang('OPEN')
                                    </a>
                                @else
                                    <em> Database Error </em>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('file.edit', $file->id)}}" class="btn btn-round btn-outline-success">
                                    <i class="fa fa-edit ml-2"></i>
                                    @lang('EDIT')
                                </a>
                            </td>
                            <td>
                                <form class="d-inline" action="{{route('file.destroy', $file->id)}}" method="post">
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
