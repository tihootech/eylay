<table class="table table-bordered table-striped table-hover table-sm">
	<thead>
		<tr>
			<th> # </th>
			@unless ($single)
				<th> کاربر </th>
			@endunless
			<th> متد </th>
			<th> URL </th>
			<th> تاریخ </th>
			<th> ساعت </th>
		</tr>
	</thead>
	<tbody>
		@foreach ($activities as $i => $activity)
			<tr>
				<th> {{$i+1}} </th>
				@unless ($single)
					<td> <a href="{{route('user.show', $activity->user_id)}}"> {{$activity->user->name ?? 'Error'}} </a> </td>
				@endunless
				<td> {{$activity->method}} </td>
				<td>
					@if ($activity->method == 'GET')
						<a href="{{$activity->url}}" target="_blank"> {{$activity->url}} </a>
					@else
						<em> {{$activity->url}} </em>
					@endif
				</td>
				<td> {{date_picker_date($activity->created_at, '-')}} </td>
				<td> {{$activity->created_at->format('H:i')}} </td>
			</tr>
		@endforeach
	</tbody>
</table>
