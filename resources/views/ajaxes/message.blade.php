@php
	$photo_name = $message_type == 'master' ? 'me' : 'placeholder';
@endphp
<div class="message @unless($message_type == 'master') me @endunless animated fadeInUp">
	<img src="{{asset("assets/img/$photo_name.jpg")}}">
	<p class="info">
		{{$body}}
		<i class="material-icons">done</i>
	</p>
</div>
