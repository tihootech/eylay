@extends('layouts.dashboard')
@section('title')
    @lang('NEWSLETTER')
@endsection
@section('content')

	<div class="tile">
        @if ($newsletters->count())

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col"> @lang('ROW') </th>
                        <th scope="col"> @lang('EMAIL') </th>
                        <th scope="col"> @lang('DATE') </th>
                        <th scope="col"> @lang('TIME') </th>
                        <th scope="col"> @lang('OPERATIONS') </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($newsletters as $i => $newsletter)
                        <tr>
                            <th scope="row"> {{$i+1}} </th>
                            <td> {{$newsletter->email}} </td>
                            <td> {{date_picker_date($newsletter->created_at)}} </td>
                            <td> {{$newsletter->created_at->format('H:i')}} </td>
                            <td>
                                <form class="d-inline" action="{{route('newsletter.destroy', $newsletter->id)}}" method="post">
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
