$('.links-menu').on('click', function() {
	var $this = $(this);
	var id = $this.attr('data-id');
	var boxTarget = $('#box-' + id);

	$('html, body').animate({
		scrollTop: boxTarget.offset().top
	}, 1000);
	return false;
});