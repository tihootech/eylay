@if ($object->id)
	<div class="tile">
		<div class="row">
			<div class="col-md-6">
				<h2> @lang('IMAGE') @lang('CURRENT') </h2>
				<hr>
				@if ($object->image)
					<img src="{{asset($object->image)}}" class="img-fluid">
				@else
					<i class="fa fa-warning ml-2"></i>
					<em> بدون تصویر </em>
				@endif
			</div>
			<div class="col-md-6">
				<h2> @lang('BG') @lang('CURRENT') </h2>
				<hr>
				@if ($object->bg)
					<img src="{{asset($object->bg)}}" class="img-fluid">
				@else
					<i class="fa fa-warning ml-2"></i>
					<em> بدون تصویر </em>
				@endif
			</div>
		</div>
	</div>
@endif
