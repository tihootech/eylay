// clone and unclone

$(document).on('click', '[data-action=clone]', function () {
	var target = $($(this).data('target'));
	var row = target.find('[data-row]').first();
	var cloned = row.clone();
	cloned.find('input:not([data-keep=1])').val(null);
	cloned.appendTo(target);
});

$(document).on('click', '[data-action=unclone]', function () {
	var row = $(this).parents('[data-row]').first();
	var count = row.siblings('[data-row]').length;
	if (count) {
		row.remove();
	}
});


// check all
$(document).on('click','[data-check]',function () {
	var content = $(this).data('check');
	var target = $('#checked-ids');
	var checked = $(this).attr('data-checked');
	var reversed = checked == 1 ? 0 : 1;
	$('#checked-form > input.checked-input').remove();

	if (content == 'all') {
		$('[data-check]').toggleClass('fa-square-o fa-check-square-o').attr('data-checked', reversed);
	}else {
		$('[data-check=all]').removeClass('fa-check-square-o').addClass('fa-square-o').attr('data-checked', 0);
		$(this).toggleClass('fa-square-o fa-check-square-o').attr('data-checked', reversed);
	}

	$('[data-check]').each(function () {
		var id = $(this).attr('data-check');
		var val = $(this).attr('data-checked');
		if (id != 'all' && val==1) {
			$('#checked-form').append('<input type="hidden" class="checked-input" name="checked_ids[]" value="'+id+'">');
		}
	});

});
