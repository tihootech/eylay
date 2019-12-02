<h4 class="yekan">
	@if ($question->required)
		<i class="fa fa-asterisk ml-2 text-rose"></i>
	@else
		<i class="fa fa-arrow-left ml-2 text-primary"></i>
	@endif
	{{$question->body}}
</h4>
<div class="text-muted">
	{!! $question->info !!}
</div>

@if ($question->type == 'multiple_choices')
	<div class="display-choices">
		@foreach ($question->get_choices as $choice)
			<div class="radio">
				<label>
					<input type="radio" class="data" name="answer" value="{{$choice->content}}"
						@if($question->filler_answer() == $choice->content) checked @endif>
					<span class="circle"></span>
					<span class="check"></span>
					<b class="radio-text"> {{$choice->content}} </b>
				</label>
			</div>
		@endforeach
	</div>
	<hr>
@endif

@if ($question->type == 'string' || $question->type == 'number')
	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="form-group label-floating @if( !(isset($old_answer)) && !$question->filler_answer()) is-empty @endif">
				@if ($question->type == 'string')
					<label class="control-label"> پاسخ خود را وارد کنید </label>
				@else
					<label class="control-label"> لطفا یک عدد وارد کنید </label>
				@endif
				<input type="text" class="form-control data" name="answer" value="{{$old_answer ?? $question->filler_answer()}}">
				<span class="material-input"></span>
			</div>
		</div>
	</div>
@endif

@if ($question->type == 'text')
	<div class="row">
		<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
			<div class="form-group label-floating @if( !(isset($old_answer)) && !$question->filler_answer()) is-empty @endif">
				<label class="control-label"> پاسخ خود را وارد کنید </label>
				<textarea name="answer" rows="6" class="form-control data">{{$old_answer ?? $question->filler_answer()}}</textarea>
			</div>
		</div>
	</div>
@endif

@isset($error_message)
	<div class="alert alert-danger animated flash mt-5">
		<i class="fa fa-warning ml-2"></i>
		{{$error_message}}
	</div>
@endisset

@isset($error_messages)
	<div class="alert alert-danger animated flash mt-5">
		@if (count($error_messages) == 1)
			<i class="fa fa-warning ml-2"></i>
			{{$error_messages[0]}}
		@else
			<p>
				<i class="fa fa-warning ml-2"></i>
				لطفا موارد زیر را بررسی کنید :
			</p>
			<ul class="mt-2">
				@foreach ($error_messages as $error_messages)
					<li> {{$error_messages}} </li>
				@endforeach
			</ul>
		@endif
	</div>
@endisset

{{-- <pre>
	session_question_id : {{session('filling')['question_id']}}
	question_id : {{ $question->id }}
	next_question_id : {{$question->next() ? $question->next()->id : 'null'}}
	prev_question_id : {{$question->prev() ? $question->prev()->id : 'null'}}
	next_url : {{route('quiz.submit_answer', ['prev' , $question->id])}}
	prec_url : {{route('quiz.submit_answer', ['next' , $question->id])}}
</pre> --}}

<div class="row">
	<div class="col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">
		<button type="submit" class="btn btn-primary btn-round btn-block">
			@if ($question->next())
				{{$question->button ?? 'تایید'}}
			@else
				{{$question->button ?? 'خاتمه دادن'}}
			@endif
		</button>
	</div>
</div>
