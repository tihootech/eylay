@extends('layouts.dashboard')
@section('title')
 	فعالیت های کاربران
@endsection
@section('content')

	<div class="tile">

		@include('tables.activities', ['single'=>false])
		{{$activities->links()}}

	</div>

@endsection
