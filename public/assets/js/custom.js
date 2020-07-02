$(document).on('click', '#load-more-donations', function () {
	var step = Number($(this).attr('data-step'));
	var root = $('meta[name=root]').attr('content');
	$.get(root+'/more-donates/'+step, function(data){
		console.log(data);
		if (data) {
			var container = $('#latest-donates-row');
			container.append(data);
		}else {
			$('#no-more-donates').slideDown();
			$('#load-more-donations').attr('disabled', 'disabled');
		}
	});
	$(this).attr('data-step', step+1)
})
