$(document).ready(function () {

	$('form[method=AJAX]').submit(function (e) {
		e.preventDefault();
		var url = $(this).attr('action');
		var data = {};
		$(this).find('.data').each(function () {
			data[$(this).attr('name')] = $(this).val();
		});
		ajax(url, data, $(this));
	});

	$('.signup-form').submit(function (e) {

		e.preventDefault();

		var url = $(this).attr('action');
		var data = {};
		$(this).find('.data').each(function () {
			data[$(this).attr('name')] = $(this).val();
		});

		// validation
		var valid = true;
		var name = $('.data[name=name]').val();
		var phone = $('.data[name=phone]').val();
		if (name.length > 150) {
			$(this).find('.name-error').slideDown();
			valid = false;
		}else {
			$(this).find('.name-error').slideUp();
		}
		if (phone.length != 11) {
			$(this).find('.phone-error').slideDown();
			valid = false;
		}else {
			$(this).find('.phone-error').slideUp();
		}

		// ajax call
		if (valid) {
			ajax(url, data, $(this));
		}

	});

	$('.like, .unlike').click(function () {
		var url = $('meta[name=root]').attr('content') + '/like';
		var data = {
			oid: $(this).data('oid'),
			otype: $(this).data('otype')
		}
		ajax(url, data);
		var target = $(this).find('.count');
		var count = parseInt(target.text());
		if ($(this).hasClass('like')) {
			target.text(count+1)
		}else {
			target.text(count-1)
		}
		$(this).toggleClass('btn-rose btn-default like unlike');
	});

});

function ajax(url, data, target=null) {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		type:'POST',
		url:url,
		data:data,
		success:function(data){
			if (target) {
				target.html(data);
			}
		}
	});
}
