function showIcon() {
	$('.load-icon').show();
}
function hideIcon() {
		$('.load-icon').fadeOut(1000);
	}
$(function() {
	$('.load-icon').fadeOut('slow');
	$('body').on('click', '.show-page', function(e) {
		e.preventDefault();
		var page = $(this).attr('data-page');
		var $section = $('#load-app');
		showIcon();
		$section.empty();
		$.ajax({
			method: 'POST',
			url: '/administrator/' + page,
			dataType: 'html',
			success: function(data) {
				$section.html(data);
				hideIcon();
			}
		});
	});
})