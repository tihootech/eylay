@if ($object->id)
	<div class="tile">
		<div class="row">
			<div class="col-md-6">
				<h2> @lang('IMAGE') @lang('CURRENT') </h2>
				<hr>
				<img src="{{asset($object->image)}}" class="img-fluid">
			</div>
			<div class="col-md-6">
				<h2> @lang('BG') @lang('CURRENT') </h2>
				<hr>
				<img src="{{asset($object->bg)}}" class="img-fluid">
			</div>
		</div>
	</div>
@endif
