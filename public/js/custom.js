function showIcon() {
	$('.load-icon').show();
}
function hideIcon() {
	$('.load-icon').fadeOut(1000);
}
$(function() {
	$('.load-icon').fadeOut('slow');
	var $section = $('#load-app');

	$('body').on('click', '.show-page', function(e) {
		e.preventDefault();
		var page = $(this).attr('data-page');
		showIcon();
		$section.empty();
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			method: 'POST',
			url: '/administrator/' + page,
			dataType: 'html',
			success: function(data) {
				$section.html(data);
				hideIcon();
			}
		});
	});

	$('body').on('click', '.delete-item', function(e) {
		e.preventDefault();
		var page = $(this).attr('data-page');
		showIcon();
		$section.empty();
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			method: 'POST',
			url: '/administrator/' + page,
			data: {id: $(this).attr('data-id')},
			dataType: 'html',
			success: function(data) {
				$section.empty();
				$section.html(data);
				hideIcon();
			}
		});
	});

	$('body').on('click', '.edit-item', function(e) {
		e.preventDefault();
		var page = $(this).attr('data-page');
		showIcon();
		$section.empty();
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			method: 'POST',
			url: '/administrator/' + page,
			data: {id: $(this).attr('data-id')},
			dataType: 'html',
			success: function(data) {
				$section.html(data);
				hideIcon();
			}
		});
	});

	$('body').on('submit', '.form-page', function(e) {
		e.preventDefault();
		showIcon();
		$.ajax({
			method: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data) {
				$section.html(data);
				hideIcon();
			}
		})
	});

	$('body').on('click', '.pagination a', function (e) {
    e.preventDefault();
    showIcon();
    var url = $(this).attr('href');
    window.history.pushState("", "", url);
    $.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    	method: 'POST',
      url: url
    }).done(function (data) {
      $('.load-data').html(data);
			hideIcon();
    }).fail(function () {
      console.log("Failed to load data!");
    });
  });

  $('body').on('change', '.advsearch-select', function() {
  	var page = $(this).attr('data-page');
  	advsearch(page);
  })

  $('body').on('click', '.advsearch', function() {
  	var page = $(this).attr('data-page');
  	advsearch(page);
  })

  $('body').on('click', '.advsearch-clear', function() {
  	$('#search').val('');
  	$('#status').val('live');
  	var page = $(this).attr('data-page');
  	advsearch(page);
  })

	function advsearch(page) {
		var search = $('#search').val();
		var status = $('#status').val();
		showIcon();		
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			method: 'POST',
			data: {search:search, status:status},
			url: '/administrator/' + page,
			success: function(data) {
      	$('.load-data').html(data);
      	hideIcon();
			}
		})
	}

})