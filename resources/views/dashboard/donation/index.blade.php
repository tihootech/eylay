@extends('layouts.dashboard')
@section('title')
    @lang('DONATIONS')
@endsection
@section('content')

    @master
        <div class="tile text-left">
            <a href="{{route('donation.create')}}" class="btn btn-primary btn-round">
                <i class="fa fa-plus ml-2"></i>
                @lang('NEW_DONATION')
            </a>
        </div>
    @endmaster

	<div class="tile">
        @if ($donations->count())
            <div class="table-responsive-md">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col"> @lang('ROW') </th>
                            <th scope="col"> @lang('NAME') </th>
                            <th scope="col"> @lang('AMOUNT') </th>
                            <th scope="col"> @lang('MOBILE') </th>
                            <th scope="col"> @lang('INFO') </th>
                            <th scope="col"> @lang('REPLY') </th>
                            <th scope="col"> @lang('DATE') </th>
                            <th scope="col" colspan="3"> @lang('OPERATIONS') </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donations as $i => $donation)
                            <tr>
                                <th scope="row"> {{$i+1}} </th>
                                <td> {{$donation->name}} </td>
                                <td class="calibri"> {{number_format($donation->amount)}} </td>
                                <td> {{$donation->mobile ?? '-'}} </td>
                                <td> {{$donation->info ? short($donation->info, 50) : '-'}} </td>
                                <td> {{$donation->reply ? short($donation->reply, 50) : '-'}} </td>
                                <td> {{date_picker_date($donation->created_at)}} </td>
                                <td>
                                    <a href="{{route('donation.edit', $donation->id)}}" class="btn btn-round btn-outline-success">
                                        <i class="fa fa-edit ml-2"></i>
                                        @lang('EDIT')
                                    </a>
                                </td>
                                <td>
                                    <form class="d-inline" action="{{route('donation.destroy', $donation->id)}}" method="post">
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
            </div>
        @else
            <div class="alert alert-warning">
                <i class="fa fa-warning ml-2"></i>
                @lang('NOTHING_FOUND')
            </div>
        @endif
	</div>

@endsection
