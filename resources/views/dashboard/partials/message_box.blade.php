<div class="alert alert-warning">
	در صورتی که تمایل دارید سریع تر به شما پاسخ داده شود، از طریق تلگرام به آیدی @eylay پیام دهید.
</div>
<div class="row justify-content-center">
	<div class="col-md-{{$message_type == 'master' ? 12 : 9}}">
		<form class="tile messanger-form" action="{{route('message.store')}}" data-message-type="{{$message_type}}" >
			@master
				<input type="hidden" name="user_id" value="{{$messages[0]->user_id}}">
			@else
				<input type="hidden" name="user_id" value="0">
			@endmaster
			<h3 class="tile-title"> @if($message_type == 'master') {{$messages[0]->user->name ?? 'Error'}} @else پیام های شما  @endif </h3>
			<div class="messanger">
				<div class="messages">
					<div class="message">
						<img src="{{asset('assets/img/me.jpg')}}">
						<p class="info">
							حساب کاربری شما با موفقیت ایجاد شده است.
						</p>
					</div>
					@foreach ($messages as $dm)
						@if ($dm->master)
							<div class="message">
								<img src="{{asset('assets/img/me.jpg')}}">
								<p class="info" data-toggle="popover" data-html="true" data-placement="top" data-content='@include('dashboard.partials.date_popver', ['object'=>$dm])'>
									{{$dm->body}}
								</p>
							</div>
						@else
							<div class="message me">
								<img src="{{asset('assets/img/placeholder.jpg')}}">
								<p class="info" data-toggle="popover" data-html="true" data-placement="top" data-content='@include('dashboard.partials.date_popver', ['object'=>$dm])'>
									{{$dm->body}}
									<i class="material-icons">{{$dm->read ? 'done_all' : 'done'}}</i>
								</p>
								@unless ($dm->read)
									<i class="fa fa-asterisk text-danger"></i>
								@endunless
							</div>
						@endif
					@endforeach
				</div>
				<div class="sender">
					<input type="text" name="body" placeholder="ارسال پیام" autocomplete="off">
					<button class="btn btn-primary" type="submit"><i class="fa fa-lg fa-fw fa-paper-plane"></i></button>
				</div>
			</div>
		</form>
	</div>
</div>
