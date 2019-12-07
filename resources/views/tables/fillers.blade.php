<div class="table-responsive-lg">
	<table class="table table-bordered table-striped table-hover table-sm">
		<thead>
			<tr>
				@unless ($single)
					<th scope="col"> @lang('ROW') </th>
					<th scope="col"> پاسخ دهنده </th>
				@endunless
				<th> عملکرد </th>
				<th> زمان </th>
				@foreach ($quiz->questions as $question)
					<th scope="col" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true"
						data-content="
							<h6>{{$question->body}}</h6>
							@if ($question->choices->count())
								<hr>
								@foreach ($question->choices as $i => $choice)
									<span> {{$i+1}}) {{$choice->content}} </span>
									<br>
								@endforeach
							@endif
						"
						>
						{{$question->title}}
					</th>
				@endforeach
				@unless ($single)
					<th scope="col"> @lang('OPERATIONS') </th>
				@endunless
			</tr>
		</thead>
		<tbody>
			@foreach ($fillers as $i => $filler)
				<tr>
					@unless ($single)
						<th scope="row"> {{$i+1}} </th>
						<td>
							<a href="{{route('user.show', $filler->user_id)}}" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true"
								data-content="
									<i class='fa fa-calendar-o ml-2'></i>
									تاریخ پرکردن : {{date_picker_date($filler->created_at)}}
									<br>
									<i class='fa fa-clock-o ml-2'></i>
									ساعت {{$filler->created_at->format('H:i')}}
								"
								>
								{{$filler->user->name ?? 'Database Error'}}
							</a>
						</td>
					@endunless
					<td>
						@if ($quiz->type == 'quiz')
							<b> {{$filler->percentage}}% </b>
						@else
							-
						@endif
					</td>
					<td>
						<b> {{$filler->time}} ثانیه </b>
					</td>
					@foreach ($quiz->questions as $question)
						@if ($quiz->type == 'quiz')
							<td class="{{$question->correct_choice(true) == $question->filler_answer($filler->id) ? 'text-success' : 'text-danger'}}">
						@else
							<td>
						@endif
							{{$question->filler_answer($filler->id)}}
						</td>
					@endforeach
					@unless ($single)
						<td>
							<form class="d-inline" action="{{route('quiz.destroy_filler', $filler->id)}}" method="post">
								@csrf
								@method('DELETE')
								<button type="button" class="btn btn-round btn-sm btn-outline-danger delete">
									<i class="fa fa-trash m-0"></i>
								</button>
							</form>
						</td>
					@endunless
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
