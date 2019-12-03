@extends('layouts.dashboard')
@section('title')
    @lang('USERS')
@endsection
@section('content')

	<div class="tile">
        @if ($users->count())

            <div class="table-responsive-md">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col"> @lang('ROW') </th>
                            <th scope="col"> @lang('NAME') </th>
                            <th scope="col"> @lang('EMAIL') </th>
                            <th scope="col"> @lang('EMAIL_VERIFIED') </th>
                            <th scope="col" colspan="2"> @lang('OPERATIONS') </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $i => $user)
                            <tr>
                                <th scope="row"> {{$i+1}} </th>
                                <td> {{$user->name}} </td>
                                <td class="calibri"> {{$user->email}} </td>
                                <td> @include('dashboard.partials.yesno', ['boolean' => $user->email_verified_at]) </td>
								<td>
									<form class="form-inline" action="{{route('user.master_update', $user->id)}}" method="post">
										@csrf
										@method('PUT')
										<select class="form-control" name="type">
											@foreach (user_types() as $user_type)
												<option value="{{$user_type}}" @if($user_type==$user->type) selected @endif>
													{{__(strtoupper($user_type))}}
												</option>
											@endforeach
										</select>
										<input type="text" name="new_password" class="form-control">
										<button type="submit" class="btn btn-primary"> <i class="fa fa-check m-0"></i> </button>
									</form>
								</td>
                                <td>
                                    <form class="d-inline" action="{{route('user.destroy', $user->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-round btn-outline-danger delete">
                                            <i class="fa fa-trash m-0"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
				{{$users->links()}}
            </div>

        @else

            <div class="alert alert-warning">
                <i class="fa fa-warning ml-2"></i>
                @lang('NOTHING_FOUND')
            </div>

        @endif
	</div>

@endsection
